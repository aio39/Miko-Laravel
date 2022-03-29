<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CoTiCurEnterUserNum extends Model
{
    use HasFactory;

    protected $guarded = [];

    public $timestamps = false;

    protected $casts = [
        'created_at' => 'datetime',   // date | datetime | timestamp
    ];

    public static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->created_at = $model->freshTimestamp();
        });
    }


    public function ticket()
    {
        return $this->belongsTo(Ticket::class);
    }

    public function concert()
    {
        return $this->belongsTo(Concert::class);
    }
}
