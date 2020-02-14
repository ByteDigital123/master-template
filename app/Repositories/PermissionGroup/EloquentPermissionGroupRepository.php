<?php

namespace App\Repositories\PermissionGroup;

use App\Models\PermissionGroup;
use App\Repositories\BaseRepository;
use App\Repositories\PermissionGroup\PermissionGroupInterface;

class EloquentPermissionGroupRepository extends BaseRepository implements PermissionGroupInterface
{
    public $model;

    function __construct(PermissionGroup $model) {
        $this->model = $model;
    }
}
