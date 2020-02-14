<?php

/**
 * Generated file
 */

namespace App\Models;



/**
 * Class Provider
 * 
 * @property int $id
 * @property string $name
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \Illuminate\Database\Eloquent\Collection|\App\Models\Course[] $courses
 *
 * @package App\Models
 */
class Provider extends \Illuminate\Database\Eloquent\Model
{
	protected $fillable = [
		'name'
	];

	public function courses()
	{
		return $this->hasMany(\App\Models\Course::class);
	}
}
