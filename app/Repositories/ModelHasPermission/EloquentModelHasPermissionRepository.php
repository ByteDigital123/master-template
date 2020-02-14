<?php

namespace App\Repositories\ModelHasPermission;

use App\Models\ModelHasPermission;
use App\Repositories\BaseRepository;
use App\Repositories\ModelHasPermission\ModelHasPermissionInterface;

class EloquentModelHasPermissionRepository extends BaseRepository implements ModelHasPermissionInterface
{
    public $model;

    function __construct(ModelHasPermission $model) {
        $this->model = $model;
    }
}
