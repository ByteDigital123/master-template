<?php

namespace App\Http\SearchFilters\Website\Address;

use App\Models\Address;
use App\Http\SearchFilters\ApiSearchableTrait;

class AddressSearch
{
    protected static $model = Address::class;
    protected static $namespace = __NAMESPACE__;

    use ApiSearchableTrait;
}
