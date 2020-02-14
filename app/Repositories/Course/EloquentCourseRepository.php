<?php

namespace App\Repositories\Course;

use App\Models\Course;
use App\Repositories\BaseRepository;
use App\Repositories\Course\CourseInterface;

class EloquentCourseRepository extends BaseRepository implements CourseInterface
{
    public $model;

    function __construct(Course $model) {
        $this->model = $model;
    }
}
