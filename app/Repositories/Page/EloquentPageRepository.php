<?php

namespace App\Repositories\Page;

use App\Models\Page;
use App\Repositories\BaseRepository;
use App\Repositories\Page\PageInterface;

class EloquentPageRepository extends BaseRepository implements PageInterface
{
    public $model;

    function __construct(Page $model) {
        $this->model = $model;
    }
}
