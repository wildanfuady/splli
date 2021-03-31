<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Pembayaran;
use Faker\Generator as Faker;

$factory->define(Pembayaran::class, function (Faker $faker) {

    return [
        'id_po' => $faker->word,
        'tanggal' => $faker->word,
        'plat_motor' => $faker->word,
        'nama_konsumen' => $faker->word,
        'nama_sparepart' => $faker->word,
        'harga_grosir' => $faker->randomDigitNotNull,
        'harga_jual' => $faker->randomDigitNotNull,
        'qty' => $faker->randomDigitNotNull,
        'harga_pasang' => $faker->randomDigitNotNull,
        'jasa_service' => $faker->randomDigitNotNull,
        'total_harga' => $faker->randomDigitNotNull,
        'selisih' => $faker->randomDigitNotNull,
        'created_by' => $faker->word,
        'updated_by' => $faker->word,
        'deleted_by' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
