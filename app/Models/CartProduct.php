<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class CartProduct extends Pivot
{
    use HasFactory;

//    protected $with = ['products'];

    public function users(){
        return $this->belongsTo(User::class);
    }

    public function carts()
    {
        return $this->belongsToMany(Cart::class);
    }

//    public function products()
//    {
//        return $this->belongsToMany(Product::class, 'cart_product','cart_id','product_id');
//    }
    public function products()
    {
        return $this->hasMany(Product::class, 'id', 'product_id');
    }
}
