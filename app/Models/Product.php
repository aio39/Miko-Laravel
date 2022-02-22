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
        return $this->belongsTo(Ticket::class);
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

}
