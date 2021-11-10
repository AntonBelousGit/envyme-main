<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Membership extends Model
{
    protected $fillable = [
        'photos',
        'description',
        'description_ru',
        'description_fi',
        'description_et',
        'bonus_description',
        'bonus_description_ru',
        'bonus_description_fi',
        'bonus_description_et',
        'silver_description',
        'silver_description_ru',
        'silver_description_fi',
        'silver_description_et',
        'gold_description',
        'gold_description_ru',
        'gold_description_fi',
        'gold_description_et',
        'diamond_description',
        'diamond_description_ru',
        'diamond_description_fi',
        'diamond_description_et',
        'data_ru',
        'data_fi',
        'data_et'

    ];
    protected $casts = [
        'data' => 'array',
    ];
}
