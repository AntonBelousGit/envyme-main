<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MembershipPrivilege extends Model
{
    protected $fillable = ['title', 'title_ru','title_et','title_fi','bonus','silver','gold','diamond'];
}
