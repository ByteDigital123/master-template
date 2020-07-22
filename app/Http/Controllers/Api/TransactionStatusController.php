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

        try{
            $this->service->store($attributes);

            return response()->success('This action has been completed successfully');
        }catch (\Exception $e){
            Log::info($e->getMessage());
            return response()->error('This action could not be completed - ' . $e->getMessage());
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

        try{
            $this->service->update($id, $attributes);

            return response()->success('This action has been completed successfully');
        }catch (\Exception $e){
            Log::info($e->getMessage());
            return response()->error('This action could not be completed - ' . $e->getMessage());
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
        $this->authorize('delete', TransactionStatus::class);

        $attributes = $request->json()->all();

        try{
            $this->service->deleteMultiple($attributes['id']);

            return response()->success('This action has been completed successfully');
        }catch (\Exception $e){
            Log::info($e->getMessage());
            return response()->error('This action could not be completed - ' . $e->getMessage());
        }
    }

}
