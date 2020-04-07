<?php

/**
 * Generated file
 */

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

/**
 * Class AdminUser
 * 
 * @property int $id
 * @property string $first_name
 * @property string $last_name
 * @property string $email
 * @property string $password
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 *
 * @package App\Models
 */
class AdminUser extends Authenticatable
{
    use Notifiable, HasRoles;

    protected $guard_name = 'api';

    public $table = 'admin_users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'profile_picture',
        'email',
        'password'
    ];

    protected $appends = [
        'full_name'
    ];

    /**
     * Cast some things to other things
     * @var [type]
     */
    protected $casts = [
        'is_admin' => 'boolean',
        'roles' => 'array',
        'permissions' => 'array',
        'profile_picture' => 'array'
    ];

    protected $dates = [
        'created_at',
        'updated_at'
    ];


    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Return all the permissions the model has, both directly and via roles.
     * @return [type] [description]
     */
    public function getAllPermissions()
    {
        return $this->permissions
            ->merge($this->getPermissionsViaRoles())
            ->sort()
            ->values();
    }

    /**
     * Check if the user is Super Admin
     * (well, right now it's just hardcoded for id:1)
     * #Spaghetti
     * @param  [type]  $value [description]
     * @return boolean        [description]
     */
    public function isSuperAdmin($value){
        if($value === 1){
            return true;
        }
    }

    public function getFullNameAttribute()
    {
        return $this->first_name . ' ' . $this->last_name;
    }
}
