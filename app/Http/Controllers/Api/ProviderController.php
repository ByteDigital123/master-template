<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Provider\StoreProviderRequest;
use App\Http\Requests\Api\Provider\UpdateProviderRequest;
use App\Http\Resources\Api\Provider\ProviderResource;
use App\Http\SearchFilters\Api\Provider\ProviderSearch;
use App\Models\Provider;
use App\Services\ProviderService;
use Illuminate\Http\Request;

class ProviderController extends Controller
{

    protected $service;

    public function __construct(ProviderService $service)
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
        $this->authorize('list', Provider::class);
        return ProviderResource::collection($this->service->get());

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProviderRequest $request)
    {
        $this->authorize('create', Provider::class);

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
        $this->authorize('view', Provider::class);
        return new ProviderResource($this->service->getById($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id, UpdateProviderRequest $request)
    {
        $this->authorize('update', Provider::class);

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
        $this->authorize('delete', Provider::class);

        $attributes = $request->json()->all();

        return $this->service->delete($attributes);
    }

}
