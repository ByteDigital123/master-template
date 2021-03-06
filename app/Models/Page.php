<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
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

    protected static function boot()
    {
        parent::boot(); // TODO: Change the autogenerated stub

        static::creating(function ($item) {
            $item->slug = Str::slug($item->title);
        });
    }


}
