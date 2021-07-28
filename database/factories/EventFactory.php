<?php

/** @var  \Illuminate\Database\Eloquent\Factory $factory */

use App\Event;
use Faker\Generator as Faker;
use App\Attendee;


$factory->define(Event::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'description' => $faker->text,
        'address' => $faker->text,
        'date' => $faker->word,
        //attendees HasMany Attendee id
    ];
});
