<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{

    protected $fillable = ['customers_id', 'order_date', 'finished'];
    protected $primaryKey = 'orders_id';
    protected $date = ['deleted_at'];

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'foreign_key', 'customers_id');
    }

    public function itens()
    {
        return $this->hasMany(Itens::class);
    }


}
