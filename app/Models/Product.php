<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    protected $fillable = ['name', 'description','price','store'];
    protected $primaryKey = 'products_id';
    protected $dates = ['deleted_at'];

}