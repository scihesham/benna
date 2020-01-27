<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Code;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except('checkCode');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }
    
    public function checkCode(Request $request, $code){
        $res = Code::where('code', $code)->first();
        if(!empty($res)){
            $user = $res->user;
            $user->status = 1;
            $status = $user->save();
            if($status == true){
                $res->delete();
                return redirect('/')->with('success', 'لقد تم تفعيل الحساب بنجاح يمكنك الان تسجيل الدخول');
            }
            else
                return redirect('/')->back()->with('error', 'Something Went Wrong');
        }
        else{
            return redirect()->back()->with('error', 'ان هذا الكود غير مسجل فى قواعد البيانات لدينا');
        }
                    
    }
}
