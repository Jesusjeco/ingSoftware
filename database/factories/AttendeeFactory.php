<?php

/** @var  \Illuminate\Database\Eloquent\Factory $factory */

use App\Attendee;
use Faker\Generator as Faker;
use App\Event;


$factory->define(Attendee::class, function (Faker $faker) {
    return [
        'event_id' => factory(Event::class),
        'person_id' => factory(Person::class),
        //event BelongsTo Event event_id
    ];
});
