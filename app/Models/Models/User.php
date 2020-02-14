<?php

/**
 * Generated file
 */

namespace App\Models;
use App\Services\PaymentService;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;


/**
 * Class User
 * 
 * @property int $id
 * @property string $first_name
 * @property string $last_name
 * @property string $username
 * @property int $address_id
 * @property string $email
 * @property \Carbon\Carbon $date_of_birth
 * @property string $password
 * @property string $payment_gateway_reference
 * @property int $email_verified
 * @property string $referral_link
 * @property int $referred_by
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Models\Address $address
 * @property \App\Models\BankDetail $bank_detail
 * @property \Illuminate\Database\Eloquent\Collection|\App\Models\EmailVerification[] $email_verifications
 * @property \Illuminate\Database\Eloquent\Collection|\App\Models\Subscription[] $subscriptions
 * @property \Illuminate\Database\Eloquent\Collection|\App\Models\Transaction[] $transactions
 *
 * @package App\Models
 */
class User extends Authenticatable
{
    use SoftDeletes, Notifiable;

    protected $guard_name = 'web';

    public $table = 'users';

	protected $casts = [
		'address_id' => 'int',
		'email_verified' => 'bool',
		'referred_by' => 'int'
	];

	protected $dates = [
		'date_of_birth'
	];

	protected $hidden = [
		'password'
	];

	protected $fillable = [
		'first_name',
		'last_name',
		'username',
		'address_id',
		'email',
		'date_of_birth',
		'password',
		'payment_gateway_reference',
		'email_verified',
        'private_profile',
		'referral_link',
		'referred_by'
	];

	public function address()
    {
        return $this->belongsTo(\App\Models\Address::class);
    }

    public function referrals()
    {
        return $this->hasMany(User::class, 'referred_by', 'referral_id');
	}

	public function referred_by()
    {
        return $this->belongsTo(User::class, 'referred_by', 'referral_id');
	}

}
