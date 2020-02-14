<?php

/**
 * Generated file
 */

namespace App\Models;



/**
 * Class Course
 * 
 * @property int $id
 * @property int $provider_id
 * @property string $title
 * @property int $provider_price
 * @property int $retail_price
 * @property string $description
 * @property string $excerpt
 * @property int $duration
 * @property string $main_image
 * @property string $provider_reference_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Models\Provider $provider
 * @property \Illuminate\Database\Eloquent\Collection|\App\Models\CategoriesCourse[] $categories_courses
 *
 * @package App\Models
 */
class Course extends \Illuminate\Database\Eloquent\Model
{
	protected $casts = [
		'provider_id' => 'int',
		'provider_price' => 'int',
		'retail_price' => 'int',
		'duration' => 'int'
	];

	protected $fillable = [
		'provider_id',
		'title',
		'provider_price',
		'retail_price',
		'description',
		'excerpt',
		'duration',
		'main_image',
		'provider_reference_id'
	];

	public function provider()
	{
		return $this->belongsTo(\App\Models\Provider::class);
	}

	public function categories_courses()
	{
		return $this->hasMany(\App\Models\CategoriesCourse::class);
	}
}
