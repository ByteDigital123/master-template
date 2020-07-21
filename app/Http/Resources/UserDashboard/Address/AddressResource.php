<?php

namespace App\Http\Resources\UserDashboard\Address;

use Illuminate\Http\Resources\Json\JsonResource;

class AddressResource extends JsonResource
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
            'address_line_one' => $this->address_line_one,
            'address_line_two' => $this->address_line_two,
            'postcode' => $this->postcode,
            'city' => $this->city,
            'county' => $this->county,
            'country' => [
                'id' => $this->country->id,
                'name' => $this->country->name
            ]
        ];
    }
}
