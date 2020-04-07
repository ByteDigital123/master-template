<?php

namespace App\Repositories\AdminUser;

use App\Models\AdminUser;
use App\Repositories\AdminUser\AdminUserInterface;
use App\Repositories\BaseRepository;

class EloquentAdminUserRepository extends BaseRepository implements AdminUserInterface
{
    public $model;

    function __construct(AdminUser $model) {
        $this->model = $model;
    }

    public function create(array $attributes)
    {
        return $this->model->create([
            'first_name' => $attributes['first_name'],
            'last_name'  => $attributes['last_name'],
            'email'      => $attributes['email'],
            'password'   => bcrypt($attributes['password']),
        ]);
    }

    public function updateById($id, array $attributes)
    {
        return $this->model->where('id', $id)->update([
            'first_name' => $attributes['first_name'],
            'last_name'  => $attributes['last_name'],
            'email'      => $attributes['email'],
            'password'   => isset($attributes['password']) ? bcrypt($attributes['password']) : null,
        ]);
    }
}
