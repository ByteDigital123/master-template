<?php

namespace App\Http\SearchFilters\Website\Page;

use App\Http\SearchFilters\ApiSearchableTrait;
use App\Models\Page;

class PageSearch
{
    protected static $model = Page::class;
    protected static $namespace = __NAMESPACE__;

    use ApiSearchableTrait;
}
