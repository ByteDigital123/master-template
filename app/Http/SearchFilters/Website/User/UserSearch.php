<?php

namespace App\Http\SearchFilters\Website\User;

use App\Models\User;
use App\Http\SearchFilters\ApiSearchableTrait;

class UserSearch
{
    protected static $model = User::class;
    protected static $namespace = __NAMESPACE__;

    use ApiSearchableTrait;
}
