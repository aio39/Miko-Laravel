<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConcertAddedScorePerTime extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        'created_at' => 'datetime',   // date | datetime | timestamp
        'start' => 'datetime',   // date | datetime | timestamp
        'end' => 'datetime',   // date | datetime | timestamp
    ];

    public function ticket()
    {
        return $this->belongsTo(Ticket::class);
    }

    public function concert()
    {
        return $this->belongsTo(Concert::class);
    }


}
