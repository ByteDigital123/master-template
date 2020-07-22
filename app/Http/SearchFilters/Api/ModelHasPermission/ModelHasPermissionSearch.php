<?php

namespace App\Http\SearchFilters\Api\ModelHasPermission;

use App\Http\SearchFilters\ApiSearchableTrait;
use App\Models\ModelHasPermission;

class ModelHasPermissionSearch
{
    protected static $model = ModelHasPermission::class;
    protected static $namespace = __NAMESPACE__;

    use ApiSearchableTrait;
}
