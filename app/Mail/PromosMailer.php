<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PromosMailer extends Mailable
{
    use Queueable, SerializesModels;

    private $promos;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($promos)
    {
        $this->promos = $promos;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('admin@envyme.speedshop.pp.ua', 'ENVYme')
            ->subject('Congratulations on your purchase')
            ->view('admin.promos.freetickets', ['promos' => $this->promos]);
    }
}
