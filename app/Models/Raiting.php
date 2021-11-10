<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Raiting extends Model
{
    protected $fillable = ['raiting'];

    public function club()
    {
        return $this->belongsTo('App\Models\Club');
    }

    public function users()
    {
        return $this->hasMany('App\Models\User');
    }
}
