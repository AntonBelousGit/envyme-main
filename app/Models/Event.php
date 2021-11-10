<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{

    protected $fillable = ['slug','title', 'title_ru', 'title_fi', 'title_et', 'information', 'information_ru', 'information_fi', 'information_et', 'type', 'amount_person', 'price', 'date', 'image', 'id', 'additional_information', 'additional_information_ru', 'additional_information_fi', 'additional_information_et'];
    protected $dates = ['date'];


    public function club()
    {
        return $this->belongsTo('App\Models\Club');
    }

    public function filters()
    {
        return $this->belongsToMany(
            'App\Models\Filter',
            'event_filter',
            'event_id',
            'filter_id'
        );
    }
}
