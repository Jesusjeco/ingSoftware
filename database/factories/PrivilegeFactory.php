<?php

/** @var  \Illuminate\Database\Eloquent\Factory $factory */

use App\Privilege;
use Faker\Generator as Faker;
use App\Activity;
use App\Role;
use App\Person;
use App\Event;


$factory->define(Privilege::class, function (Faker $faker) {
    return [
        'role_id' => factory(Role::class),
        'activity_id' => factory(Activity::class),
        'event_id' => factory(Event::class),
        'person_id' => factory(Person::class),
        'date' => $faker->optional()->word,
        //activity BelongsTo Activity activity_id
        //role BelongsTo Role role_id
        //person BelongsTo Person person_id
        //event BelongsTo Event event_id
    ];
});
