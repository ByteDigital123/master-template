<?php

namespace App\Http\SearchFilters\Api\ModelHasRole;

use App\Models\ModelHasRole;
use App\Http\SearchFilters\ApiSearchableTrait;

class ModelHasRoleSearch
{
    protected static $model = ModelHasRole::class;
    protected static $namespace = __NAMESPACE__;

    use ApiSearchableTrait;
}
