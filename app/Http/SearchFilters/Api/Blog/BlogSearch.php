<?php

namespace App\Http\SearchFilters\Api\Blog;

use App\Models\Blog;
use App\Http\SearchFilters\ApiSearchableTrait;

class BlogSearch
{
    protected static $model = Blog::class;
    protected static $namespace = __NAMESPACE__;

    use ApiSearchableTrait;
}
