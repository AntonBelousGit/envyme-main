<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    protected $fillable = ['serial_code','status','user_id','order_id','name'];
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function order(){
        return $this->belongsToMany('App\Models\Order', 'order');
    }
    public function tickets()
    {
        return $this->belongsToMany('App\Models\Ticket', 'order_ticket');
    }
//    public function order(){
//        return $this->belongsTo('App\Models\Order');
//    }

}

