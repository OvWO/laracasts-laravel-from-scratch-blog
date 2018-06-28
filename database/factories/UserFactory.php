<?php

use Faker\Generator as Faker;

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

$factory->define(App\User::class, function (Faker $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        // 'avatar' => $faker->image('public/uploads/avatars',300,300),
        // 'avatar' => $faker->imageUrl($width = 640, $height = 480),
        'token' => str_random(25),
        'remember_token' => str_random(10),
    ];
});
