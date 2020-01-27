<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SiteSetting;

class AdminController extends Controller
{
    public function index(){
        return view('admin.index');
    }
    
    public function changeSiteStatus(){
        $setting = SiteSetting::find(1);
        $status = $setting->status == 1 ? '0' : 1;
        $setting->status = $status;
        $setting->save();
        return redirect()->back();
    }
    
}
