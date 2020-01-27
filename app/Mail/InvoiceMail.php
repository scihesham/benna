<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class InvoiceMail extends Mailable
{
    use Queueable, SerializesModels;

    public $subject;
    public $invoice_num;
    public $project_title;
    public $invoice_val;
    public $invoice_link;
    
    /**
     * Create a new message instance.
     *
     * @return void
     */
    
    public function __construct($invoice_num, $project_title, $invoice_val, $invoice_link)
    {
        $this->subject = 'قبول فاتورة';
        $this->invoice_num = $invoice_num;
        $this->project_title = $project_title;
        $this->invoice_val = $invoice_val;
        $this->invoice_link = $invoice_link;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.invoice')->from('invoice@bennaquick.com');
    }
}
