<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    protected $fillable = ['name', 'description','price'];
    protected $primaryKey = 'products_id';
    protected $dates = ['deleted_at'];

    public function itens()
    {
        return $this->hasMany(Item::class);
    }

}