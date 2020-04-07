<?php

/**
 * Generated file
 */

namespace App\Models;



/**
 * Class Address
 * 
 * @property int $id
 * @property string $address_line_one
 * @property string $address_line_two
 * @property string $address_line_three
 * @property string $postcode
 * @property string $city
 * @property int $country_id
 * @property \Carbon\Carbon $created_at
 * @property string $updated_at
 * 
 * @property \App\Models\Country $country
 * @property \Illuminate\Database\Eloquent\Collection|\App\Models\User[] $users
 *
 * @package App\Models
 */
class Address extends \Illuminate\Database\Eloquent\Model
{

	protected $fillable = [
		'address_line_one',
		'address_line_two',
		'address_line_three',
		'postcode',
        'county',
		'city',
		'country'
	];

	public function users()
	{
		return $this->hasMany(\App\Models\User::class);
	}
}
