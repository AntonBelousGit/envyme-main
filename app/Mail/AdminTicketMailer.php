<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use stdClass;

class AdminTicketMailer extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * @var stdClass
     */
    private $orders;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($orders) {
        $this->orders = $orders;

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build() {

        return $this->from('admin@envyme.speedshop.pp.ua', 'ENVYme')
            ->subject('Ticket request')
            ->view('admin.orders.mail_admin', ['orders' => $this->orders]);
    }
}
