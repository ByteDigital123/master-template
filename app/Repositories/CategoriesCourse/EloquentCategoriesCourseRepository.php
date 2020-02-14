<?php

namespace App\Repositories\CategoriesCourse;

use App\Models\CategoriesCourse;
use App\Repositories\BaseRepository;
use App\Repositories\CategoriesCourse\CategoriesCourseInterface;

class EloquentCategoriesCourseRepository extends BaseRepository implements CategoriesCourseInterface
{
    public $model;

    function __construct(CategoriesCourse $model) {
        $this->model = $model;
    }
}
