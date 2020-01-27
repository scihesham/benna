<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OwnerDetail extends Model
{
    protected $fillable = [
       'last_name', 'phone', 'user_id'
    ];

}
