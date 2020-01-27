<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InstituteDetail extends Model
{
    protected $fillable = [
       'en_name', 'commercial_reg', 'representative', 'notes', 'contact_fname', 'contact_lname', 'contact_email', 'contact_social', 'website', 'city', 'phone', 'user_id'
    ];
}
