<?php

use Illuminate\Database\Seeder;
use App\Models\Membership;
class MembershipSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $membership = new Membership;
        $membership->fill([
            'image' => 'logo_banner.png',
            'description' => 'description',
            'bonus_description' => 'bonys_description',
            'silver_description' => 'silver_description',
            'gold_description' => 'gold description',
            'diamond_description' => 'diamond_description',
        ]);
        $membership->data = ['Every 10th ticket is free' => [true, true, false, false]];
        $membership->save();
    }
}
