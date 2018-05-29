<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class UnauthorizeMail extends Mailable
{
    use Queueable, SerializesModels;

    protected $_data;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data = "")
    {
        $this->_data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('admin.emails.unauthorize_user',$this->_data)->subject("D-support :: Unauthorize Access");
    }
}
