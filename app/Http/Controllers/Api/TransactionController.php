<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Transaction\StoreTransactionRequest;
use App\Http\Requests\Api\Transaction\UpdateTransactionRequest;
use App\Http\Resources\Api\Transaction\TransactionResource;
use App\Http\SearchFilters\Api\Transaction\TransactionSearch;
use App\Models\Transaction;
use App\Services\TransactionService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class TransactionController extends Controller
{
    protected $service;

    public function __construct(TransactionService $service)
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
        $this->authorize('list', Transaction::class);
        return TransactionResource::collection(TransactionSearch::apply($request));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTransactionRequest $request)
    {
        $this->authorize('create', Transaction::class);

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
        $this->authorize('view', Transaction::class);
        return new TransactionResource($this->service->getById($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id, UpdateTransactionRequest $request)
    {
        $this->authorize('update', Transaction::class);

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
        $this->authorize('delete', Transaction::class);

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

