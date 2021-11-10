<?php


namespace App\Repositories\Interfaces;


use App\Models\Ticket;
use Illuminate\Http\Request;

interface TicketRepositoryInterface
{
    public function getAllTickets();
    public function createTicket(array $fields);
    public function updateTicket(Ticket $ticket, array $fields);
    public function deleteTicket(Ticket $ticket);
    public function countTicket();
}
