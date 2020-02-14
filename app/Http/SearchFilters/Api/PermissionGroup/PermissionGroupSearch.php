<?php

namespace App\Http\SearchFilters\Api\PermissionGroup;

use App\Models\PermissionGroup;
use App\SearchFilters\ApiSearchableTrait;

class PermissionGroupSearch
{
    protected static $model = PermissionGroup::class;
    protected static $namespace = __NAMESPACE__;

    use ApiSearchableTrait;
}
