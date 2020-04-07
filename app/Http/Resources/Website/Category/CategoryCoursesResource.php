<?php

namespace App\Http\Resources\Website\Category;

use App\Http\Resources\Website\Course\CourseResource;
use App\Http\Resources\Website\Course\NavigationCourseResource;
use Illuminate\Http\Resources\Json\JsonResource;

class CategoryCoursesResource extends JsonResource
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
            'category' => $this->name,
            'courses' => NavigationCourseResource::collection($this->courses)
        ];
    }
}
