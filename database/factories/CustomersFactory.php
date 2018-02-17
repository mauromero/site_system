<?php

use Faker\Generator as Faker;

$factory->define(App\Customer::class, function (Faker $faker) {
    return [
        'company' => $faker->company,
        'name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'phone' => $faker->phoneNumber,
        'cellphone' => $faker->phoneNumber,
        'address' => $faker->address,
        'email' => $faker->email,
        'created_at' => $faker->dateTimeBetween($startDate = '-2 years', $endDate = '-1 years', $timezone = null),
        'updated_at' => $faker->dateTimeThisYear($max = 'now', $timezone = null) ,
    ];
});
