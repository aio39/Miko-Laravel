<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Concert extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        'all_concert_start_date' => 'datetime',   // date | datetime | timestamp
        'all_concert_end_date' => 'datetime'
    ];

    public function users()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }


    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }

    public function userTickets()
    {
        return $this->hasMany(UserTicket::class);
    }
}
