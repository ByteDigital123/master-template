<?php

namespace App\Http\SearchFilters\Api\PermissionGroup;

use App\Http\SearchFilters\ApiSearchableTrait;
use App\Models\PermissionGroup;

class PermissionGroupSearch
{
    protected static $model = PermissionGroup::class;
    protected static $namespace = __NAMESPACE__;

    use ApiSearchableTrait;
}
