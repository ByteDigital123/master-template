<?php

namespace App\Http\Resources\Api\CategoriesCourse;

use Illuminate\Http\Resources\Json\JsonResource;

class CategoriesCourseResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return parent::toArray($request);
    }
}
