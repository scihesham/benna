<?php

namespace App\Http\Controllers;
use App\Attachment;
use App\OfferStatus;
use App\Message;
use Redirect;

use Illuminate\Http\Request;

class MessageController extends Controller
{
    
    public function show(Request $request, $offer_id){
        if ($request->ajax()){
            $offer = OfferStatus::find($offer_id);
            return view('admin.message.show', compact('offer'));
        } 
        else {
            return back();
        }
    }
    
    
}
