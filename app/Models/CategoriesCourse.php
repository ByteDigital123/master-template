<?php

/**
 * Generated file
 */

namespace App\Models;



/**
 * Class CategoriesCourse
 * 
 * @property int $category_id
 * @property int $course_id
 * 
 * @property \App\Models\Category $category
 * @property \App\Models\Course $course
 *
 * @package App\Models
 */
class CategoriesCourse extends \Illuminate\Database\Eloquent\Model
{
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'category_id' => 'int',
		'course_id' => 'int'
	];

	protected $fillable = [
		'category_id',
		'course_id'
	];

	public function category()
	{
		return $this->belongsTo(\App\Models\Category::class);
	}

	public function course()
	{
		return $this->belongsTo(\App\Models\Course::class);
	}
}
