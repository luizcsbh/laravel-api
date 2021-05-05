<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{

    protected $fillable = ['customers_id', 'order_date', 'finished'];
    protected $primaryKey = 'orders_id';
    protected $date = ['deleted_at'];

    function customer()
    {
        return $this->basMany(Customer::class, 'customers_id', 'customers_id');
    }

    // function product()
    // {
    //     return $this->hasMany('Product');
    // }

}
