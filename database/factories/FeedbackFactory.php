<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(App\Models\Feedback::class, function (Faker $faker, array $fields) {
    return [
        'message' => $faker->text,
        'raiting' => $faker->randomFloat($nbMaxDecimals = 1, $min = 1, $max = 5),
        
        'user_id' => function(int $user_id){
            return App\Models\User::find($user_id)->id;
        },

        'club_id' => function(int $club_id){
            return App\Models\Club::find($club_id)->id;
        }
    ];
});
