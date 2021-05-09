<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Branch;
use Faker\Generator as Faker;

$factory->define(Branch::class, function (Faker $faker) {
    return [
        'name' => $faker->city,
        'phone' => $faker->unique()->phoneNumber,
        'email' => $faker->unique()->email,
        'Address' => $faker->unique()->address,

    ];
});
