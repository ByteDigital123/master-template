<?php

namespace App\Http\Resources\Website\Category;

use App\Http\Resources\Website\Course\CourseResource;
use App\Http\Resources\Website\Course\NavigationCourseResource;
use Illuminate\Http\Resources\Json\JsonResource;

class CategoryResource extends JsonResource
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
            'number_of_courses' => count($this->courses),
            'slug' => $this->slug,
            'courses' =>  NavigationCourseResource::collection($this->courses)
        ];
    }
}
