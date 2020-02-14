<?php

namespace App\Repositories\Category;

use App\Models\Category;
use App\Repositories\BaseRepository;
use App\Repositories\Category\CategoryInterface;

class EloquentCategoryRepository extends BaseRepository implements CategoryInterface
{
    public $model;

    function __construct(Category $model) {
        $this->model = $model;
    }
}
