<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Concert extends Model
{
    use HasFactory;

    public static $snakeAttributes = false;

    protected $guarded = [];

    protected $casts = [
        'all_concert_start_date' => 'datetime',   // date | datetime | timestamp
        'all_concert_end_date' => 'datetime'
    ];

    public function user()
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
}
