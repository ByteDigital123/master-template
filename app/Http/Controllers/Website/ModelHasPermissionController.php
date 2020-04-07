<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Http\Requests\Website\ModelHasPermission\StoreModelHasPermissionRequest;
use App\Http\Requests\Website\ModelHasPermission\UpdateModelHasPermissionRequest;
use App\Http\Resources\Website\ModelHasPermission\ModelHasPermissionResource;
use App\Services\ModelHasPermissionService;
use Illuminate\Http\Request;

class ModelHasPermissionController extends Controller
{
    protected $service;

    public function __construct(ModelHasPermissionService $service)
    {
        $this->service = $service;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return ModelHasPermissionResource::collection($this->service->getAll());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreModelHasPermissionRequest $request)
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
        return new ModelHasPermissionResource($this->service->getById($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id, UpdateModelHasPermissionRequest $request)
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
