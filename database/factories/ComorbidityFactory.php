<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Comorbidity;
use Faker\Generator as Faker;

$factory->define(Comorbidity::class, function (Faker $faker) {
    return [
        'name' => $faker->text(30),
    ];
});
