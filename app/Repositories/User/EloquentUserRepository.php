<?php

namespace App\Repositories\User;

use App\Models\User;
use App\Repositories\BaseRepository;
use App\Repositories\User\UserInterface;

class EloquentUserRepository extends BaseRepository implements UserInterface
{
    public $model;

    function __construct(User $model) {
        $this->model = $model;
    }
}
