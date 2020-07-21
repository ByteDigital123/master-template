<?php

namespace App\Http\SearchFilters\Api\AdminUser;

use App\Models\AdminUser;
use App\Http\SearchFilters\ApiSearchableTrait;

class AdminUserSearch
{
    protected static $model = AdminUser::class;
    protected static $namespace = __NAMESPACE__;

    use ApiSearchableTrait;
}
