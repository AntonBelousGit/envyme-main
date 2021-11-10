<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mails extends Model
{
    protected $fillable = [
        'name', 'surname', 'email','phone_number','comment','card','city','person','event_id','token','date'
    ];
    public function event()
    {
        return $this->belongsTo('App\Models\Event');
    }
}
