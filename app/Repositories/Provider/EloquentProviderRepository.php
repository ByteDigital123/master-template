<?php

namespace App\Repositories\Provider;

use App\Models\Provider;
use App\Repositories\BaseRepository;
use App\Repositories\Provider\ProviderInterface;

class EloquentProviderRepository extends BaseRepository implements ProviderInterface
{
    public $model;

    function __construct(Provider $model) {
        $this->model = $model;
    }
}
