<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DisputeMessage extends Model
{
    protected $fillable = [
        'send_from', 'type', 'content', 'dispute_id',
    ];
    
    
    public function dispute(){
        return $this->belongsTo('App\Dispute')->withDefault();
    }
    
    public function messageFrom(){
        return $this->belongsTo('App\User', 'send_from')->withDefault();
    }
    
    public function attachment(){
        return $this->belongsTo('App\Attachment', 'content')->withDefault();
    }
    
}
