<?php

namespace App\Http\SearchFilters\Api\Provider;

use App\Models\Provider;
use App\SearchFilters\ApiSearchableTrait;

class ProviderSearch
{
    protected static $model = Provider::class;
    protected static $namespace = __NAMESPACE__;

    use ApiSearchableTrait;
}
