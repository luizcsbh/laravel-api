<?php

use Faker\Generator as Faker;
use App\Models\Customer;
use Faker\Provider;
use Illuminate\Support\Str;

$factory->define(Customer::class, function (Faker $faker) {
    return [
        'name'=>$faker->name,
        'email'=>$faker->safeEmail,
        'cep'=>Str::random(10),
        'address'=>$faker->address,
    ];
});