<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\TransactionStatus\StoreTransactionStatusRequest;
use App\Http\Requests\Api\TransactionStatus\UpdateTransactionStatusRequest;
use App\Http\Resources\Api\TransactionStatus\TransactionStatusResource;
use App\Http\SearchFilters\Api\TransactionStatus\TransactionStatusSearch;
use App\Models\TransactionStatus;
use App\Services\TransactionStatusService;
use Illuminate\Http\Request;

class TransactionStatusController extends Controller
{

    protected $service;

    public function __construct(TransactionStatusService $service)
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
        $this->authorize('list', TransactionStatus::class);
        return TransactionStatusResource::collection(TransactionStatusSearch::apply($request));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTransactionStatusRequest $request)
    {
        $this->authorize('create', TransactionStatus::class);

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
        $this->authorize('view', TransactionStatus::class);
        return new TransactionStatusResource($this->service->getById($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id, UpdateTransactionStatusRequest $request)
    {
        $this->authorize('update', TransactionStatus::class);

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
        $this->authorize('delete', TransactionStatus::class);

        $attributes = $request->json()->all();

        return $this->service->delete($attributes);
    }

}
