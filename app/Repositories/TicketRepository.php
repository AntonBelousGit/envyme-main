<?php


namespace App\Repositories;


use App\Models\User;
use App\Repositories\Interfaces\TicketRepositoryInterface;
use Illuminate\Http\Request;
use App\Models\Ticket;

class TicketRepository implements TicketRepositoryInterface
{

    public function getAllTickets()
    {
        return Ticket::all();
    }

    public function createTicket(array $fields)
    {
        $ticket = new Ticket;
        $ticket->fill($fields);
        return $ticket;
    }

    public function updateTicket(Ticket $ticket, array $fields)
    {
        $ticket->fill($fields);
        $ticket->club()->associate($fields['club_id']);
        $ticket->save();
    }

    public function deleteTicket(Ticket $ticket)
    {
        $ticket->delete();
    }

    public function countTicket()
    {
        return Ticket::count();
    }
}
