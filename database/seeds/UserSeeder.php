<?php

use App\Models\UserProfile;
use App\Models\User;
use App\Models\Raiting;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $raitings = Raiting::all();
        for($i=0; $i<count($raitings); ++$i){
            factory(App\Models\User::class)->create([
                'raiting_id' => $raitings[$i]->id
            ]);
        }

        $user_profile = UserProfile::create([
            'level' => 5,
            'buyed_ticket_current_level' => 5
        ]);
        
        User::create([
            'name' => 'sasha',
            'surname' => 'tkachenko',
            'nickname' => 'sashatkach',
            'country' => 'ukraine',
            'phone' => '+380993770936',
            'birthday' => '1993-11-25',
            'email' => 'sashatkachenko1993@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('123123'), 
            'remember_token' => Str::random(10),
            'role_id' => 1,
            'raiting_id' => 1,
            'user_profile_id' => $user_profile->id
        ]);
    }
}
