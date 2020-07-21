<?php

namespace App\Models;

/**
 * Generated file
 */

/**
 * Class EmailVerification
 *
 * @property int $id
 * @property int $user_id
 * @property string $verification_code
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 *
 * @property \App\Models\User $user
 *
 * @package App\Models
 */
class EmailVerification extends \Illuminate\Database\Eloquent\Model
{
    protected $casts = [
        'user_id' => 'int'
    ];

    protected $fillable = [
        'user_id',
        'verification_code'
    ];

    public function user()
    {
        return $this->belongsTo(\App\Models\User::class);
    }
}
