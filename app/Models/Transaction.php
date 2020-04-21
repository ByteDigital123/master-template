<?php

/**
 * Generated file
 */

namespace App\Models;



/**
 * Class Transaction
 * 
 * @property int $id
 * @property int $status_id
 * @property int $user_id
 * @property string $name
 * @property int $total
 * @property int $fee
 * @property int $net_amount
 * @property string $transaction_reference_id
 * @property string $provider_user_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Models\TransactionStatus $transaction_status
 *
 * @package App\Models
 */
class Transaction extends \Illuminate\Database\Eloquent\Model
{
	protected $casts = [
		'status_id' => 'int',
		'user_id' => 'int',
		'total' => 'int',
		'fee' => 'int',
		'net_amount' => 'int'
	];

	protected $fillable = [
		'status_id',
		'user_id',
		'name',
		'total',
		'fee',
		'net_amount',
		'transaction_reference_id',
		'provider_user_id',
		'course_id',
	];

	public function transaction_status()
	{
		return $this->belongsTo(\App\Models\TransactionStatus::class, 'status_id');
	}

    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id');
	}
}
