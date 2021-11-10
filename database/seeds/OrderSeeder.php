<?php

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Order;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = User::all();
        for($i=0; $i<10; ++$i){
            Order::create([
                'serial_code' => strval(random_int(1000000000, 9999999999)),
                'user_id' => $users->shuffle()->first()->id,
            ]);
        }

        Order::create([
            'serial_code' => '123123123123123',
                'user_id' => 11
        ]);
    }
}
