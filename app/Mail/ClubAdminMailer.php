<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ClubAdminMailer extends Mailable
{
    use Queueable, SerializesModels;


    private $club_offer;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($club_offer) {
    $this->club_offer = $club_offer;

}

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build() {

    return $this->from('admin@envyme.speedshop.pp.ua', 'ENVYme')
        ->subject('Ticket request')
        ->view('admin.orders.mail_admin_club', ['club_offer' => $this->club_offer]);
}
}
