<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Http\Requests\Website\Course\StoreCourseRequest;
use App\Http\Requests\Website\Course\UpdateCourseRequest;
use App\Http\Resources\Website\Course\CourseResource;
use App\Http\Resources\Website\Course\FeaturedCourseResource;
use App\Http\SearchFilters\Website\Course\CourseSearch;
use App\Models\AdminUser;
use App\Notifications\Admin\CoursePurchased;
use App\Repositories\Transaction\TransactionInterface;
use App\Repositories\TransactionStatus\TransactionStatusInterface;
use App\Services\CourseService;
use App\Services\SagePaymentGateway;
use App\Services\TransactionService;
use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CourseController extends Controller
{
    protected $service;
    /**
     * @var UserService
     */
    private $userService;
    /**
     * @var SagePaymentGateway
     */
    private $gateway;
    /**
     * @var TransactionInterface
     */
    private $transaction;
    /**
     * @var TransactionStatusInterface
     */
    private $transactionStatus;

    public function __construct(
        CourseService $service,
        UserService $userService,
        SagePaymentGateway $gateway,
        TransactionInterface $transaction,
        TransactionStatusInterface $transactionStatus
    ){
        $this->service = $service;
        $this->userService = $userService;
        $this->gateway = $gateway;
        $this->transaction = $transaction;
        $this->transactionStatus = $transactionStatus;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return CourseResource::collection($this->service->getAll());
    }

    /**
     * Get featured courses
     * 
     * @return FeaturedCourseResource
     */
    public function featured()
    {
        return FeaturedCourseResource::collection($this->service->getFeatured());
    }

    public function purchase(Request $request)
    {
        $attributes = $request->all();

        DB::transaction(function() use($attributes) {
            // Create User
            $user = $this->userService->store([
                'first_name' => $attributes['first_name'],
                'last_name' => $attributes['last_name'],
                'email' => $attributes['email'],
                'telephone' => $attributes['telephone'],
                'username' => $attributes['username'],
            ]);

            $course = $this->service->getById($attributes['course']['id']);

            // Take Payment
            $payment = $this->gateway->processTransaction($user, $attributes['card_details'], $attributes['billing'], $attributes['shipping'], $course);

            // Store Transaction
            $transaction = $this->transaction->create([
                'status_id' => $this->transactionStatus->where('name', 'Active')->first()->id,
                'user_id' => $user->id,
                'name' => $user['first_name'] . ' ' . $user['last_name'] . ' paid for course ' . $course->title,
                'total' => $course->retail_price,
                'fee' => 0,
                'net_amount' => $course->retail_price,
                'transaction_reference_id' => $payment->transactionId,
                'provider_user_id' => $course->provider->name,
            ]);

            // Send notification
            $admin = AdminUser::find(1);
            $admin->notify(new CoursePurchased($admin, $user, $course));
        });
    }


    public function searchCourse(Request $request)
    {
        return CourseResource::collection(CourseSearch::apply($request));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCourseRequest $request)
    {
        $attributes = $request->all();

        return $this->service->store($attributes);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return new CourseResource($this->service->getById($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id, UpdateCourseRequest $request)
    {
        $attributes = $request->all();

        return $this->service->update($id, $attributes);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $attributes = $request->json()->all();

        return $this->service->delete($attributes);
    }

}
