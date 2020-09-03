<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Car;
use Faker\Generator as Faker;

$factory->define(Car::class, function (Faker $faker) {
    return [
        'plate'=>$faker->unique()->firstNameFemale,
        'car_brand'=>$faker->firstName,
        'car_config'=>$faker->lastName,
        'owner_id'=>$faker->numberBetween($min = 1, $max = 100, $function = 'sqrt'),
    ];
});
