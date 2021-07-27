<?php

/** @var  \Illuminate\Database\Eloquent\Factory $factory */

use App\Activity;
use Faker\Generator as Faker;
use App\Privilege;


$factory->define(Activity::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'description' => $faker->text,
        //privileges HasMany Privilege id
    ];
});
