<?php

/** @var  \Illuminate\Database\Eloquent\Factory $factory */

use App\Person;
use Faker\Generator as Faker;


$factory->define(Person::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'last_name' => $faker->lastName,
        'birthday' => $faker->optional()->word,
        'address' => $faker->optional()->text,
        'number' => $faker->optional()->text,
        'email' => $faker->optional()->safeEmail,
    ];
});
