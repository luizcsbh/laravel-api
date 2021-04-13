<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    protected $fillable = ['produto_nome', 'produto_descricao', 'produto_preco','estoque'];
    protected $dates = ['deleted_at'];

    public function pedido()
    {
        return $this->belongs('App\Models\Pedido');
    }
    
}
