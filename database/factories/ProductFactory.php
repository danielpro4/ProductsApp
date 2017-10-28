<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\Product::class, function (Faker $faker) {

    return [
        'sku' => str_random(10),
        'name' => $faker->name,
        'description' => $faker->paragraph(2),
        'image' => 'http://loremflickr.com/400/300?random='.rand(1, 100),
        'category' => 'Consumibles',
        'price' => $faker->numberBetween(1000, 9000),
        'active' => 1,
        'user_id' => 1
    ];
});
