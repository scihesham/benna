<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = [
        'send_from', 'type', 'content', 'offer_status_id', 'to_user'
    ];
    
    public function messageFrom(){
        return $this->belongsTo('App\User', 'send_from')->withDefault();
    }
    
    public function attachment(){
        return $this->belongsTo('App\Attachment', 'content')->withDefault();
    }
    
    public function messageNotifications(){
        return $this->hasOne('App\MessageNotification');
    }
    
    public function offer(){
        return $this->belongsTo('App\OfferStatus', 'offer_status_id')->withDefault();
    }
    
}
