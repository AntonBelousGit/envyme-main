<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    protected $table = 'feedbacks';
    protected $fillable = ['email','message','raiting'];

    public function user(){
        return $this->belongsTo('App\Models\User');
    }
    public function club()
    {
        return $this->belongsTo('App\Models\Club');
    }
}
