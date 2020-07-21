<?php

/**
 * Generated file
 */

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

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
    use Notifiable, HasApiTokens;

    protected $fillable = [
        'first_name',
        'last_name',
        'username',
        'date_of_birth',
        'address_id',
        'password',
        'email',
        'email_verified'
    ];

    protected $casts = [
        'email_verified' => 'bool'
    ];

    protected $hidden = [
        'password'
    ];

    public function address()
    {
        return $this->belongsTo(Address::class, 'address_id', 'id');
    }

}
