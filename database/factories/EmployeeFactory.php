<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Employee;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Employee::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'phone' =>$faker->phoneNumber,
        'email' => $faker->unique()->safeEmail,
        'branch_id' => '5',
        'email_verified_at' => now(),
        'password' => 'password', // password
        'verification_code' => Str::random(6),
        'address' => $faker->address,

    ];
});
