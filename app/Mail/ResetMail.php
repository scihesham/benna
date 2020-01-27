<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ResetMail extends Mailable
{
    use Queueable, SerializesModels;

     public $subject;
     public $link;
    
    /**
     * Create a new message instance.
     *
     * @return void
     */
    
    public function __construct($link)
    {
        $this->subject = 'Reset Password';
        $this->link = $link;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.reset')->from('account@bennaquick.com');
    }
}
