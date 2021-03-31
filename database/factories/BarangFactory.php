<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Barang;
use Faker\Generator as Faker;

$factory->define(Barang::class, function (Faker $faker) {

    return [
        'tanggal_pembelian' => $faker->word,
        'kode_barang' => $faker->word,
        'nama_barang' => $faker->word,
        'harga_barang' => $faker->randomDigitNotNull,
        'qty_pembalian' => $faker->randomDigitNotNull,
        'nama_pic' => $faker->word
    ];
});
