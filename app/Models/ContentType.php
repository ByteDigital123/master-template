<?php

/**
 * Generated file
 */

namespace App\Models;

/**
 * Class ContentType
 *
 * @property int $id
 * @property string $name
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 *
 * @property \Illuminate\Database\Eloquent\Collection|\App\Models\Content[] $contents
 *
 * @package App\Models
 */
class ContentType extends \Illuminate\Database\Eloquent\Model
{
    protected $table = 'content_types';

    protected $fillable = [
        'name'
    ];

    public function contents()
    {
        return $this->hasMany(\App\Models\Content::class, 'type_id');
    }
}
