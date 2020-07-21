<?php

/**
 * Generated file
 */

namespace App\Models;

/**
 * Class TransactionStatus
 *
 * @property int $id
 * @property string $name
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 *
 * @property \Illuminate\Database\Eloquent\Collection|\App\Models\Transaction[] $transactions
 *
 * @package App\Models
 */
class TransactionStatus extends \Illuminate\Database\Eloquent\Model
{
    protected $fillable = [
        'name'
    ];

    public function transactions()
    {
        return $this->hasMany(\App\Models\Transaction::class, 'status_id', 'id');
    }
}
