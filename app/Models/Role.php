<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = [
        'id','name'
    ];

     public function role()
    {
        return $this->belongsToMany('App\Models\User');
    }
}
