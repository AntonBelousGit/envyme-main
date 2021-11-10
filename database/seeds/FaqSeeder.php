<?php

use Illuminate\Database\Seeder;
use App\Models\Faq;

class FaqSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Faq::create([
            'buy_rule' => 'buy_rule',
            'member_rule' => 'member_rule',
            'vip_rule' => 'vip_rule',
            'increase_bonus_rule' => 'increase_bonus_rule',
            'male_striptease_rule' => 'male_stiptease_rule',
            'multiple_tickets_rule' => 'multiple_tickets_rule',
            'support_rule' => 'support_rule'
        ]);
    }
}
