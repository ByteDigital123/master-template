<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContactForm extends Model
{
    protected $casts = [
        'first_name' => 'string',
        'last_name' => 'string',
        'phone_number' => 'string',
        'email' => 'string',
        'subject' => 'string',
        'message' => 'text'
    ];

    protected $fillable = [
        'first_name',
        'last_name',
        'phone_number',
        'email',
        'subject',
        'message'
    ];

}
