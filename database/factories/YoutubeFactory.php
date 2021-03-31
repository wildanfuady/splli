<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Youtube;
use Faker\Generator as Faker;

$factory->define(Youtube::class, function (Faker $faker) {

    return [
        'name' => $faker->word,
        'link' => $faker->word,
        'created_by' => $faker->word,
        'updated_by' => $faker->word,
        'deleted_by' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
