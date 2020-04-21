<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Category\StoreCategoryRequest;
use App\Http\Requests\Api\Category\UpdateCategoryRequest;
use App\Http\Resources\Api\Category\CategoryResource;
use App\Http\SearchFilters\Api\Category\CategorySearch;
use App\Models\Category;
use App\Services\CategoryService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CategoryController extends Controller
{

    protected $service;

    public function __construct(CategoryService $service)
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
        $this->authorize('list', Category::class);
        return CategoryResource::collection(CategorySearch::apply($request));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCategoryRequest $request)
    {
        $this->authorize('create', Category::class);

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
        $this->authorize('view', Category::class);
        return new CategoryResource($this->service->getById($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id, UpdateCategoryRequest $request)
    {
        $this->authorize('update', Category::class);

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
        $this->authorize('delete', Category::class);

        $attributes = $request->json()->all();

        if($category = Category::where('id', $attributes['id'])->has('courses')->first()){
            abort(401, 'This category has courses linked to it');
        }

        return $this->service->destroy($attributes);
    }

}
