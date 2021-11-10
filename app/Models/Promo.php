<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Promo extends Model
{
    protected $fillable = ['title', 'discountPercent', 'discountCode','status', 'user_id'];

    public function users()
    {
        return $this->hasMany('App\Models\User');
    }
}
