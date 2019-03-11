<?php

use App\Contact;
use Faker\Generator as Faker;

$factory->define(Contact::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
		'user_id' => 1,
		'number' => $faker->unique()->phoneNumber
    ];
});
