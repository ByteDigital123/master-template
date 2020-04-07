<?php

namespace App\Http\SearchFilters\Api\TransactionStatus;

use App\Models\TransactionStatus;
use App\Http\SearchFilters\ApiSearchableTrait;

class TransactionStatusSearch
{
    protected static $model = TransactionStatus::class;
    protected static $namespace = __NAMESPACE__;

    use ApiSearchableTrait;
}
