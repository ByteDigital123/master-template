<?php

namespace App\Http\Resources\Page;

use Carbon\Carbon;
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
            'id' => $this->id,
            'name' => $this->name,
            'url' => $this->url,
            'content' => json_decode($this->content),
            'created_at' => Carbon::parse($this->created_at),
            'updated_at' => Carbon::parse($this->updated_at)
        ];
    }
}
