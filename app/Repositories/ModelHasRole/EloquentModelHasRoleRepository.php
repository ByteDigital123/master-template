<?php

namespace App\Repositories\ModelHasRole;

use App\Models\ModelHasRole;
use App\Repositories\BaseRepository;
use App\Repositories\ModelHasRole\ModelHasRoleInterface;

class EloquentModelHasRoleRepository extends BaseRepository implements ModelHasRoleInterface
{
    public $model;

    function __construct(ModelHasRole $model) {
        $this->model = $model;
    }
}
