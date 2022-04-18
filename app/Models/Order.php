<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    public function user(){
        return $this->belongsTo('App\Models\User');
    }

    public function orderProducts(){
        return $this->belongsToMany('App\Models\OrderProduct', 'order_products',);
    }

    public function products(){
        return $this->belongsToMany('App\Models\Product','order_products','order_id','product_id');
    }
}
