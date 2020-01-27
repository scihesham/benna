<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use App\Mail\ResetMail;
use Illuminate\Support\Facades\Validator;
use App\User;
use Auth;

class AccountsController extends Controller
{
    
    function validatePasswordRequest (Request $request){
       
            $user = DB::table('users')->where('email', '=', $request->email)
                ->first();
            //Check if the user exists
            if (!is_object($user)) {
                return redirect()->back()->withErrors(['email' => trans('User does not exist')]);
            }
        
            DB::table('password_resets')->where('email', $user->email)
                ->delete();
        
            //Create Password Reset Token
            DB::table('password_resets')->insert([
                'email' => $request->email,
                'token' => str_random(60),
                'created_at' => Carbon::now()
            ]);
        
        
            //Get the token just created above
            $tokenData = DB::table('password_resets')
                ->where('email', $request->email)->first();
            
        if(is_object($tokenData)){
            $link = config('base_url') . 'password/reset/' . $tokenData->token . '?email=' . urlencode($user->email);
            $receipt = $request->email;
            Mail::to($receipt)
                ->send(new ResetMail($link));
            return redirect()->back()->with('success', 'Email sent Successfully');
        }
        
    }
        
    
   public function resetPassword(Request $request)
   {
        //Validate input
        $validator = Validator::make($request->all(), [
            'email' => 'required|exists:users,email',
            'password' => 'required|confirmed'
        ]);

        //check if input is valid before moving on
        if ($validator->fails()) {
            return redirect()->back()->withErrors(['email' => $validator->messages()->first()]);
        }

        $password = $request->password;
    // Validate the token
        $tokenData = DB::table('password_resets')
        ->where('token', $request->token)->first();
    // Redirect the user back to the password reset request form if the token is invalid
        if (!$tokenData) return view('auth.passwords.email');
     
        $user = User::where('email', $tokenData->email)->first();
    // Redirect the user back if the email is invalid
        if (!$user) return redirect()->back()->withErrors(['email' => 'عفوا لم نتمكن من ايجاد البريد الالكتروني']);
    //Hash and update the new password
        $user->password = \Hash::make($password);
        $user->update(); //or $user->save();

        //login the user immediately they change password successfully
        Auth::login($user);

        //Delete the token
        DB::table('password_resets')->where('email', $user->email)
        ->delete();

       return redirect(url('/'))->with('success', 'تم تعيين كلمه السر الجديده بنجاح');

   } 

    
    
}
    
    
    

