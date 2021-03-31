<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\UangKeluar;
use Faker\Generator as Faker;

$factory->define(UangKeluar::class, function (Faker $faker) {

    return [
        'tanggal' => $faker->word,
        'qty' => $faker->randomDigitNotNull,
        'harga' => $faker->word,
        'total_harga' => $faker->randomDigitNotNull
    ];
});
