<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Sickness;
use Faker\Generator as Faker;

$factory->define(Sickness::class, function (Faker $faker) {
    return [
        'mature_id' => factory(App\Mature::class),
        'comorbidity_id' => factory(App\Comorbidity::class),
        'observation' => $faker->text(),
    ];
});
