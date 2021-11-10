<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Club;

class Filter extends Model
{
    protected $fillable = ['type', 'title','img','filter_id'];

    public function clubs()
    {
        return $this->belongsToMany(
            Club::class,
            'club_filter',
            'club_id',
            'filter_id');
    }
    public function events()
    {
        return $this->belongsToMany(
            Event::class,
            'event_filter',
            'filter_id',
            'event_id');
    }
//    public function package(){
//        return $this->belongsToMany('App\Models\Event');
//    }
    public function cities()
    {
        return $this->hasMany(Filter::class);
    }
}
