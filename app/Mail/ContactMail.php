<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ContactMail extends Mailable
{
    use Queueable, SerializesModels;

     public $subject;
     public $name;
     public $company_name;
     public $email;
     public $content;
    
    /**
     * Create a new message instance.
     *
     * @return void
     */
    
    public function __construct($company_name, $name, $email, $content)
    {
        $this->subject = 'اتصل بنا '.$email;
        $this->company_name = $company_name;
        $this->name = $name;
        $this->email = $email;
        $this->content = $content;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.contactus')->from('contact@bennaquick.com');
    }
}
