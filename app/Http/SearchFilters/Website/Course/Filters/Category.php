<?php

namespace App\Http\SearchFilters\Website\Course\Filters;

use App\Models\Course;
use App\Http\SearchFilters\ApiSearchableTrait;

class Category
{

    public static function apply($builder, $value)
    {
        return $builder->whereHas('categories', function ($q) use ($value){
            $q->where('slug', $value);
        });
    }


}
