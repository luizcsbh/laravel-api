<?php

use Faker\Generator as Faker;
use App\Models\Item;

$factory->define(Item::class, function (Faker $faker) {

    return [
        'orders_id'=>$faker->randomDigitNot(5),
        'products_id'=>$faker->randomDigitNot(5),
        'amount'=>$faker->randomDigitNot(5),
    ];

});
