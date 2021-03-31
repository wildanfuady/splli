<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Order_seminar;
use Faker\Generator as Faker;

$factory->define(Order_seminar::class, function (Faker $faker) {

    return [
        'seminar_id' => $faker->word,
        'user_id' => $faker->word,
        'invoice_date' => $faker->date('Y-m-d H:i:s'),
        'invoice_due_date' => $faker->date('Y-m-d H:i:s'),
        'invoice' => $faker->text,
        'status' => $faker->text,
        'kode_unik' => $faker->randomDigitNotNull,
        'price' => $faker->word,
        'created_by' => $faker->word,
        'updated_by' => $faker->word,
        'deleted_by' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
