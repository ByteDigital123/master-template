<?php

namespace App\Http\SearchFilters\Api\Address;

use App\Http\SearchFilters\ApiSearchableTrait;
use App\Models\Address;

class AddressSearch
{
    protected static $model = Address::class;
    protected static $namespace = __NAMESPACE__;

    use ApiSearchableTrait;
}
