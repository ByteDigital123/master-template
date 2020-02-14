<?php

/**
 * Generated file
 */

namespace App\Models;



/**
 * Class Country
 * 
 * @property int $id
 * @property string $name
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \Illuminate\Database\Eloquent\Collection|\App\Models\Address[] $addresses
 * @property \Illuminate\Database\Eloquent\Collection|\App\Models\BankDetail[] $bank_details
 *
 * @package App\Models
 */
class Country extends \Illuminate\Database\Eloquent\Model
{
	protected $fillable = [
        'name',
        'code',
        'currency_name',
        'dial_code',
        'currency_symbol',
        'currency',
	];

	public function addresses()
	{
		return $this->hasMany(\App\Models\Address::class);
	}

}
