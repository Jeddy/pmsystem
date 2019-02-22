<?php

use Faker\Generator as Faker;
use App\Models\User;

$factory->define(App\Models\Corp::class, function (Faker $faker) {

	$user = User::query()->inRandomOrder()->first();

    return [
        'name' => $faker->company,
        'uid' => $user->uid,
        'status' => $faker->boolean(50),
    ];
});
