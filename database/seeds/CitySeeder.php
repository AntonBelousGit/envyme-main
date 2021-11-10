<?php

use Illuminate\Database\Seeder;
use App\Models\Filter;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Filter::create([
            'type' => 'city',
            'title' => 'Dnepr',
        ]);

        Filter::create([
            'type' => 'city',
            'title' => 'Kiev',
        ]);

        Filter::create([
            'type' => 'city',
            'title' => 'Odessa',
        ]);

        Filter::create([
            'type' => 'city',
            'title' => 'Kharkov',
        ]);

    }
}
