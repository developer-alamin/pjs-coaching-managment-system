<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class studentPasswordResetMail extends Mailable
{
    use Queueable, SerializesModels;
    public $stuResetCode;
    public $Student;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($stuResetCode,$Student)
    {
       $this->stuResetCode = $stuResetCode;
       $this->Student = $Student;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('send.studentPassReset');
    }
}
