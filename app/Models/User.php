<?php

/**
 * Generated file
 */

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

/**
 * Class User
 *
 * @property int $id
 * @property string $first_name
 * @property string $last_name
 * @property string $username
 * @property string $email
 * @property string $telephone
 * @property string $api_token
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 *
 * @package App\Models
 */
class User extends Authenticatable
{
    use Notifiable;

    protected $hidden = [

    ];

    protected $fillable = [
        'first_name',
        'last_name',
        'username',
        'email',
        'password'
    ];

}
