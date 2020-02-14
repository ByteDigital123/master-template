<?php

/**
 * Generated file
 */

namespace App\Models;



/**
 * Class Category
 * 
 * @property int $id
 * @property string $name
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \Illuminate\Database\Eloquent\Collection|\App\Models\CategoriesCourse[] $categories_courses
 *
 * @package App\Models
 */
class Category extends \Illuminate\Database\Eloquent\Model
{
	protected $table = 'category';

	protected $fillable = [
		'name'
	];

	public function categories_courses()
	{
		return $this->hasMany(\App\Models\CategoriesCourse::class);
	}
}
