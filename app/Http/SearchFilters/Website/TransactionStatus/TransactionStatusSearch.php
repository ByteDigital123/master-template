<?php

namespace App\Http\SearchFilters\Website\TransactionStatus;

use App\Models\TransactionStatus;
use App\SearchFilters\ApiSearchableTrait;

class TransactionStatusSearch
{
    protected static $model = TransactionStatus::class;
    protected static $namespace = __NAMESPACE__;

    use ApiSearchableTrait;
}
