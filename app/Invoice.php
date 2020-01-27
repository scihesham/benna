<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $fillable = [
        'status', 'offer_status_id', 'company_id', 'seen_overdate_invoice'
    ];
    
    public function offer(){
        return $this->belongsTo('App\OfferStatus', 'offer_status_id')->withDefault();
    }
    
    
    public function receipt(){
        return $this->hasOne('App\Receipt')->withDefault();
    }
}
