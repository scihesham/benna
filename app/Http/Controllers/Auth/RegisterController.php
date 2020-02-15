<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;
use App\User;
use App\Code;
use App\CompanyDetail;
use App\OwnerDetail;
use App\InstituteDetail;
use App\PersonalDetail;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\RegisterMail;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        
        if($data['user_type'] == 'owner'){
            return Validator::make($data, [
                'name' => 'required|string|max:255',
                'last_name' => 'required|string',
                'phone' => 'required|string',
                'email' => 'required|string|email|max:255|unique:users',
                't_and_c' => 'required',
//                'permission' => 'required|integer|regex:/[2-3]{1}/',
                'password' => 'required|string|min:6|confirmed',
            ]);
        }
        
        if($data['user_type'] == 'personal'){
            return Validator::make($data, [
                'name' => 'required|string|max:255',
                'last_name' => 'required|string',
                'phone' => 'required|string',
                'email' => 'required|string|email|max:255|unique:users',
//                't_and_c' => 'required',
//                'permission' => 'required|integer|regex:/[2-3]{1}/',
                'notes' => 'required|string',
                'password' => 'required|string|min:6|confirmed',
                'website' => 'nullable|string',
            ]);
        }
        
        
        if($data['user_type'] == 'company'){
            return Validator::make($data, [
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'password' => 'required|string|min:6|confirmed',
                'en_name' => 'required|string',
                'commercial_reg' => 'required|string',
                'representative' => 'required|string',
                'notes' => 'required|string',
                'contact_fname' => 'required|string',
                'contact_lname' => 'required|string',
//                'contact_social' => 'required|string',
                'website' => 'nullable|string',
                'city' => 'required|integer',
                'phone' => 'required|string',
            ]);
        }
        
        if($data['user_type'] == 'institute'){
            return Validator::make($data, [
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'password' => 'required|string|min:6|confirmed',
                'en_name' => 'required|string',
                'commercial_reg' => 'required|string',
                'representative' => 'required|string',
                'notes' => 'required|string',
                'contact_fname' => 'required|string',
                'contact_lname' => 'required|string',
//                'contact_social' => 'required|string',
                'website' => 'nullable|string',
                'city' => 'required|integer',
                'phone' => 'required|string',
            ]);
        }
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $permission = $data['user_type'] == 'owner' ? 2 : 3;
        if($data['user_type'] == 'company'){
           $type = 1;
        }
        else if($data['user_type'] == 'institute'){
           $type = 2; 
        }
        else{
           $type = 0;  
        }

        if($permission == 2){
            $user =  User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'permission' => $permission,
                'type' => $type,
                'password' => Hash::make($data['password']),
            ]);
        }
        else{
            
            $user =  User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'permission' => $permission,
                'type' => $type,
                'password' => Hash::make($data['password']),
                'facebook' => $data['facebook'],
                'instgram' => $data['instgram'],
                'twitter' => $data['twitter'],
            ]);
            
        }

        $data['user_id'] = $user->id;
        if($data['user_type'] == 'owner'){
            OwnerDetail::create($data);
        }
        if($data['user_type'] == 'personal'){
            PersonalDetail::create($data);
        }
        if($data['user_type'] == 'company'){
            CompanyDetail::create($data);
        }
        if($data['user_type'] == 'institute'){
            InstituteDetail::create($data);
        }
        
        if(is_object($user)){    
            /* send mail with activation code */
            $charset = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890";
            $crypt = md5(substr(str_shuffle($charset), 0, 5));
            $rand = substr(str_shuffle($charset), 0, 15);
            $receipt = $user->email;
            $link = $rand.$crypt.date("d_m_Y").rand(1, 1000).time();
            $code_activation = Code::create([
                'code' => $link,
                'user_id' => $user->id
            ]);
            Mail::to($receipt)
                ->send(new RegisterMail($link));
        }
        
        return $user;
    }
    
    
    
    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        event(new Registered($user = $this->create($request->all())));
          // edits
//        $this->guard()->login($user);

        return $this->registered($request, $user)
                        ?: redirect($this->redirectPath())->with('success', 'تم تسجيل الحساب بنجاح برجاء تفعيل الايميل');
    }
    
    
    
}
