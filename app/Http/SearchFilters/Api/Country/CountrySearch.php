<?php

namespace App\Http\SearchFilters\Api\Country;

use App\Http\SearchFilters\ApiSearchableTrait;
use App\Models\Country;

class CountrySearch
{
    protected static $model = Country::class;
    protected static $namespace = __NAMESPACE__;

    use ApiSearchableTrait;
}
