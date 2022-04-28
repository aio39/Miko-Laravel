<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;


    protected $guarded = [];


    public function concert()
    {
        return $this->belongsTo(Concert::class);
    }

    public function orderProducts()
    {
        return $this->belongsToMany('App\Models\Order', 'orders', 'product_id', 'order_id')
            ->using('App\Models\UserTicket')
            ->withPivot(
                'created_at',
                'quantity',
            );
    }

    public function carts(){
        return $this->belongsToMany('App\Models\Cart');
    }

    public function cartProducts()
    {
        return $this->belongsToMany('App\Models\CartProduct');

    }

}
