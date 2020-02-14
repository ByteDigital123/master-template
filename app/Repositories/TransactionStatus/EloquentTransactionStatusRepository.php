<?php

namespace App\Repositories\TransactionStatus;

use App\Models\TransactionStatus;
use App\Repositories\BaseRepository;
use App\Repositories\TransactionStatus\TransactionStatusInterface;

class EloquentTransactionStatusRepository extends BaseRepository implements TransactionStatusInterface
{
    public $model;

    function __construct(TransactionStatus $model) {
        $this->model = $model;
    }
}
