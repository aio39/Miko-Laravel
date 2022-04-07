<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{

    use HasFactory;

    protected $with = ['cartProducts'];

    public function products(){
        return $this->hasMany('App\Models\Product');
    }
    public function cartProducts()
    {
//        return $this->belongsToMany('App\Models\Product', 'cart_product', 'cart_id', 'product_id')
//            ->using('App\Models\CartProduct');
        return $this->hasMany(CartProduct::class);
    }
    public function users(){
        return $this->belongsTo(User::class);
    }
}
