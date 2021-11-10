<?php

use Illuminate\Database\Seeder;
use App\Models\Promo;

class PromoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Promo::create([
            'discountCode' => 'qwerty',
            'discountPercent' => '20.05'
        ]);

        Promo::create([
            'discountCode' => 'ok',
            'discountPercent' => '50.05'
        ]);
    }
}
