<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
    protected $fillable = ['buy_rule', 'member_rule', 'vip_rule', 'increase_bonus_rule', 'male_striptease_rule', 'multiple_tickets_rule', 'support_rule'];
}
