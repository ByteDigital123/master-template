<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Page extends Model
{
    protected $casts = [
      'content' => 'array'
    ];

    protected $fillable = [
      'title',
      'slug',
      'url',
      'content',
    ];


    public function setNameAttribute($value)
     {
         $this->attributes['name'] = $value;
         $this->attributes['slug'] = Str::slug($value);
     }


}
