<?php

use App\Models\Order;
use App\Models\Ticket;
use Illuminate\Database\Seeder;

class OrderTicketSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tickets = Ticket::all();
        $orders = Order::all();

        for($i=0; $i<10; ++$i)
        {
            $ticket = $tickets->shuffle()->first();
            $orders->shuffle()->first()->tickets()->sync($ticket->id);
        }

        $orders->where('id', 11)->first()->tickets()->sync([$tickets->first()->id, $tickets->skip(5)->first()->id]);
    }
}
