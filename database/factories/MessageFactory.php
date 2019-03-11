<?php

use Faker\Generator as Faker;

$factory->define( App\Message::class, function (Faker $faker) {
    return [
        'tw_id' => $faker->sha256,
		'message' => $faker->paragraph,
		'status' => $faker->numberBetween(1,2)
    ];
});
