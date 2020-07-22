<?php

namespace App\Http\SearchFilters\Api\EmailVerification;

use App\Http\SearchFilters\ApiSearchableTrait;
use App\Models\EmailVerification;

class EmailVerificationSearch
{
    protected static $model = EmailVerification::class;
    protected static $namespace = __NAMESPACE__;

    use ApiSearchableTrait;
}
