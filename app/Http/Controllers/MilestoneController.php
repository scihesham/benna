<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\OfferStatus;
use App\Milestone;
use Redirect;


class MilestoneController extends Controller
{

    
    public function show(Request $request, $offer_id){
        if ($request->ajax()){
            $offer = OfferStatus::find($offer_id);
            return view('admin.offer.show_milestone', compact('offer'));
        } 
        else {
            return back();
        }
    }
    
    
}
