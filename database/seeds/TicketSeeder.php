<?php

use Illuminate\Database\Seeder;
use App\Models\Club;
use App\Models\Ticket;

class TicketSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $clubs = Club::all();
        for($i=0; $i<50; $i++){
            $club = $clubs->shuffle()->first();
            Ticket::create([
                'price' => 10.99,
                'club_id' => $club->id
            ]);
        }

        Ticket::create([
            'price' => 12.99,
            'club_id' => $clubs->shuffle()->first()->id
        ]);
    }
}
