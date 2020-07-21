<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Content\StoreContentRequest;
use App\Http\Requests\Api\Content\UpdateContentRequest;
use App\Http\Resources\Api\Content\ContentResource;
use App\Http\SearchFilters\Api\Content\ContentSearch;
use App\Models\Content;
use App\Services\ContentService;
use Illuminate\Http\Request;

class ContentController extends Controller
{

    protected $service;

    public function __construct(ContentService $service)
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
        $this->authorize('list', Content::class);
        return ContentResource::collection(ContentSearch::apply($request));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreContentRequest $request)
    {
        $this->authorize('create', Content::class);

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
        $this->authorize('view', Content::class);
        return new ContentResource($this->service->getById($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id, UpdateContentRequest $request)
    {
        $this->authorize('update', Content::class);

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
        $this->authorize('delete', Content::class);

        $attributes = $request->json()->all();

        return $this->service->delete($attributes);
    }

}
