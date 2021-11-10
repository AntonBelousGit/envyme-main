<?php

use Illuminate\Database\Seeder;
use App\Models\Club;
use App\Models\Filter;

class FilterClubSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $clubs = Club::all();
        $cities = Filter::where('type', 'city')->get();
        $features = Filter::where('type', 'feature')->get();

        for($i=0; $i<10; ++$i){
            for($j=0; $j<10; ++$j){
                $club = $clubs->shuffle()->first();
                $feature = $features->shuffle()->first();
                $city = $cities->shuffle()->first();
                $club->filters()->attach($city);
                $club->filters()->attach($feature);
            }
        }


    }
}
