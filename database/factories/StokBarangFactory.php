<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\StokBarang;
use Faker\Generator as Faker;

$factory->define(StokBarang::class, function (Faker $faker) {

    return [
        'barang_id' => $faker->word,
        'harga_jual' => $faker->randomDigitNotNull,
        'qty' => $faker->word
    ];
});
