<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\LocAttendance;
use Faker\Generator as Faker;

$factory->define(LocAttendance::class, function (Faker $faker) {

    return [
        'user_id' => $faker->word,
        'latitude' => $faker->word,
        'longitude' => $faker->word,
        'type' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s'),
        'deleted_at' => $faker->date('Y-m-d H:i:s')
    ];
});
