<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class UserTicket extends Pivot
{

    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function ticket()
    {
        return $this->belongsTo(Ticket::class);
    }

    public function concert()
    {
        return $this->belongsTo(Ticket::class);
    }
}
