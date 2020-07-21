<?php

namespace App\Http\Controllers\UserDashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserDashboard\User\StoreUserRequest;
use App\Http\Requests\UserDashboard\User\UpdateUserRequest;
use App\Http\Resources\UserDashboard\User\CurrentUserResource;
use App\Http\Resources\UserDashboard\User\OverviewResource;
use App\Http\Resources\UserDashboard\User\UserResource;
use App\Notifications\User\AccountDeleted;
use App\Notifications\User\PersonalDetailsUpdated;
use App\Services\AddressService;
use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{
    protected $service;
    protected $addressService;

    public function __construct(
        UserService $service,
        AddressService $addressService
    ){
        $this->service = $service;
        $this->addressService = $addressService;
    }

    /**
     * Display the current user details
     *
     * @return CurrentUserResource
     */
    public function currentUser()
    {
        return new CurrentUserResource($this->service->getCurrentUser());
    }

    /**
     * Display overview page
     *
     * @return OverviewResource
     */
    public function overview()
    {
        return new OverviewResource($this->service->getCurrentUser());
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return UserResource::collection($this->service->getAll());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserRequest $request)
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
    public function show()
    {
        return new UserResource($this->service->getCurrentUser());
    }


    public function updatePassword(Request $request)
    {
        $attributes = $request->all();

        $this->service->updatePassword($attributes);

        return response()->success('This action has been completed successfully');
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request)
    {
        $attributes = $request->all();

        try{
            $this->addressService->update($this->service->getCurrentUser()->address_id, $attributes['address']);
            $this->service->update($this->service->getCurrentUser()->id, $attributes['user']);

            $user = $this->service->getCurrentUser();
            $user->notify(new PersonalDetailsUpdated($user));

            return response()->success('This action has been completed successfully');
        }catch (\Exception $e){
            Log::info($e->getMessage());
            return response()->error('This action could not be completed');
        }
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

        $this->service->destroy($attributes);
        return response()->success('Your account has been deleted successfully');
    }

}
