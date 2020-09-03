<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Owner;
use Faker\Generator as Faker;

$factory->define(Owner::class, function (Faker $faker) {
    return [
        'doc_id'=>$faker->unique()->numberBetween($min = 10000, $max = 200000, $function = 'sqrt'),
        'name'=>$faker->name,
        'last_name'=>$faker->lastName,
        'phone'=>$faker->numberBetween($min = 10000000, $max = 100000000, $function = 'sqrt'),
    ];
});
