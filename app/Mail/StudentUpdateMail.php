<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class StudentUpdateMail extends Mailable
{
    public $nonVerifyStuData = "";
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($nonVerifyStuData)
    {
        $this->nonVerifyStuData = $nonVerifyStuData;
    }

   

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('send.studentUpdateSend');
    }
}
