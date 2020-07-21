<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $table = 'countries';

    protected $fillable = [
        'name',
        'code',
        'currency_name',
        'dial_code',
        'currency_symbol',
        'currency_code',
    ];
}
