<?php

namespace App\Http\SearchFilters\Api\Course;

use App\Models\Course;
use App\Http\SearchFilters\ApiSearchableTrait;

class CourseSearch
{
    protected static $model = Course::class;
    protected static $namespace = __NAMESPACE__;

    use ApiSearchableTrait;
}
