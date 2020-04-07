<?php

namespace App\Repositories\Address;

use App\Models\Address;
use App\Repositories\Address\AddressInterface;
use App\Repositories\BaseRepository;

class EloquentAddressRepository extends BaseRepository implements AddressInterface
{
    public $model;

    function __construct(Address $model) {
        $this->model = $model;
    }

}
