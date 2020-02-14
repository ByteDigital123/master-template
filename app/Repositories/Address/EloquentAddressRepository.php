<?php

namespace App\Repositories\Address;

use App\Models\Address;
use App\Repositories\Address\AddressInterface;
use App\Repositories\BaseRepository;

class EloquentAddressRepository extends BaseRepository implements AddressInterface
{
    public $model;

    function __construct(
        Address $model
    ) {
        $this->model = $model;
    }

    public function store($address_line_one, $address_line_two, $city, $county, $postcode, $country_id = null)
    {
        return $this->model->firstOrCreate([
           'address_line_one' => $address_line_one,
           'address_line_two' => $address_line_two,
           'postcode' => $postcode,
        ],[
           'address_line_one' => $address_line_one,
           'address_line_two' => $address_line_two,
           'city' => $city,
           'county' => $county,
           'country_id' => !is_null($country_id) ? $country_id : 1,
           'postcode' => $postcode,
        ]);
    }

    public function updateById($id, array $attributes)
    {
        return $this->model->where('id', $id)->update([
            'address_line_one' => $attributes['address_line_1'],
            'address_line_two' => $attributes['address_line_2'],
            'city' => $attributes['city'],
            'county' => $attributes['county'],
            'postcode' => $attributes['postcode'],
        ]);
    }
}
