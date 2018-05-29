<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class Resetpassword extends Mailable
{
    use Queueable, SerializesModels;

    protected $_token;
    protected $_name;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($token = "",$name = "")
    {
        $this->_token = $token;
        $this->_name = $name;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $data['_token'] = $this->_token;
        $data['_name'] = $this->_name;
        return $this->view('admin.emails.reset_password',$data)->subject("D-support :: Password Reset Link");
    }
}
