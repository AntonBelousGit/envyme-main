<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    protected $fillable = ['page','title','title_ru','title_fi','title_et', 'subtitle','subtitle_ru','subtitle_fi','subtitle_et','description','description_ru','description_fi','description_et', 'href', 'photo'];
}
