<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Topic;
use Faker\Generator as Faker;

$factory->define(App\Topic::class, function (Faker $faker) {
    return [
        'id' => $faker->randomNumber(),
        'user_id' => $faker->randomNumber(),
        'title' => $faker->word(),
        'detail' => $faker->word(),
        'status' => '1',
        'created_at' => date('Y-m-d H:i:s'),
        'updated_at' => date('Y-m-d H:i:s'),
    ];
});
