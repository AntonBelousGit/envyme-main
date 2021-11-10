<?php

namespace App\Models;
use App\Http\Controllers\Auth;
use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model
{
    protected $fillable = [
        'level', 'buyed_ticket_current_level','buy_count_tickets'
    ];

    public function user()
    {
        return $this->hasOne('App\Models\User');
    }
}
