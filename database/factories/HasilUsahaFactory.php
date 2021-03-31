<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\HasilUsaha;
use Faker\Generator as Faker;

$factory->define(HasilUsaha::class, function (Faker $faker) {

    return [
        'pembayaran_id' => $faker->word,
        'uang_keluar_id' => $faker->word,
        'tanggal' => $faker->word,
        'keterangan' => $faker->text,
        'total_saldo' => $faker->randomDigitNotNull,
        'created_by' => $faker->word,
        'updated_by' => $faker->word,
        'deleted_by' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
