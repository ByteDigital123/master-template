<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\CategoriesCourse\StoreCategoriesCourseRequest;
use App\Http\Requests\Api\CategoriesCourse\UpdateCategoriesCourseRequest;
use App\Http\Resources\Api\CategoriesCourse\CategoriesCourseResource;
use App\Http\SearchFilters\Api\CategoriesCourse\CategoriesCourseSearch;
use App\Models\CategoriesCourse;
use App\Services\CategoriesCourseService;
use Illuminate\Http\Request;

class CategoriesCourseController extends Controller
{

    protected $service;

    public function __construct(CategoriesCourseService $service)
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
        $this->authorize('list', CategoriesCourse::class);
        return CategoriesCourseResource::collection(CategoriesCourseSearch::apply($request));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCategoriesCourseRequest $request)
    {
        $this->authorize('create', CategoriesCourse::class);

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
        $this->authorize('view', CategoriesCourse::class);
        return new CategoriesCourseResource($this->service->getById($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id, UpdateCategoriesCourseRequest $request)
    {
        $this->authorize('update', CategoriesCourse::class);

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
        $this->authorize('delete', CategoriesCourse::class);

        $attributes = $request->json()->all();

        return $this->service->delete($attributes);
    }

}
