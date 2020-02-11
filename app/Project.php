<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'title', 'city', 'desc', 'attachment_id', 'company_id', 'owner_id', 'status', 'awardoffer', 'category', 'expectbudget', 'expecttime', 'view_num', 'evaluation_status', 'award_offer_seen', 'project_end_at_seen', 'project_end_at'
    ];
    
    
    public function owner(){
        return $this->belongsTo('App\User', 'owner_id')->withDefault();
    }
    
    public function company(){
        return $this->belongsTo('App\User', 'company_id')->withDefault();
    }
    
    public function offers(){
        return $this->hasMany('App\OfferStatus');
    }
    
    public function awardOffer(){
        return $this->belongsTo('App\OfferStatus', 'awardoffer')->withDefault();
    }
    
    public function rating(){
        return $this->hasOne('App\Evaluation')->withDefault();
    }
    
}
