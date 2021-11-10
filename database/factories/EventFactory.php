<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Event;
use App\Models\Club;
use App\Service\Photo\ImageUploader;
use Faker\Generator as Faker;

$factory->define(Event::class, function (Faker $faker) {
    
    $clubs = Club::all();
    $types = ['package', 'activity'];
    shuffle($types);
    return [
        'title' => $faker->unique()->name,
        'type' => $types[0],
        'amount_person' => $faker->randomDigit,
        'price' => $faker->randomFloat(2, 0, 100),
        'information' => $faker->paragraph(),
        'date' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'image' => ImageUploader::run('http://placeimg.com/640/480/sepia', 'jpg'),
        'club_id' =>  $clubs->shuffle()->first()->id,
    ];
});
