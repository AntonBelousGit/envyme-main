<?php

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Club;

class FeedbackSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = User::all();
        $clubs = Club::all();
        
        for($i=0; $i<count($clubs); ++$i){
            factory(App\Models\Feedback::class)->create([
                'user_id' => $users[$i]->id,
                'club_id' => $clubs[$i]->id
            ]);
        }
    }
}
