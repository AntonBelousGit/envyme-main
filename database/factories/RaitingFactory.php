<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(App\Models\Raiting::class, function (Faker $faker, array $fields) {
    return [
        'club_id' => function(int $club_id){
            return App\Models\Club::find($club_id)->id;
        },
        'raiting' => $faker->randomFloat(2, 1, 5)
    ];
});
