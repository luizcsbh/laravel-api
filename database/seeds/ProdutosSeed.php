<?php

use Illuminate\Database\Seeder;

class ProdutosSeed extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        App\Models\Produto::create([
            'produto_name' => Str::random(20),
            'prodduto_descricao' => Str::random(200),
            'produto_preco' => Str::random(2),
            'estoque' => Str::random(2),
        ]);
    }
}
