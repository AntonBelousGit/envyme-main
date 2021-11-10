<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Club extends Model
{
    protected $fillable = [
        'slug','description','description_ru','description_fi','description_et', 'title','title_ru','title_fi','title_et', 'photos','city_id', 'image','discount','map','map_ru','map_fi','map_et','price','email'];

    protected $casts = [
        'photos' => 'array'
    ];

    public function raiting()
    {
        return $this->hasOne('App\Models\Raiting');
    }

    public function tickets()
    {
        return $this->hasMany('App\Models\Ticket', 'club_id');
    }

    public function filters()
    {
        return $this->belongsToMany(
            'App\Models\Filter',
            'club_filter',
            'club_id',
            'filter_id');
    }

    public function feedbacks()
    {
        return $this->hasMany('App\Models\Feedback');
    }
}
