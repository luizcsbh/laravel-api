<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderedItem extends Model
{
    protected $fillable = ['orders_id','products_id','amount'];
    protected $primaryKey = 'cod_item';
    protected $dates = ['deleted_at'];

    public function order()
    {
        return $this->hasOne(Order::class);
    }

    public function product()
    {
        return $this->hasOne(Product::class);
    }

}

