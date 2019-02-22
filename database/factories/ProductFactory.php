<?php

use Faker\Generator as Faker;
use App\Models\Line;
use App\Models\User;

$factory->define(App\Models\Product::class, function (Faker $faker) {
	$names = ['iOS APP', 'android App', 'H5', 'Web端', '微信小程序', 'CRM系统', 'CMS系统', '财务系统', 'ERP'];
    return [
        'name' => $names[random_int(0, 8)],
        'description' => $faker->sentence,
        'ower_uid' => User::query()->inRandomOrder()->first(),
        'line_id' => Line::query()->inRandomOrder()->first(),
        'status' => 0,
    ];
});
