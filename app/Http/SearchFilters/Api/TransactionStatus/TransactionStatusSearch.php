<?php

namespace App\Http\SearchFilters\Api\TransactionStatus;

use App\Http\SearchFilters\ApiSearchableTrait;
use App\Models\TransactionStatus;

class TransactionStatusSearch
{
    protected static $model = TransactionStatus::class;
    protected static $namespace = __NAMESPACE__;

    use ApiSearchableTrait;
}
