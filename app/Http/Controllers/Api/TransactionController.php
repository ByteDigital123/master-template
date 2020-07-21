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
        return TransactionResource::collection(TransactionSearch::apply($request, ['user', 'payment_status']));

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


}
