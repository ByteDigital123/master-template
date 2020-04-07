<?php

namespace App\Repositories\User;

use App\Models\User;
use App\Repositories\BaseRepository;
use App\Repositories\User\UserInterface;
use App\Services\AddressService;

class EloquentUserRepository extends BaseRepository implements UserInterface
{
    public $model;
    private $address;

    function __construct(
        User $model,
        AddressService $address
    ){
        $this->model = $model;
        $this->address = $address;
    }

    public function create(array $attributes)
    {
        if(isset($attributes['address'])){
            $address = $this->address->store($attributes['address']);
        }

        return $this->model->create([
            'first_name' => 'Alex',
            'last_name' => 'Etel',
            'username' => 'AlexEtel',
            'email' => 'Alex@builtbypixel.com',
            'telephone' => '07775552221',
            'address_id' => isset($attributes['address']) ? $address->id : null
        ]);
    }

}
