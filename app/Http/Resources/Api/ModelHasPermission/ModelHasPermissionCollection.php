<?php

namespace App\Http\Resources\Api\ModelHasPermission;

use Illuminate\Http\Resources\Json\ResourceCollection;

class ModelHasPermissionCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return parent::toArray($request);
    }
}
