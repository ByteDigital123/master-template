<?php

namespace App\Services;

use App\Repositories\Course\CourseInterface;

class CourseService
{
    protected $model;

    public function __construct(CourseInterface $model)
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
        return $this->model->paginate(config('swell.pagination'));
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
    public function getFeatured()
    {
        return $this->model->where('featured', true)->get();
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
                           ->paginate(config('swell.pagination'));
    }

    public function search($attributes)
    {
        return $this->model->searchCourse($attributes);
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
