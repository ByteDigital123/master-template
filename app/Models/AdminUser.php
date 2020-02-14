<?php

/**
 * Generated file
 */

namespace App\Models;



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
class AdminUser extends \Illuminate\Database\Eloquent\Model
{
	protected $hidden = [
		'password'
	];

	protected $fillable = [
		'first_name',
		'last_name',
		'email',
		'password'
	];
}
