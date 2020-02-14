<?php

namespace App\Repositories\Transaction;

use App\Models\Transaction;
use App\Repositories\BaseRepository;
use App\Repositories\Transaction\TransactionInterface;

class EloquentTransactionRepository extends BaseRepository implements TransactionInterface
{
    public $model;

    function __construct(Transaction $model) {
        $this->model = $model;
    }
}
