<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\UangDiluar;
use Faker\Generator as Faker;

$factory->define(UangDiluar::class, function (Faker $faker) {

    return [
        'nama_konsumen' => $faker->word,
        'hp_konsumen' => $faker->randomDigitNotNull,
        'jumlah_tagihan' => $faker->randomDigitNotNull,
        'jumlah_hutang' => $faker->randomDigitNotNull,
        'sisa_hutang' => $faker->randomDigitNotNull,
        'keterangan' => $faker->text,
        'created_by' => $faker->word,
        'updated_by' => $faker->word,
        'deleted_by' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
