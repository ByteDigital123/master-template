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

    public function getBySlug($slug)
    {
        return $this->model->whereSlug($slug)->first();
    }

    public function create(array $attributes)
    {
        return $this->model->create([
            'title' => $attributes['title'],
            'url' => $attributes['url'],
            'slug' => $attributes['slug'],
            'content' => json_encode($attributes['content']),
        ]);
    }

    public function updateById($id, array $attributes)
    {
        return $this->model->where('id', $id)->update([
            'title' => $attributes['title'],
            'url' => $attributes['url'],
            'slug' => $attributes['slug'],
            'content' => json_encode($attributes['content']),
        ]);
    }
}
