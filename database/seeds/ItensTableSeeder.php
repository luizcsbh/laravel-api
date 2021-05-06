<?php

use App\Models\Item;
use Illuminate\Database\Seeder;

class ItensTableSeeder extends Seeder
{

    public function run()
    {
        factory(Item::class)->create([
            'orders_id'=>1,
            'products_id'=>2,
            'amount'=>1,
        ]);
        factory(Item::class)->create([
            'orders_id'=>1,
            'products_id'=>6,
            'amount'=>1,
        ]);
        factory(Item::class)->create([
            'orders_id'=>2,
            'products_id'=>5,
            'amount'=>1,
        ]);
        factory(Item::class)->create([
            'orders_id'=>3,
            'products_id'=>6,
            'amount'=>1,
        ]);
    }

}
