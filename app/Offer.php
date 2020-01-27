<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    protected $fillable = [
        'attachment_id', 'desc', 'offer_status_id'
    ];
}
