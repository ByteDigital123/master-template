<?php

/**
 * Generated file
 */

namespace App\Models;



use Illuminate\Support\Str;

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
		'duration' => 'int',
		'featured' => 'bool',
		'skills_learned' => 'array'
	];

	protected $hidden = [
	    'provider_price',
        'provider_reference_id'
    ];

	protected $fillable = [
		'provider_id',
		'title',
		'provider_price',
		'retail_price',
		'description',
        'featured',
		'excerpt',
		'duration',
		'main_image',
		'provider_reference_id',
        'slug'
	];

	public function provider()
	{
		return $this->belongsTo(\App\Models\Provider::class);
	}

	public function categories()
	{
		return $this->belongsToMany(\App\Models\Category::class, 'categories_courses', 'course_id', 'category_id');
	}

    public function setTitleAttribute($value)
    {
        $this->attributes['title'] = $value;
        $this->attributes['slug'] = Str::slug($value);
    }
}
