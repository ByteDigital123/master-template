<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\ContentType\StoreContentTypeRequest;
use App\Http\Requests\Api\ContentType\UpdateContentTypeRequest;
use App\Http\Resources\Api\ContentType\ContentTypeResource;
use App\Http\SearchFilters\Api\ContentType\ContentTypeSearch;
use App\Models\ContentType;
use App\Services\ContentTypeService;
use Illuminate\Http\Request;

class ContentTypeController extends Controller
{

    protected $service;

    public function __construct(ContentTypeService $service)
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
        $this->authorize('list', ContentType::class);
        return ContentTypeResource::collection(ContentTypeSearch::apply($request));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreContentTypeRequest $request)
    {
        $this->authorize('create', ContentType::class);

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
        $this->authorize('view', ContentType::class);
        return new ContentTypeResource($this->service->getById($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id, UpdateContentTypeRequest $request)
    {
        $this->authorize('update', ContentType::class);

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
        $this->authorize('delete', ContentType::class);

        $attributes = $request->json()->all();

        return $this->service->delete($attributes);
    }

}
