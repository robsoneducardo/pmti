<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Session;
use Faker\Generator as Faker;

$factory->define(Session::class, function (Faker $faker) {
    return [
        'activity_id' => factory(App\Activity::class),
        'minister_id' => factory(App\Minister::class),
        'day' => $faker->date(),
        'hour' => $faker->date(),
    ];
});
