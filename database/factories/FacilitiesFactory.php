<?php

use Faker\Generator as Faker;

$factory->define(App\Facility::class, function (Faker $faker) {
    return [

            'name' => $faker->secondaryAddress,
            'created_at' => $faker->dateTimeBetween($startDate = '-3 years', $endDate = '-2 years', $timezone = null),
            'updated_at' => $faker->dateTimeThisYear($max = 'now', $timezone = null) ,

        ];
});
