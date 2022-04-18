<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderProduct extends Model
{
    use HasFactory;

    public function orders(){
        return $this->belongsToMany('App\Models\Order');
    }
    public function products(){
        return $this->belongsToMany('App\Models\Product','order_products','order_id','product_id');
    }
}
