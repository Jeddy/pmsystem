<?php

use Faker\Generator as Faker;
use App\Models\User;
use App\Models\Corp;
use App\Models\Department;
use App\Models\UserCorp;

$factory->define(UserCorp::class, function (Faker $faker) {
	$user = User::query()->inRandomOrder()->first();
	$corp = Corp::query()->inRandomOrder()->first(); 
	$depart = Department::query()->where('corp_id', $corp->corp_id)->inRandomOrder()->first();
    return [
        'uid' => $user->uid,
        'corp_id' => $corp->corp_id,
        'depart_id' => $depart->depart_id,
        'oa_uid' => 0,
        'status' => 0,
        'is_default' => 0,
    ];
});
