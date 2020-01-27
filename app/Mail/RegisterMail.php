<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class RegisterMail extends Mailable
{
    use Queueable, SerializesModels;

     public $subject;
     public $elink;
    
    /**
     * Create a new message instance.
     *
     * @return void
     */
    
    public function __construct($link)
    {
        $this->subject = 'تفعيل حساب بناء كويك';
        $this->elink = $link;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.register')->from('account@bennaquick.com');
    }
}
