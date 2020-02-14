<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\PermissionGroup\StorePermissionGroupRequest;
use App\Http\Requests\Api\PermissionGroup\UpdatePermissionGroupRequest;
use App\Http\Resources\Api\PermissionGroup\PermissionGroupResource;
use App\Http\SearchFilters\Api\PermissionGroup\PermissionGroupSearch;
use App\Models\PermissionGroup;
use App\Services\PermissionGroupService;
use Illuminate\Http\Request;

class PermissionGroupController extends Controller
{

    protected $service;

    public function __construct(PermissionGroupService $service)
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
        $this->authorize('list', PermissionGroup::class);
        return PermissionGroupResource::collection(PermissionGroupSearch::apply($request));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePermissionGroupRequest $request)
    {
        $this->authorize('create', PermissionGroup::class);

        $attributes = $request->all();

        return $this->service->create($attributes);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $this->authorize('view', PermissionGroup::class);
        return new PermissionGroupResource($this->service->getById($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id, UpdatePermissionGroupRequest $request)
    {
        $this->authorize('update', PermissionGroup::class);

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
        $this->authorize('delete', PermissionGroup::class);

        $attributes = $request->json()->all();

        return $this->service->delete($attributes);
    }

}
