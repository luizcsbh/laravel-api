<?php

use Faker\Generator as Faker;
use App\Models\Order;

$factory->define(Order::class, function (Faker $faker) {
    return [
        'order_date'=>$faker->date(),
        'customers_id'=>$faker->randomDigitNot(5),
        'finished'=>false,
    ];
});
