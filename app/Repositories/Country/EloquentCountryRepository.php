<?php

namespace App\Repositories\Country;

use App\Models\Country;
use App\Repositories\BaseRepository;
use App\Repositories\Country\CountryInterface;

class EloquentCountryRepository extends BaseRepository implements CountryInterface
{
    public $model;

    function __construct(Country $model) {
        $this->model = $model;
    }
}
