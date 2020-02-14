<?php

namespace App\Http\Resources\Api\ModelHasRole;

use Illuminate\Http\Resources\Json\ResourceCollection;

class ModelHasRoleCollection extends ResourceCollection
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
