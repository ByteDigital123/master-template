<?php

namespace App\Models;

use Laravel\Passport\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class AdminUser extends Authenticatable
{
    use HasRoles, Notifiable;

    protected $guard = 'api';

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password',
        'active',
    ];

    protected $casts = [
        'status' => 'boolean',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
}
