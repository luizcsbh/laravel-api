<?php

use Illuminate\Database\Seeder;

class PedidosSeed extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        App\Models\Pedido::create([
            'pedido_data' => Str::random(),
            'finalizado' =>'sim',
            'cliente_id' => 1,
            'produto_id' =>1,
            'quantidade'=> 2,
        ]);
    }
}
