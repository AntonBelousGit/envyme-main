<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use stdClass;

class ActivateAccount extends Mailable
{
    use Queueable, SerializesModels;


    protected $user;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $user) {
        $this->user = $user;

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build() {

        $activationLink = route('activation', [
            'id' => $this->user->id,
            'token' => md5($this->user->email)
        ]);

        return $this->from('admin@envyme.speedshop.pp.ua', 'ENVYme')
            ->subject('Activation account request')
            ->view('email.activate', ['user' => $this->user,'link'=> $activationLink]);
    }
}
