<?php

namespace App\Http\Resources\Api\ModelHasPermission;

use Illuminate\Http\Resources\Json\JsonResource;

class ModelHasPermissionResource extends JsonResource
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
