<?php

namespace App\Http\Controllers\UserDashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserDashboard\Transaction\StoreTransactionRequest;
use App\Http\Requests\UserDashboard\Transaction\UpdateTransactionRequest;
use App\Http\Resources\UserDashboard\Transaction\TransactionResource;
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
    public function index()
    {
        return TransactionResource::collection($this->service->get());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTransactionRequest $request)
    {
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
        $attributes = $request->json()->all();

        try{
            $this->service->deleteMultiple($attributes['ids']);

            return response()->success('This action has been completed successfully');
        }catch (\Exception $e){
            Log::info($e->getMessage());
            return response()->error('This action could not be completed - ' . $e->getMessage());
        }
    }

}
