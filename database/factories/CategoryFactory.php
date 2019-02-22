<?php

use Faker\Generator as Faker;
use App\Models\Line;

$factory->define(App\Models\Category::class, function (Faker $faker) {
	$names = ['营销', '会员', '用户体验', '订单', '工作', '外卖', '自提'];
    return [
        'name' => $names[random_int(0, 6)],
        'description' => $faker->sentence,
        'line_id' => Line::query()->inRandomOrder()->first(),
        'parent_id' => 0,
        'is_directory' => 0,
        'level' => 0,
        'path' => '',
        'status' => 0
    ];
});
