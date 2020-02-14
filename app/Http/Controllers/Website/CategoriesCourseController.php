<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoriesCourse\StoreCategoriesCourseRequest;
use App\Http\Requests\CategoriesCourse\UpdateCategoriesCourseRequest;
use App\Http\Resources\CategoriesCourse\CategoriesCourseResource;
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
    public function index()
    {
        return CategoriesCourseResource::collection($this->service->getAll());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCategoriesCourseRequest $request)
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
