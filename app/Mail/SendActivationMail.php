<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendActivationMail extends Mailable
{
    use Queueable, SerializesModels;
    public $name;
    public $email;
    public $phone_number;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name, $email, $phone_number)
    {
        $this->name = $name;
        $this->email = $email;
        $this->phone_number = $phone_number;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mail.register_notif');
    }
}
