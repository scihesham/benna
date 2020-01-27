<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Receipt extends Model
{
    protected $fillable = [
         'money', 'bank', 'transfer_time', 'notes', 'invoice_id', 'transfer_name', 'attachment_id'
    ];
    
    
    public function attachment(){
        return $this->belongsTo('App\Attachment', 'attachment_id')->withDefault();
    }
    
    public function invoice(){
        return $this->belongsTo('App\Invoice', 'invoice_id')->withDefault();
    }
    
}
