<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\AdminUser\StoreAdminUserRequest;
use App\Http\Requests\Api\AdminUser\UpdateAdminUserRequest;
use App\Http\Resources\Api\AdminUser\AdminUserResource;
use App\Http\SearchFilters\Api\AdminUser\AdminUserSearch;
use App\Models\AdminUser;
use App\Services\AdminUserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class AdminUserController extends Controller
{

    protected $service;

    public function __construct(AdminUserService $service)
    {
        $this->service = $service;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('list', AdminUser::class);
        return AdminUserResource::collection(AdminUserSearch::apply($request));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAdminUserRequest $request)
    {
        $this->authorize('create', AdminUser::class);

        $attributes = $request->all();

        try{
            $this->service->store($attributes);
            return response()->success('This action has been completed successfully');
        }catch (\Exception $e){
            Log::info($e->getMessage());
            return response()->error('This action could not be completed');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $this->authorize('view', AdminUser::class);
        return new AdminUserResource($this->service->getById($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id, UpdateAdminUserRequest $request)
    {
        $this->authorize('update', AdminUser::class);

        $attributes = $request->all();

        try{
            $this->service->update($id, $attributes);
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
        $this->authorize('delete', AdminUser::class);

        try{
            $attributes = $request->json()->all();
            $this->service->destroy($attributes);
            return response()->success('This action has been completed successfully');
        }catch (\Exception $e){
            Log::info($e->getMessage());
            return response()->error('This action could not be completed');
        }

    }

}
