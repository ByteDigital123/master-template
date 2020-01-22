<?php

namespace App\Http\Resources\AdminUser;

use Illuminate\Http\Resources\Json\JsonResource;

class AdminUserResource extends JsonResource
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
            'email' => $this->email,
            'full_name' => $this->first_name . ' ' . $this->last_name,
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'profile_picture' => $this->profile_picture,
            'is_admin' => $this->is_admin,
            'role' => $this->roles->first(),
            'permissions' => $this->hasRole('Super Admin') ? ['ALL'] : $this->getPermissionsViaRoles()->pluck('name')
        ];
    }
}
