<?php

use Illuminate\Database\Seeder;
use App\Models\Event;
use App\Models\Filter;

class EventFilterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $events = Event::all();
        $filters = Filter::where('type', 'city')->get();
        for($i=0; $i<10; ++$i)
        {
            $events[$i]->filters()->attach($filters->shuffle()->first()->id);
        }
    }
}
