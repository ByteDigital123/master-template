<?php

namespace App\Http\Resources\Api\ModelHasRole;

use Illuminate\Http\Resources\Json\JsonResource;

class ModelHasRoleResource extends JsonResource
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
