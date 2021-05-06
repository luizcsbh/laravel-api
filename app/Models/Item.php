<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{

    protected $fillable = ['orders_id','products_id','amount'];
    protected $primaryKey = 'itens_id';
    protected $dates = ['deleted_at'];

    public function order()
    {
        return $this->hasOne(Order::class, 'foreign_key', 'orders_id');
    }

    public function product()
    {
        return $this->hasMany(Product::class,'foreign_key','products_id');
    }


}
