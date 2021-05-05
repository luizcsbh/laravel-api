<?php

use App\Models\Order;
use Illuminate\Database\Seeder;

class OrdersTableSeeder extends Seeder
{
    
    public function run()
    {
        factory(Order::class)->create([
            'customers_id'=>1,
            'order_date'=>'2021-05-05',
            'finished'=>1,

        ]);

        factory(Order::class)->create([
            'customers_id'=>2,
            'order_date'=>'2021-05-05',
            'finished'=>0,
        ]);
    }
}
