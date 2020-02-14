<?php

namespace App\Http\SearchFilters\Website\Provider;

use App\Models\Provider;
use App\SearchFilters\ApiSearchableTrait;

class ProviderSearch
{
    protected static $model = Provider::class;
    protected static $namespace = __NAMESPACE__;

    use ApiSearchableTrait;
}
