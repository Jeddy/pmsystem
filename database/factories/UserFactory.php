<?php

use Faker\Generator as Faker;

$factory->define(App\Models\User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->email,
        'phone' => $faker->phoneNumber,
        'password' => bcrypt('000000'),
        'email_verified' => random_int(0, 1),
        'status' => 0,
    ];
});
