<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Club;
use App\Service\Photo\ImageUploader;
use Faker\Generator as Faker;

$factory->define(Club::class, function (Faker $faker) {
    return [
        'title' => $faker->unique()->name(),
        'schedule' => $faker->time($format = 'H:i', $max = 'now') . '-' . $faker->time($format = 'H:i', $max = 'now'),
        'description' => $faker->paragraph(),
        'discount'=> 0,
        'photos' => [
            ImageUploader::run('http://placeimg.com/640/480/sepia', 'jpg'),
            ImageUploader::run('http://placeimg.com/640/480/sepia', 'jpg'),
            ImageUploader::run('http://placeimg.com/640/480/sepia', 'jpg'),
        ],
    ];
});
