<?php

namespace App\Services;

use App\Repositories\Transaction\TransactionInterface;
use Illuminate\Support\Facades\DB;

class TransactionService
{
    protected $model;
    protected $userService;
    protected $addressService;
    protected $courseService;

    public function __construct(
        TransactionInterface $model,
        UserService $userService,
        AddressService $addressService,
        CourseService $courseService
    ){
        $this->model = $model;
        $this->userService = $userService;
        $this->addressService = $addressService;
        $this->courseService = $courseService;
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

    /**
     * store the data
     *
     * @param array $attributes
     * @return json
     */
    public function store($attributes)
    {
        DB::transaction(function() use($attributes){
            // Create Address
            $this->addressService->store($attributes['billing']);

            // Create User
            $this->userService->store($attributes['user']);

            // Find Course
            $course = $this->courseService->getById($attributes['course']['id']);

            // Take Payment
            (new SagePaymentGateway())->processTransaction($attributes['user'], $attributes['card_details'], $attributes['billing'], $attributes['shipping'], $course);

            // Create user on VideoTile API
            (new VideoTileService())->createUser($attributes['user']['first_name'], $attributes['user']['last_name'], $attributes['user']['email'], $attributes['user']['phone_number']);

            // Assign user to VideoTile Course
            (new VideoTileService())->assignCourseByUserId('','');

            // Send notifications


        }, 5);



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
