<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Participant;
use Faker\Generator as Faker;

$factory->define(Participant::class, function (Faker $faker) {

    return [
        'full_name' => $faker->word,
        'email' => $faker->word,
        'image' => $faker->word,
        'about' => $faker->text,
        'status' => $faker->randomElement(['active', 'inactive']),
        'user_id' => $faker->word,
        'created_by' => $faker->word,
        'updated_by' => $faker->word,
        'deleted_by' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
