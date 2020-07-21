<?php

/**
 * Generated file
 */

namespace App\Models;

/**
 * Class Content
 *
 * @property int $id
 * @property int $model_id
 * @property string $model_type
 * @property int $type_id
 * @property string $file_name
 * @property string $mime_type
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 *
 * @property \App\Models\ContentType $content_type
 *
 * @package App\Models
 */
class Content extends \Illuminate\Database\Eloquent\Model
{
    protected $casts = [
        'model_id' => 'int',
    ];

    protected $fillable = [
        'model_id',
        'model_type',
        'file_name',
        'mime_type'
    ];

    public function content_type()
    {
        return $this->belongsTo(\App\Models\ContentType::class, 'type_id');
    }

}
