<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Mature;
use Faker\Generator as Faker;

$factory->define(Mature::class, function (Faker $faker) {
    return [
        'name' => $faker->text(30),
        'birth_at' => $faker->date(),
        'cpf' => $faker->text(15),
        'registered_at' => $faker->date(),
        'address' => $faker->text(45),
        'district_id' => factory(App\District::class),
        'NIS' => $faker->text(20),
    ];
});
