<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    protected $fillable = ['pedido_data','finalizado','cliente_id','produto_id','quantidade'];
    protected $date = ['deleted_at'];

    function cliente()
    {
        return $this->belongs('App\Models\Cliente');
    }

    function produto()
    {
        return $this->hasMany('App\Models\Produto');
    }
}
