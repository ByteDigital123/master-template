<?php

namespace App\Http\SearchFilters\Api\Blog;

use App\Http\SearchFilters\ApiSearchableTrait;
use App\Models\Blog;

class BlogSearch
{
    protected static $model = Blog::class;
    protected static $namespace = __NAMESPACE__;

    use ApiSearchableTrait;
}
