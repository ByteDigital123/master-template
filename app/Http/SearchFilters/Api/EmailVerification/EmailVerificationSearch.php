<?php

namespace App\Http\SearchFilters\Api\EmailVerification;

use App\Models\EmailVerification;
use App\Http\SearchFilters\ApiSearchableTrait;

class EmailVerificationSearch
{
    protected static $model = EmailVerification::class;
    protected static $namespace = __NAMESPACE__;

    use ApiSearchableTrait;
}
