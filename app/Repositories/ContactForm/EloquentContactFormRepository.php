<?php

namespace App\Repositories\ContactForm;

use App\Models\ContactForm;
use App\Repositories\BaseRepository;
use App\Repositories\ContactForm\ContactFormInterface;

class EloquentContactFormRepository extends BaseRepository implements ContactFormInterface
{
    public $model;

    function __construct(ContactForm $model) {
        $this->model = $model;
    }
}
