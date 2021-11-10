<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\User;
use App\Models\Role;
use App\Models\UserProfile;
use App\Models\Raiting;
use Faker\Generator as Faker;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(User::class, function (Faker $faker, array $fields) {
    $user_profile = UserProfile::create([
        'level' => $faker->numberBetween(1, 10),
        'buyed_ticket_current_level' => $faker->numberBetween(1, 10)
    ]);
    return [
        'name' => $faker->unique()->name,
        'surname' => $faker->unique()->lastName,
        'nickname' => $faker->unique()->name,
        'country' => $faker->country,
        'phone' => $faker->phoneNumber,
        'birthday' => $faker->date,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => Hash::make('123123'), // password
        'remember_token' => Str::random(10),
        'role_id' => Role::all()->shuffle()->first()->id,
        'raiting_id' => function(int $raiting_id){
            return Raiting::find($raiting_id)->id;
        },
        'user_profile_id' => $user_profile->id
    ];
});
