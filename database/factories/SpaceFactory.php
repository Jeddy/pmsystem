<?php

use Faker\Generator as Faker;
use App\Models\Corp;

$factory->define(App\Models\Space::class, function (Faker $faker) {

	$corp = Corp::query()->inRandomOrder()->first();

    return [
        'name' => $faker->word,
        'description' => $faker->text,
        'thumb' => '/css/test/300.png',
        'corp_id' => $corp->corp_id,
        'status' => $faker->numberBetween(0, 2),
    ];
});
