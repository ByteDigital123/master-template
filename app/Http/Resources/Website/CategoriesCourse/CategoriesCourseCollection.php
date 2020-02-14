<?php

namespace App\Http\Resources\Website\CategoriesCourse;

use Illuminate\Http\Resources\Json\ResourceCollection;

class CategoriesCourseCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return parent::toArray($request);
    }
}
