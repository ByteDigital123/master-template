<?php

namespace App\Http\SearchFilters\Api\Address;

use App\Models\Address;
use App\SearchFilters\ApiSearchableTrait;

class AddressSearch
{
    protected static $model = Address::class;
    protected static $namespace = __NAMESPACE__;

    use ApiSearchableTrait;
}
