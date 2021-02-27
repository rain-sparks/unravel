<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    protected $table = 'orders';
    public $timestamps = true;

    public function customers()
    {
        return $this->belongsTo(Customers::class, 'customer_id', 'id');
    }

    public function products()
    {
        return $this->belongsTo(Products::class, 'product_id', 'id');
    }
}
