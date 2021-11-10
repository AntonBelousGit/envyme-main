<?php

use Illuminate\Database\Seeder;
use App\Models\Club;
use App\Models\User;

class RaitingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $clubs = Club::all();
        for($i=0; $i<count($clubs); ++$i){
            factory(App\Models\Raiting::class)->create([
                'club_id' => $clubs[$i]->id,
            ]);
        }
    }
}
