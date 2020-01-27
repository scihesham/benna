<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Milestone extends Model
{
    protected $fillable = [
        'desc', 'value', 'offer_status_id'
    ];
    
    
    public function offer(){
        return $this->belongsTo('App\OfferStatus', 'offer_status_id')->withDefault();
    }
  
    public function dispute(){
        return $this->hasOne('App\Dispute');
    }
    
}
