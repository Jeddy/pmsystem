<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Corp::class, function (Faker $faker) {
    return [
        'name' => $faker->company,
        'contact_name' => $faker->name,
        'contact_phone' => $faker->phoneNumber,
        'status' => $faker->boolean(50),
    ];
});
