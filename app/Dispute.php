<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dispute extends Model
{
    
    protected $fillable = [
        'status', 'notes', 'from_user', 'opponent_user', 'milestone_id', 'owner_percent', 'company_percent'
    ];
    
    public function fromUser(){
        return $this->belongsTo('App\User', 'from_user')->withDefault();
    }
    
    public function opponentUser(){
        return $this->belongsTo('App\User', 'opponent_user')->withDefault();
    }
    
    public function milestone(){
        return $this->belongsTo('App\Milestone')->withDefault();
    }
    
    public function disputeMessages(){
        return $this->hasMany('App\DisputeMessage');
    }
    
}
