<?php

use Faker\Generator as Faker;
use App\Models\User;
use App\Models\Space;

$factory->define(App\Models\Issue::class, function (Faker $faker) {
	$user = User::query()->inRandomOrder()->first();
	$space = Space::query()->inRandomOrder()->first();
    return [
        'space_id' => $space->space_id,
        'title' => $faker->sentence,
        'description' => $faker->sentence,
        'product_ids' => '',
        'priority' => random_int(0, 5),
        'feedback_at' => $faker->dateTime,
        'feedback_name' => $faker->name,
        'feedback_email' => $faker->email,
        'solution' => $faker->sentence,
        'solved_at' => $faker->dateTime,
        'solved_uid' => $user->uid,
        'is_feature' => 0,
        'status' => 0,
        'is_del' => 0,
        'created_uid' => $user->uid,
    ];
});
