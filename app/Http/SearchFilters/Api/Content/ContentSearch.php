<?php

namespace App\Http\SearchFilters\Api\Content;

use App\Http\SearchFilters\ApiSearchableTrait;
use App\Models\Content;

class ContentSearch
{
    protected static $model = Content::class;
    protected static $namespace = __NAMESPACE__;

    use ApiSearchableTrait;
}
