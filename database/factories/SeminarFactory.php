<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Seminar;
use Faker\Generator as Faker;

$factory->define(Seminar::class, function (Faker $faker) {

    return [
        'name' => $faker->word,
        'status' => $faker->randomElement(['active', 'inactive']),
        'desctiption' => $faker->text,
        'content' => $faker->text,
        'date_start' => $faker->word,
        'date_end' => $faker->word,
        'time_start' => $faker->word,
        'time_end' => $faker->word,
        'price' => $faker->word,
        'user_id' => $faker->word,
        'thumbnail' => $faker->word,
        'category_id' => $faker->word,
        'created_by' => $faker->word,
        'updated_by' => $faker->word,
        'deleted_by' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
