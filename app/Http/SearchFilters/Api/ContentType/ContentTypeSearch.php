<?php

namespace App\Http\SearchFilters\Api\ContentType;

use App\Models\ContentType;
use App\Http\SearchFilters\ApiSearchableTrait;

class ContentTypeSearch
{
    protected static $model = ContentType::class;
    protected static $namespace = __NAMESPACE__;

    use ApiSearchableTrait;
}
