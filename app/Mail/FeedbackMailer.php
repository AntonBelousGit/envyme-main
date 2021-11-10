<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use stdClass;

class FeedbackMailer extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * @var stdClass
     */
    private $data;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(stdClass $data) {
        $this->data = $data;

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build() {

        return $this->from('admin@envyme.speedshop.pp.ua', 'ENVYme')
            ->subject('Booking request')
            ->view('email.feedback', ['data' => $this->data]);
    }
}
