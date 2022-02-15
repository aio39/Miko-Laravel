<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'avatar',
        'type',
        'google_id',
        'twitter_id',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'type',
        'google_id',
        'twitter_id',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


//    public function setPasswordAttribute($value)
//    {
//        $this->attributes['password'] = bcrypt($value);
////        $this->attributes['password'] = Hash::make($value);
//    }

    public function chats()
    {
        return $this->hasMany('App\Models\Chat', 'user_id')->limit(100);
    }

    public function coinHistories()
    {
        return $this->hasMany('App\Models\CoinHistory', 'user_id')->limit(100);
    }

    public function concerts()
    {
        return $this->hasMany('App\Models\Concert', 'user_id')->limit(100);
    }

    public function reviews()
    {
        return $this->belongsToMany('App\Models\Menu', 'reviews', 'user_id', 'menu_id')->using('App\Models\Review');
    }

    public function userTickets()
    {
        return $this->belongsToMany('App\Models\UserTicket', 'user_tickets', 'user_id', 'ticket_id')
            ->using('App\Models\UserTicket')
            ->withPivot('created_at',
                'updated_at',
                'is_used',
                'p_ranking',
                'g_ranking',);
    }
}
