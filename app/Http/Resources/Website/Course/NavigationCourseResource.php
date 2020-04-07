<?php

namespace App\Http\Resources\Website\Course;

use App\Http\Resources\Website\Category\CategoryOutlineResource;
use Illuminate\Http\Resources\Json\JsonResource;

class NavigationCourseResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'provider' => [
                'id' => $this->provider->id,
                'name' => $this->provider->name
            ],
            'categories' => CategoryOutlineResource::collection($this->categories),
            'title' => $this->title,
            'featured' => $this->featured,
            'retail_price' => $this->retail_price,
            'excerpt' => $this->excerpt,
            'duration' => $this->duration,
            'main_image' => $this->main_image,
            'provider_reference_id' => $this->provider_reference_id,
        ];
    }
}
