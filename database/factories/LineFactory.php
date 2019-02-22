<?php

use Faker\Generator as Faker;
use App\Models\Space;

$factory->define(App\Models\Line::class, function (Faker $faker) {
	$space = Space::query()->inRandomOrder()->first();
	$names = ['C端业务线', 'B端业务线', '数据业务', '智能硬件', '云业务'];
    return [
        'name' => $names[random_int(0, 4)],
        'description' => $faker->sentence,
        'space_id' => $space->space_id,
        'status' => 0,
    ];
});
