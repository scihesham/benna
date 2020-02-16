<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Auth;
use App\User;
use App\Attachment;
use File;
use App\CompanyDetail;
use App\OwnerDetail;
use App\InstituteDetail;
use App\PersonalDetail;
use Hash;

use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMail;

class FrontController extends Controller
{

    public function index(){
        return view('front.index');
    }
    
    
    public function profile(){
        return view('front.profile.profile');
    }
    
    public function freelancers(){
        return view('front.profile.freelancer');
    }
     
    
    public function updateprofile(Request $request){

        if(Auth::user()->type == '0'){
            $rules = [
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'email', 'max:255', Rule::unique('users')->ignore(Auth::user()->id),],
                'password' => ['nullable', 'string', 'min:6', 'confirmed'],
                'last_name' => ['required', 'string'],
                'phone' => ['required', 'string'],
                'attachment' => ['nullable', 'mimes:jpeg,png,jpg', 'max:2048'],
                'facebook' => ['nullable', 'string'],
                'instgram' => ['nullable', 'string'],
                'twitter' => ['nullable', 'string'],

            ];
        }
        
        if(Auth::user()->type == '1' || Auth::user()->type == '2'){
            $rules = [
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'email', 'max:255', Rule::unique('users')->ignore(Auth::user()->id),],
                'password' => ['nullable', 'string', 'min:6', 'confirmed'],
                
                'en_name' => ['required', 'string'],
                'commercial_reg' => ['required', 'string'],
                'representative' => ['required', 'string'],
                'notes' => ['required', 'string'],
                'contact_fname' => ['required', 'string'],
                'contact_lname' => ['required', 'string'],
//                'contact_social' => ['required', 'string'],
                'website' => ['required', 'string'],
                'city' => ['required', 'integer'],
                'phone' => ['required', 'string'],
                'attachment' => ['nullable', 'mimes:jpeg,png,jpg', 'max:2048'],
                'facebook' => ['nullable', 'string'],
                'instgram' => ['nullable', 'string'],
                'twitter' => ['nullable', 'string'],

            ];
        }


        $validation = Validator::make($request->all(),$rules);

        if ($validation->fails()){
            return redirect()->back()->with('error', $validation->messages()->first());
        }
        $user = User::find(Auth::user()->id);
        
        /* remove old file */
        if(!empty($request->attachment)){
            
              /* add new file */
              $attach = $request->attachment;
              $newname =  Auth::user()->id.'_'.date("d_m_Y").rand(1, 1000).time().'_'.rand(1, 1000).'.'.$attach->getClientOriginalExtension();
              $attach->move(public_path('upload/users'), $newname); 
            
              /* delete old file */
              if(!empty($user->attachment_id)){
                  
                  $attachment = Attachment::find($user->attachment_id);
                  $path = public_path('upload/').$attachment->path;  
                  if(File::exists($path)) {
                        File::delete($path);
                  }
                  /* edit attachment database */
                  $user->attachment->fill([
                         'name' => $attach->getClientOriginalName(),
                         'path' => 'users/'.$newname
                  ])->save();
                  
              }
               else{
                    $attach_res = Attachment::create([
                        'name' => $attach->getClientOriginalName(),
                         'path' => 'users/'.$newname
                    ]);
                    $user->attachment_id = $attach_res->id;
                    $user->save();
                }
            

        }
        
        if(empty($request->password)){
            $res = $user->fill([
                'name' => $request->name,
                'email' => $request->email,
                'facebook' => $request->facebook,
                'instgram' => $request->instgram,
                'twitter' => $request->twitter,
            ])->save();
        }
        else{
            $res = $user->fill([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'facebook' => $request->facebook,
                'instgram' => $request->instgram,
                'twitter' => $request->twitter,
            ])->save();  
        }
        $request['user_id'] = $user->id;
        if(Auth::user()->permission == 2){
             $user->owner->fill($request->all())->save();
        }
        if(Auth::user()->permission == 3){
            if(Auth::user()->type == 0){
                $user->personal->fill($request->all())->save();
            }
            if(Auth::user()->type == 1){
                $user->company->fill($request->all())->save();
            }
            if(Auth::user()->type == 2){
                $user->institute->fill($request->all())->save();
            }
        }
        if($res == true){
            return redirect()->back()->with('success', 'تم التعديل بنجاح');
        }
        else{
            return redirect()->back()->with('error', 'Something Went Wrong');
        }
        
    }
    
    
    
    public function reviews($user_id){
        $user = User::find($user_id);
        $projects = $user->permission == 2 ? $user->projectOwners->where('evaluation_status', 1) : $user->projectCompanies->where('evaluation_status', 1);
        return view('front.reviews.reviews', compact('projects', 'user'));
    }
    
    public function aboutUs(){
        return view('front.aboutus');
    }
    
    public function contactUs(){
        return view('front.contactus');
    }
    
    public function sendContact(Request $request){
        $rules = [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'company_name' => ['nullable', 'string', 'max:255'],
            'message' => ['required', 'string', 'min:10'],
        ];
        
        $validation = Validator::make($request->all(),$rules);

        if ($validation->fails()){
            return redirect()->back()->with('error', $validation->messages()->first());
        }
//        dd($request->all());
        $receipt = "bennaquick@gmail.com";
        Mail::to($receipt)
                ->send(new ContactMail($request->company_name, $request->name, $request->email, $request->message));
        
        return redirect()->back()->with('success', 'تم ارسال الرساله بنجاح');
    }
    
    public function underMaintainance(){
        return view('front.closed');
    }
    
}





