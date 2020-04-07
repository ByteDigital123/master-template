<?php

namespace App\Http\Resources\Website\Course;

use Illuminate\Http\Resources\Json\JsonResource;

class FeaturedCourseResource extends JsonResource
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
