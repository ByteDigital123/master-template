<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\Models\CategoriesCourse::class, function (Faker $faker) {
    return [
        'category_id' => $faker->numberBetween(1,4),
        'course_id' => $faker->numberBetween(1,50),
    ];
});
