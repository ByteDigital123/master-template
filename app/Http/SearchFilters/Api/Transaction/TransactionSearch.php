<?php

namespace App\Http\SearchFilters\Api\Transaction;

use App\Http\SearchFilters\ApiSearchableTrait;
use App\Models\Transaction;

class TransactionSearch
{
    protected static $model = Transaction::class;
    protected static $namespace = __NAMESPACE__;

    use ApiSearchableTrait;
}
