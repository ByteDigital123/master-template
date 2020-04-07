<?php

namespace App\Http\SearchFilters\Website\ContactForm;

use App\Models\ContactForm;
use App\Http\SearchFilters\ApiSearchableTrait;

class ContactFormSearch
{
    protected static $model = ContactForm::class;
    protected static $namespace = __NAMESPACE__;

    use ApiSearchableTrait;
}
