<?php

namespace App\Services;

use App\Repositories\Page\PageInterface;

class PageService
{
    protected $query;

    public function __construct(PageInterface $model)
    {
        $this->model = $model;
    }

    /**
     * get all of the data from the repository
     *
     * @return collection
     */
    public function getAll()
    {
        return $this->model->paginate(config('site.pagination'));
    }

    /**
     * get a single row of data
     *
     * @param integer $id
     * @return collection
     */
    public function getById($id)
    {
        return $this->model->getById($id);
    }

    /**
     * get a single row of data
     *
     * @param integer $id
     * @return collection
     */
    public function getBySlug($slug)
    {
        return $this->model->getBySlug($slug);
    }

    /**
     * return the data between specific dates
     *
     * @param date $from_date
     * @param date $to_date
     * @return collection
     */
    public function getBetweenDates($column, $from_date, $to_date)
    {
        return $this->model->where($column, $from_date, '>')
                           ->where($column, $to_date, '<')
                           ->paginate(config('site.pagination'));
    }

    /**
     * store the data
     *
     * @param array $attributes
     * @return json
     */
    public function store($attributes)
    {
        return $this->model->create($attributes);
    }

    /**
     * update the data
     *
     * @param integer $id
     * @param array $attributes
     * @return json
     */
    public function update($id, $attributes)
    {
        return $this->model->updateById($id, $attributes);
    }

    /**
     * delete the data
     *
     * @param array $attributes
     * @return void
     */
    public function destroy($attributes)
    {
        return $this->model->deleteMultipleById($attributes);
    }
}
