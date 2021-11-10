<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PasswordResetsMailer extends Mailable
{
    use Queueable, SerializesModels;

    private $password_resets;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($password_resets)
    {
        $this->password_resets = $password_resets;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('admin@envyme.speedshop.pp.ua', 'ENVYme')
            ->subject('Reset Password')
            ->view('admin.password_ressets.mail', ['password_resets' => $this->password_resets]);    }
}
