<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'permission', 'balance', 'type', 'attachment_id', 'last_seen_project', 'last_seen_offer', 
        'last_seen_invoice', 'last_seen_receipt', 'facebook', 'instgram', 'twitter'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    
    
    
    public function projectOwners(){
        return $this->hasMany('App\Project', 'owner_id');
    }
    
    public function projectCompanies(){
        return $this->hasMany('App\Project', 'company_id');
    }
    
    public function owner(){
        return $this->hasOne('App\OwnerDetail')->withDefault();
    }
    
    public function personal(){
        return $this->hasOne('App\PersonalDetail')->withDefault();
    }
    
    public function company(){
        return $this->hasOne('App\CompanyDetail')->withDefault();
    }
    
    public function institute(){
        return $this->hasOne('App\InstituteDetail')->withDefault();
    }
    
    public function attachment(){
        return $this->belongsTo('App\Attachment', 'attachment_id')->withDefault();
    }
    

    
}








