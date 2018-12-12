<?php

use Faker\Generator as Faker;
use App\Models\Corp;

$factory->define(App\Models\Space::class, function (Faker $faker) {

	$corp = Corp::query()->where('status', 0)->inRandomOrder()->first();

    return [
        'name' => $faker->word,
        'description' => $faker->text,
        'thumb' => 'https://timgsa.baidu.com/timg?image&quality=80&size=b9999_10000&sec=1544544654738&di=5ae2bd6d3c3c2f19d6f34672992c3e7c&imgtype=0&src=http%3A%2F%2Fpic.51yuansu.com%2Fpic3%2Fcover%2F01%2F88%2F30%2F5981e85028cc6_610.jpg',
        'corp_id' => $corp->corp_id,
        'status' => $faker->numberBetween(0, 2),
    ];
});
