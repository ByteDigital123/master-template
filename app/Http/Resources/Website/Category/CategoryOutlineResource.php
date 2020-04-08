<?php

namespace App\Http\Resources\Website\Category;

use App\Http\Resources\Website\Course\CourseResource;
use App\Http\Resources\Website\Course\NavigationCourseResource;
use Illuminate\Http\Resources\Json\JsonResource;

class CategoryOutlineResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {;
        return [
            'id' => $this->id,
            'category_name' => $this->name,
            'courses' => $this->courses
        ];
    }
}
