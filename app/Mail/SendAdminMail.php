<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendAdminMail extends Mailable
{
    use Queueable, SerializesModels;
    public $type;
    public $name;
    public $phone_number;
    public $email;
    public $ville;
    public $stade;
    public $journee;
    public $date_match;
    public $match;
    public $left_place;
    public $quota;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($type, $name, $phone_number, $email, $ville, $stade, $journee, $date_match, $match, $left_place, $quota)
    {
        $this->type = $type;
        $this->name = $name;
        $this->phone_number = $phone_number;
        $this->email = $email;
        $this->ville = $ville;
        $this->stade = $stade;
        $this->journee = $journee;
        $this->date_match = $date_match;
        $this->match = $match;
        $this->left_place = $left_place;
        $this->quota = $quota;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mail.admin_mail');
    }
}
