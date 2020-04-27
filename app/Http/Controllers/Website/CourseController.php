<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Http\Requests\Website\Course\StoreCourseRequest;
use App\Http\Requests\Website\Course\UpdateCourseRequest;
use App\Http\Resources\Website\Course\CourseResource;
use App\Http\Resources\Website\Course\FeaturedCourseResource;
use App\Http\SearchFilters\Website\Course\CourseSearch;
use App\Models\AdminUser;
use App\Models\Category;
use App\Models\Course;
use App\Models\User;
use App\Notifications\Admin\CoursePurchased;
use App\Repositories\Transaction\TransactionInterface;
use App\Repositories\TransactionStatus\TransactionStatusInterface;
use App\Services\CourseService;
use App\Services\SagePaymentGateway;
use App\Services\TransactionService;
use App\Services\UserService;
use App\Services\VideoTileService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

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

    public function search(Request $request)
    {
        $attributes = $request->all();

        if(isset($attributes['course']) && !is_null($attributes['course'])){
            return CourseResource::collection(Course::where('id', $attributes['course'])->get());
        }elseif(isset($attributes['category']) && !is_null($attributes['category'])){
            return CourseResource::collection(Category::where('id', $attributes['category'])->first()->courses);
        }else{
            return CourseResource::collection(Course::limit(6)->get());
        }
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

//        try{
            // Create User
            $user = User::firstOrCreate([
                'email' => $attributes['email']
            ],[
                'first_name' => $attributes['first_name'],
                'last_name' => $attributes['last_name'],
                'email' => $attributes['email'],
                'telephone' => $attributes['telephone']
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
                'course_id' => $course->id,
            ]);

            if($course->provider->name == 'VideoTile'){
                // Check if user

                // CREATE CLIENT
                $client = (new VideoTileService());

                // CREATE USER
                $clientUser = json_decode($client->createUser($attributes['first_name'], $attributes['last_name'], $attributes['email'], $attributes['telephone']), true);

                // UPDATE USER ON CPD
                $user->username     = $clientUser['username'];
                $user->videotile_id = $clientUser['user_id'];
                $user->password     = $clientUser['password'];
                $user->api_token    = $clientUser['api_token'];
                $user->save();

                // ASSIGN USER TO COURSE
                $client->assignCourseByUserId($clientUser['user_id'], $course->provider_reference_id);
            }

            // Send notification
            $admin = AdminUser::find(1);
            $admin->notify(new CoursePurchased($admin, $user, $course));

            return response()->success('Thank you for your purchase');
//        }catch (\Exception $e){
//            Log::info($e->getMessage());
//            return response()->error('This action could not be completed - ' . $e->getMessage());
//        }

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
