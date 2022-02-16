<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        'sale_start_date' => 'datetime',   // date | datetime | timestamp
        'sale_end_date' => 'datetime',
        'concert_start_date' => 'datetime',
        'concert_end_date' => 'datetime',
        'archive_end_time' => 'datetime'
    ];


    public function concert()
    {
        return $this->belongsTo(Concert::class);
    }

    public function chats()
    {
        return $this->hasMany(Chat::class, 'user_id')->limit(100);
    }

    public function coinHistories()
    {
        return $this->hasMany(CoinHistory::class, 'user_id')->limit(100);
    }

    public function userTickets()
    {
        return $this->belongsToMany('App\Models\User', 'user_ticket', 'ticket_id', 'user_id')
            ->using('App\Models\UserTicket')
            ->withPivot('created_at',
                'updated_at',
                'is_used',
                'p_ranking',
                'g_ranking',);
    }

}
