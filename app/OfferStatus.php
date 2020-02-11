<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OfferStatus extends Model
{
    
    protected $fillable = [
        'owner_id', 'company_id', 'project_id', 'communication_status', 'muted_user_id', 
    ];
    
    public function project(){
        return $this->belongsTo('App\Project')->withDefault();
    }
    
    public function company(){
        return $this->belongsTo('App\User', 'company_id')->withDefault();
    }
    
    public function owner(){
        return $this->belongsTo('App\User', 'owner_id')->withDefault();
    }
    
    public function user(){
        return $this->belongsTo('App\User', 'muted_user_id')->withDefault();
    }
    
    public function offer(){
        return $this->hasOne('App\Offer')->withDefault();
    }
    
    public function messages(){
        return $this->hasMany('App\Message');
    }
    
    public function milestones(){
        return $this->hasMany('App\Milestone');
    }
    
    public function disputes(){
        return $this->hasMany('App\Dispute');
    }
    
}
