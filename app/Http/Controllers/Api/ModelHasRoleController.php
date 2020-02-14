<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\ModelHasRole\StoreModelHasRoleRequest;
use App\Http\Requests\Api\ModelHasRole\UpdateModelHasRoleRequest;
use App\Http\Resources\Api\ModelHasRole\ModelHasRoleResource;
use App\Http\SearchFilters\Api\ModelHasRole\ModelHasRoleSearch;
use App\Models\ModelHasRole;
use App\Services\ModelHasRoleService;
use Illuminate\Http\Request;

class ModelHasRoleController extends Controller
{

    protected $service;

    public function __construct(ModelHasRoleService $service)
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
        $this->authorize('list', ModelHasRole::class);
        return ModelHasRoleResource::collection(ModelHasRoleSearch::apply($request));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreModelHasRoleRequest $request)
    {
        $this->authorize('create', ModelHasRole::class);

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
        $this->authorize('view', ModelHasRole::class);
        return new ModelHasRoleResource($this->service->getById($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id, UpdateModelHasRoleRequest $request)
    {
        $this->authorize('update', ModelHasRole::class);

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
        $this->authorize('delete', ModelHasRole::class);

        $attributes = $request->json()->all();

        return $this->service->delete($attributes);
    }

}
