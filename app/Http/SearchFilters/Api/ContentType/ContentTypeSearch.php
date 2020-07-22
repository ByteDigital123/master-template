<?php

namespace App\Http\SearchFilters\Api\ContentType;

use App\Http\SearchFilters\ApiSearchableTrait;
use App\Models\ContentType;

class ContentTypeSearch
{
    protected static $model = ContentType::class;
    protected static $namespace = __NAMESPACE__;

    use ApiSearchableTrait;
}
