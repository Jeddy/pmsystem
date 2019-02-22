<?php

use Faker\Generator as Faker;
use App\Models\Corp;

$factory->define(App\Models\Department::class, function (Faker $faker) {
	$corp = Corp::query()->inRandomOrder()->first();
	$departs = ['市场部', '财务部', '技术部', '产品部', '销售部', '政府事务部', '客服部', '总裁办', '生产部'];
    return [
        'corp_id' => $corp->corp_id,
        'depart_name' => $departs[random_int(0, 8)],
        'depart_email' => $faker->email,
        'parent_id' => 0,
        'status' => 0,
    ];
});
