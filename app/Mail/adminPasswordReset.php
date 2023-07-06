<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class adminPasswordReset extends Mailable
{
    use Queueable, SerializesModels;

    public $adminData;
    public $adminResetCode;
    public function __construct($adminData,$adminResetCode)
    {
       $this->adminData = $adminData;
       $this->adminResetCode = $adminResetCode;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('send.adminResetPass');
    }
}
