<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMailable;
use App\Jobs\SendProjectEmailJob;
use Carbon\Carbon;
use App\User;

class QueueController extends Controller
{
    public function jobsEmail()
    {
        $freelancers = User::where('permission', 3)->get();
        foreach($freelancers as $freelancer){
          $emails[] =  $freelancer->email;
        } 
        $emailJob = (new SendProjectEmailJob($emails))->delay(Carbon::now()->addSeconds(5));
        dispatch($emailJob);
        echo 'email sent';
    }
}