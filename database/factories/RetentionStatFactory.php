<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\RetentionStat;
use Faker\Generator as Faker;
use Illuminate\Support\Carbon;

$factory->define(RetentionStat::class, function (Faker $faker) {
    return [
        'user_id' => rand(1, 5000),
        'created_at' => Carbon::now()->subDays(rand(1, 28)),
        'onboarding_percentage' => rand(0,100),
        'count_applications' => rand(0, 20),
        'count_accepted_applications' => rand(0, 20)
    ];
});
