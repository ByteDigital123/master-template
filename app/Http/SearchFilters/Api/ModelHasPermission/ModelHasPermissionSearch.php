<?php

namespace App\Http\SearchFilters\Api\ModelHasPermission;

use App\Models\ModelHasPermission;
use App\SearchFilters\ApiSearchableTrait;

class ModelHasPermissionSearch
{
    protected static $model = ModelHasPermission::class;
    protected static $namespace = __NAMESPACE__;

    use ApiSearchableTrait;
}
