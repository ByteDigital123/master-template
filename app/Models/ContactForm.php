<?php

/**
 * Generated file
 */

namespace App\Models;



/**
 * Class ContactForm
 * 
 * @property int $id
 * @property string $first_name
 * @property string $last_name
 * @property string $email
 * @property string $message
 * @property int $agreed_to_marketing
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 *
 * @package App\Models
 */
class ContactForm extends \Illuminate\Database\Eloquent\Model
{
	protected $casts = [
		'agreed_to_marketing' => 'int'
	];

	protected $fillable = [
		'first_name',
		'last_name',
		'email',
		'message',
		'agreed_to_marketing'
	];
}
