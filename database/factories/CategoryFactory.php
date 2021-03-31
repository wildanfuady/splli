<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Category;
use Faker\Generator as Faker;

$factory->define(Category::class, function (Faker $faker) {

    return [
        'categories_image' => $faker->word,
        'categories_image_path' => $faker->text,
        'categories_icon' => $faker->word,
        'categories_icon_path' => $faker->text,
        'parent_id' => $faker->word,
        'vendors_id' => $faker->word,
        'manufacturers_id' => $faker->word,
        'sort_order' => $faker->word,
        'date_added' => $faker->date('Y-m-d H:i:s'),
        'last_modified' => $faker->date('Y-m-d H:i:s'),
        'categories_slug' => $faker->word,
        'categories_status' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
