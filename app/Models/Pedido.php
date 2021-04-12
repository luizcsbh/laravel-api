<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    protected $fillable = ['pedido_data','finalizado','cliente_id','quantidade'];
    protected $date = ['deleted_at'];

    function pedido()
    {
        return $this->hasMany('App\Models\Pedido');
    }
}
