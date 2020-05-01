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
            'test_price' => $this->retail_price,
            'retail_price' => number_format( $this->retail_price / 100, 2) / 100,
            'discounted_retail_price' => number_format( $this->discounted_retail_price / 100, 2) / 100,
            'provider_price' => number_format( $this->provider_price / 100, 2) / 100,
            'provider_reference_id' => $this->provider_reference_id,
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
