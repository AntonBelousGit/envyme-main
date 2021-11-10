<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Ticket extends Model
{
    protected $fillable = ['price', 'club_id','token'];

    public function club()
    {
        return $this->belongsTo('App\Models\Club');
    }
    public function order(){
        return $this->belongsTo('App\Models\Order');
    }
    public static function takeOrder(){
        return DB::table('tickets')->join('clubs', 'tickets.club_id', '=','clubs.id')->select('tickets.*','clubs.title')->get();
    }
}
