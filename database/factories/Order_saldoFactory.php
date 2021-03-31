<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Order_saldo;
use Faker\Generator as Faker;

$factory->define(Order_saldo::class, function (Faker $faker) {

    return [
        'user_id' => $faker->word,
        'invoice_date' => $faker->date('Y-m-d H:i:s'),
        'invoice' => $faker->text,
        'snap' => $faker->text,
        'order_id' => $faker->text,
        'status' => $faker->text,
        'price' => $faker->word,
        'created_by' => $faker->word,
        'updated_by' => $faker->word,
        'deleted_by' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
