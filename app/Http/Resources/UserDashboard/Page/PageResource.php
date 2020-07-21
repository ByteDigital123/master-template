<?php

namespace App\Http\Resources\UserDashboard\Page;

use Illuminate\Http\Resources\Json\JsonResource;

class PageResource extends JsonResource
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
            'name' => $this->name,
            'url' => $this->url,
            'content' => json_decode($this->content, true),
            'seo' => $this->seo
        ];
    }
}
