<?php

use Illuminate\Database\Seeder;

class ClientesSeed extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        App\Models\Cliente::create([
            'cliente_nome' => Str::random(20),
            'cliente_telefone' => Str::random(12),
            'cliente_cep' => Str::random(9),
        ]);
    }
}
