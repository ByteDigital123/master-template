<?php

namespace App\Repositories\Course;

use App\Models\Course;
use App\Repositories\BaseRepository;
use App\Repositories\Course\CourseInterface;
use Illuminate\Support\Str;

class EloquentCourseRepository extends BaseRepository implements CourseInterface
{
    public $model;

    function __construct(Course $model) {
        $this->model = $model;
    }

    public function create(array $attributes)
    {
        $course = $this->model->create([
            'provider_id'           => $attributes['provider']['id'],
            'title'                 => $attributes['title'],
            'provider_price'        => $attributes['provider_price'],
            'retail_price'          => $attributes['retail_price'],
            'description'           => $attributes['description'],
            'featured'              => isset($attributes['featured']) ? $attributes['featured'] : false,
            'excerpt'               => $attributes['excerpt'],
            'duration'              => $attributes['duration'],
            'main_image'            => $attributes['main_image'][0],
            'provider_reference_id' => isset($attributes['provider_reference_id']) ? $attributes['provider_reference_id'] : null,
            'modules'               => isset($attributes['modules']) ? $attributes['modules'] : null,
            'skills_learned'        => isset($attributes['skills_learned']) ? $attributes['skills_learned'] : null
        ]);

        $course->categories()->sync(collect($attributes['categories'])->pluck('id'));

        return true;
    }

    public function updateById($id, array $attributes)
    {
        $course = $this->model->find($id);
        $course->update([
            'provider_id'           => $attributes['provider']['id'],
            'title'                 => $attributes['title'],
            'provider_price'        => $attributes['provider_price'],
            'retail_price'          => $attributes['retail_price'],
            'description'           => $attributes['description'],
            'featured'              => isset($attributes['featured']) ? $attributes['featured'] : false,
            'excerpt'               => $attributes['excerpt'],
            'duration'              => $attributes['duration'],
            'main_image'            => $attributes['main_image'][0],
            'provider_reference_id' => isset($attributes['provider_reference_id']) ? $attributes['provider_reference_id'] : null,
            'modules'               => isset($attributes['modules']) ? $attributes['modules'] : null,
            'skills_learned'        => isset($attributes['skills_learned']) ? $attributes['skills_learned'] : null
        ]);

        $course->categories()->sync(collect($attributes['categories'])->pluck('id'));

        return true;

    }

}
