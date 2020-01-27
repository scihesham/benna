<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMailable;

use Illuminate\Support\Facades\Storage;


class SendProjectEmailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    
    public $receives;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($emails)
    {
        $this->receives = $emails;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
//        $output = '';
//        $url = Storage::url('exchange.txt');
//        foreach($this->receives as $receive){
//            $output .= $receive.', ';
//        }
//        Storage::put($url, $output);
        
        foreach($this->receives as $receive){
           Mail::to($receive)->send(new SendMailable()); 
        }
         
    }
}
