<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\News;
use Faker\Generator as Faker;

$factory->define(News::class, function (Faker $faker) {
    return [
        'title' => $faker->unique()->name,
        'description' => $faker->regexify('[A-Za-z0-9]{20}'),
        'content' => $faker->paragraph(),
        'date' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'image' => $faker->imageUrl(640, 480, 'club')
    ];
});
