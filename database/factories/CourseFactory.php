<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Course;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(\App\Models\Course::class, function (Faker $faker) {
    return [
        'provider_id' => 1,
        'title' => $faker->jobTitle,
        'provider_price' => $faker->randomFloat(),
        'retail_price' => $faker->randomFloat(),
        'description' => $faker->realText(),
        'featured' => $faker->boolean,
        'excerpt' => $faker->text,
        'duration' => $faker->randomFloat(),
        'main_image' => $faker->imageUrl(),
        'provider_reference_id' => $faker->uuid,
        'slug' => $faker->slug,
    ];
});
