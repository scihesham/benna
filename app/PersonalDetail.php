<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PersonalDetail extends Model
{
    protected $fillable = [
       'last_name', 'phone', 'user_id', 'notes', 'website'
    ];
}
