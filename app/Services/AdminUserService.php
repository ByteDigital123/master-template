<?php

namespace App\Services;

use App\Models\AdminUser;

class AdminUserService
{
    protected $query;

    public function __construct(AdminUser $model)
    {
        $this->model = $model;
    }

    /**
     * count the model data
     *
     * @return
     */
    public function count($with = [])
    {
        return $this->model->with($with)->count();
    }

    /**
     * get all of the model data
     *
     * @return
     */
    public function get($with = [])
    {
        return $this->model->with($with)->get();
    }

    /**
     * get all of the model data
     *
     * @return
     */
    public function all($with = [])
    {
        return $this->model->with($with)->all();
    }

    /**
     * get all of the data from the repository
     *
     * @return
     */
    public function paginated($num, $with = [])
{
    return $this->model->with($with)->paginate($num);
}

    /**
     * get all of the data from the repository
     *
     * @return
     */
    public function orderBy($column, $value, $with = [])
    {
        return $this->with($with)->orderBy($column, $value);
    }

    /**
     * get a single row of data
     *
     * @param integer $id
     * @return
     */
    public function getById($id, $with = [])
    {
        return $this->model->with($with)->find($id);
    }

    /**
     * return the data between specific dates
     *
     * @param date $from_date
     * @param date $to_date
     * @return
     */
    public function getBetweenDates($column, $from_date, $to_date, $paginateAmount = 12)
    {
        return $this->model->where($column, $from_date, '>')
            ->where($column, $to_date, '<')
            ->paginate($paginateAmount);
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
        return $this->model->where('id', $id)->update($attributes);
    }

    /**
     * delete single record
     *
     * @param array $attributes
     * @return void
     */
    public function delete($id)
    {
        return $this->getById($id)->delete();
    }

    /**
     * delete multiple records
     *
     * @param array $attributes
     * @return void
     */
    public function deleteMultiple($ids)
    {
        foreach($ids AS $id){
            $this->getById($id)->delete();
        }

        return true;
    }
}
