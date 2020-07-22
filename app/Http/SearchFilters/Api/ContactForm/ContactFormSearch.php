<?php

namespace App\Http\SearchFilters\Api\ContactForm;

use App\Http\SearchFilters\ApiSearchableTrait;
use App\Models\ContactForm;

class ContactFormSearch
{
    protected static $model = ContactForm::class;
    protected static $namespace = __NAMESPACE__;

    use ApiSearchableTrait;
}
