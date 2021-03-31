<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Seminar_favorite;
use Faker\Generator as Faker;

$factory->define(Seminar_favorite::class, function (Faker $faker) {

    return [
        'seminar_id' => $faker->word,
        'user_id' => $faker->word,
        'created_by' => $faker->word,
        'updated_by' => $faker->word,
        'deleted_by' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
