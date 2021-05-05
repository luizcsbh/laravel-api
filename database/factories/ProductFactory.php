<?php

use Faker\Generator as Faker;
use App\Models\Product;
use Faker\Provider;
use Illuminate\Support\Str;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'name'=>$faker->name,
        'description'=>$faker->paragraph(),
        'price'=>$faker->randomNumber(2),
        'store'=>Str::random(10),
    ];
});