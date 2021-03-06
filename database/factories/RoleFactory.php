<?php

/** @var  \Illuminate\Database\Eloquent\Factory $factory */

use App\Role;
use Faker\Generator as Faker;
use App\Privilege;


$factory->define(Role::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'description' => $faker->text,
        //privileges HasMany Privilege id
    ];
});
