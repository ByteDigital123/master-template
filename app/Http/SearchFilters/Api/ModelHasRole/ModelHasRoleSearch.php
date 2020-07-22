<?php

namespace App\Http\SearchFilters\Api\ModelHasRole;

use App\Http\SearchFilters\ApiSearchableTrait;
use App\Models\ModelHasRole;

class ModelHasRoleSearch
{
    protected static $model = ModelHasRole::class;
    protected static $namespace = __NAMESPACE__;

    use ApiSearchableTrait;
}
