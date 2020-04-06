<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Minister;
use Faker\Generator as Faker;

$factory->define(Minister::class, function (Faker $faker) {
    return [
        'name' => $faker->text(30),
    ];
});
