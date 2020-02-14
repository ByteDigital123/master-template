<?php

/**
 * Generated file
 */

namespace App\Models;



/**
 * Class Page
 * 
 * @property int $id
 * @property string $title
 * @property string $url
 * @property string $slug
 * @property string $content
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 *
 * @package App\Models
 */
class Page extends \Illuminate\Database\Eloquent\Model
{
	protected $fillable = [
		'title',
		'url',
		'slug',
		'content'
	];
}
