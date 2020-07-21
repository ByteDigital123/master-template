<?php

namespace App\Http\SearchFilters\Api\Page;

use App\Models\Page;
use App\Http\SearchFilters\ApiSearchableTrait;

class PageSearch
{
    protected static $model = Page::class;
    protected static $namespace = __NAMESPACE__;

    use ApiSearchableTrait;
}
