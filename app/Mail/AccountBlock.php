<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class AccountBlock extends Mailable
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
        return $this->view('admin.emails.account_block',$this->_data)->subject("D-support :: Account Block");
    }
}
