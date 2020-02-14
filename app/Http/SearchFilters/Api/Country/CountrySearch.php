<?php

namespace App\Http\SearchFilters\Api\Country;

use App\Models\Country;
use App\SearchFilters\ApiSearchableTrait;

class CountrySearch
{
    protected static $model = Country::class;
    protected static $namespace = __NAMESPACE__;

    use ApiSearchableTrait;
}
