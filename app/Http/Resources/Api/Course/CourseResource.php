<?php

namespace App\Http\Resources\Api\Course;

use Illuminate\Http\Resources\Json\JsonResource;

class CourseResource extends JsonResource
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
            'title' => $this->title,
            'subtitle' => $this->subtitle,
            'retail_price' => $this->retail_price,
            'discounted_retail_price' => $this->discounted_retail_price,
            'provider_reference_id' => $this->provider_reference_id,
            'provider_price' => $this->provider_price,
            'duration' => $this->duration,
            'converted_time' => $this->convertedTime($this->duration),
            'provider' => [
                'id' => $this->provider->id,
                'name' => $this->provider->name
            ],
            'main_image' => $this->main_image,
            'excerpt' => $this->excerpt,
            'description' => $this->description,
            'skills_learned' => $this->skills_learned,
            'modules' => $this->modules,
            'categories' => $this->categories
        ];
    }
}
