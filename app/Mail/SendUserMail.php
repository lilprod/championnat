<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendUserMail extends Mailable
{
    use Queueable, SerializesModels;
    public $ville;
    public $stade;
    public $journee;
    public $date_match;
    public $match;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($ville, $stade, $journee, $date_match, $match)
    {
        $this->ville = $ville;
        $this->stade = $stade;
        $this->journee = $journee;
        $this->date_match = $date_match;
        $this->match = $match;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mail.media_mail');
    }
}
