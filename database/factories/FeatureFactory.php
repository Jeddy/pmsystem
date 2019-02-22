<?php

use Faker\Generator as Faker;
use App\Models\User;
use App\Models\Space;
use App\Models\Department;
use App\Models\Issue;

$factory->define(App\Models\Feature::class, function (Faker $faker) {
	$label = ['优化', '新增'];
	$user = User::query()->inRandomOrder()->first();
	$space = Space::query()->inRandomOrder()->first();
	$line = $space->lines->first();
	$category = $line->categories->first();
    return [
        'space_id' => $space->space_id,
        'title' => $faker->sentence,
        'description' => $faker->sentence,
        'business_value' => $faker->sentence,
        'priority' => random_int(0, 4),
        'label' => $label[random_int(0, 1)],
        'label_custom' => '',
        'category_id' => $category->category_id,
        'from_depart_id' => Department::query()->inRandomOrder()->first(),
        'from_employee' => $faker->name,
        'from_employee_email' => $faker->email,
        'followed_uid' => $user->uid,
        'issue_id' => Issue::query()->inRandomOrder()->first(),
        'parent_id' => 0,
        'status' => 0,
        'is_del' => 0,
        'created_uid' => $user->uid,
    ];
});
