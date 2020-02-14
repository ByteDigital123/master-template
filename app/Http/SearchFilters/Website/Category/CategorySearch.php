<?php

namespace App\Http\SearchFilters\Website\Category;

use App\Models\Category;
use App\SearchFilters\ApiSearchableTrait;

class CategorySearch
{
    protected static $model = Category::class;
    protected static $namespace = __NAMESPACE__;

    use ApiSearchableTrait;
}
