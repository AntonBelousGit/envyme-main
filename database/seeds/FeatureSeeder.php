<?php

use Illuminate\Database\Seeder;
use App\Models\Filter;

class FeatureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Filter::create([
            'type' => 'feature',
            'title' => 'Sauna',
        ]);

        Filter::create([
            'type' => 'feature',
            'title' => 'Hookah',
        ]);

        Filter::create([
            'type' => 'feature',
            'title' => 'Champagne room',
        ]);

        Filter::create([
            'type' => 'feature',
            'title' => 'Dance',
        ]);
    }
}
