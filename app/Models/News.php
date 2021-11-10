<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $fillable = ['slug','title','title_ru','title_fi','title_et', 'description','description_ru','description_fi','description_et', 'content','content_ru','content_fi','content_et', 'date'];
    protected $table = 'newses';
}
