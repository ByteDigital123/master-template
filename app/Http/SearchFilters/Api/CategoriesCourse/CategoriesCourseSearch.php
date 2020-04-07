<?php

namespace App\Http\SearchFilters\Api\CategoriesCourse;

use App\Models\CategoriesCourse;
use App\Http\SearchFilters\ApiSearchableTrait;

class CategoriesCourseSearch
{
    protected static $model = CategoriesCourse::class;
    protected static $namespace = __NAMESPACE__;

    use ApiSearchableTrait;
}
