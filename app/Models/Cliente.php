<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $fillable = ['cliente_nome','cliente_telefone','cliente_cep','cliente_endereco'];
    protected $dates = ['deleted_at'];

    public function pedido()
    {
        return $this->hasMany('App\Models\Pedidos');
    }

}
