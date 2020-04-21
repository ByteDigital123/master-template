<?php

/**
 * Generated file
 */

namespace App\Models;



use Illuminate\Support\Str;

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
	protected $table = 'categories';

	protected $fillable = [
		'name',
        'slug'
	];

	public function courses()
	{
		return $this->belongsToMany(\App\Models\Course::class, 'categories_courses', 'category_id', 'course_id');
	}

    public function setNameAttribute($value)
    {
        $this->attributes['name'] = $value;
        $this->attributes['slug'] = Str::slug($value);
    }
}
