<?php

namespace App\Http\Resources\UserDashboard\User;

use App\Http\Resources\UserDashboard\Address\AddressResource;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
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
            'user' => [
                'username' => $this->username,
                'first_name' => $this->first_name,
                'last_name' => $this->last_name,
                'email' => $this->email,
            ],
            'address' => new AddressResource($this->address),
            'private_profile' => $this->private_profile,
            'marketing_consent' => $this->marketing_consent,
        ];
    }
}
