<?php

namespace App\Http\SearchFilters\Api\Content;

use App\Models\Content;
use App\Http\SearchFilters\ApiSearchableTrait;

class ContentSearch
{
    protected static $model = Content::class;
    protected static $namespace = __NAMESPACE__;

    use ApiSearchableTrait;
}
