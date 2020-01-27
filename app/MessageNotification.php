<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MessageNotification extends Model
{
    
    protected $fillable = [
        'to_user', 'to_status', 'message_id'
    ];
    
    public function message(){
        return $this->belongsTo('App\Message')->withDefault();
    }
    
    public function user(){
        return $this->belongsTo('App\User', 'to_user')->withDefault();
    }
    
    
}
