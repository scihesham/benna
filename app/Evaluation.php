<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Evaluation extends Model
{
    protected $fillable = [
       'rating_to_owner', 'rating_to_company', 'comment_to_owner', 'comment_to_company', 'project_id',
        'rating_to_owner_time', 'rating_to_company_time'
    ];
    
    public function project(){
        return $this->belongsTo('App\Project')->withDefault();
    }
}
