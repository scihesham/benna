<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\AddUserRequestAdmin;
use App\Http\Requests\EditUserRequest;
use App\User;
use Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;
use Redirect;
use App\Attachment;
use File;


class UserController extends Controller
{
    public function index(Request $request){
        if(isset($request->user) && ( ($request->user == 'owner') || ($request->user == 'manager') )){

            if($request->user == 'owner'){
                $users = User::where('permission', '2')->get();
            }

            if($request->user == 'manager'){
                $users = User::where('permission', '0')->orWhere('permission', '1')->get();
            }
        }
        
        else{
           $users = User::where('permission', '3')->get(); 
        }
        return view('admin.user.index', compact('users'));
    }
    
    
//    public function store(Request $request){
//
//        $rules = [
//            'name' => ['required', 'string', 'max:255'],
//            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
//            'password' => ['required', 'string', 'min:6', 'confirmed'],
//            'permission' => ['required', 'integer',],
//        ];
//
//        $messages = [
//
//            'name.required' => 'اسم العضو مطلوب',
//            'email.required' => 'البريد الالكترونى مطلوب',
//            'password.required' => 'الرقم السري مطلوب',
//            'permission.required' => 'صلاحيه العضو مطلوبه',
//        ];
//
//        $validation = Validator::make($request->all(),$rules, $messages);
//
//        dd($request->permission);
//        
//        if ($validation->fails()){
//            return response()->json(['status' => 0, 'msg' => $validation->messages()->first()]);
//        }
//        $res = User::create($request->all());
//        if(is_object($res)){ 
//            return response()->json(['status' => 1, 'msg' => 'تم إضافة العضو بنجاح']);
//        }
//        else{
//           return response()->json(['status' => 0, 'msg' => 'هناك مشكله فى اضافه العضو']);
//        }
//        
//    }
    
    
    public function store(AddUserRequestAdmin $request)
    {
//        dd($request->all());
        $res = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'permission' => $request->permission,
        ]);
        
        if(is_object($res)){
            $res->status = 1;
            $res->save();
            return redirect()->back()->with('success', 'تمت اضافه العضو بنجاح');
        }
        else{
           return redirect()->back()->with('error', 'Something Went Wrong'); 
        }
        
    }
    
    
    public function edit(Request $request, $id)
    {
        if ($request->ajax()){
            $user = User::findOrFail($id);
            return view('admin.user.edit', compact('user'));
        } else {
            return back();
        }
    }
    
    
    
    public function update(EditUserRequest $request, $id)
    {
        $user = User::find($id);
        $res = $user->fill($request->except(['password', 'password_confirmation']))->save();
        if(!empty($request['password'])){
            $password = Hash::make($request->password);
            $user->password = $password;
            $user->save();
        }

        if($res == true){
            return redirect()->back()->with('success', 'تم تعديل البيانات بنجاح');
        }
        else{
           return redirect()->back()->with('error', 'Something Went Wrong'); 
        }
    }
    
    
    public function destroy($id){
        
        $user = new User;
        $res = $user->find($id)->delete();
        
        if($res == true){
            return redirect()->back()->with('success', 'تم حذف العضو بنجاح');
        }
        else{
            return redirect()->back()->with('error', 'Something Went Wrong');
        }
        
    }
    
    
    public function active_status($id){
        
        $user = User::find($id);
        $new_status = $user->status == 1 ? '0' : '1';
        $user->status = $new_status;
        $res = $user->save();
        
        if($res == true){
            return redirect()->back()->with('success', 'تم تعديل حاله العضو بنجاح');
        }
        else{
            return redirect()->back()->with('error', 'Something Went Wrong');
        }
        
    }
    
    
    
    public function editUserProfile($id){
        $user = User::find($id);
        return view('admin.profile.userprofile', compact('user'));
    }
    
    
    public function updateUserProfile(Request $request, $id){
        $user = User::find($id);
        if($user->type == '0'){
            $rules = [
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'email', 'max:255', Rule::unique('users')->ignore($user->id),],
                'password' => ['nullable', 'string', 'min:6', 'confirmed'],
                'last_name' => ['required', 'string'],
                'phone' => ['required', 'string'],
                'attachment' => ['nullable', 'mimes:jpeg,png,jpg', 'max:2048'],

            ];
        }
        
        if($user->type == '1' || $user->type == '2'){
            $rules = [
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'email', 'max:255', Rule::unique('users')->ignore($user->id),],
                'password' => ['nullable', 'string', 'min:6', 'confirmed'],
                
                'en_name' => ['required', 'string'],
                'commercial_reg' => ['required', 'string'],
                'representative' => ['required', 'string'],
                'notes' => ['required', 'string'],
                'contact_fname' => ['required', 'string'],
                'contact_lname' => ['required', 'string'],
                'contact_social' => ['required', 'string'],
                'website' => ['required', 'string'],
                'city' => ['required', 'integer'],
                'phone' => ['required', 'string'],
                'attachment' => ['nullable', 'mimes:jpeg,png,jpg', 'max:2048'],

            ];
        }


        $validation = Validator::make($request->all(),$rules);

        if ($validation->fails()){
            return redirect()->back()->with('error', $validation->messages()->first());
        }
        $user = User::find($user->id);
        
        /* remove old file */
        if(!empty($request->attachment)){
            
              /* add new file */
              $attach = $request->attachment;
              $newname =  $user->id.'_'.date("d_m_Y").rand(1, 1000).time().'_'.rand(1, 1000).'.'.$attach->getClientOriginalExtension();
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
            ])->save();
        }
        else{
            $res = $user->fill([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ])->save();  
        }
        $request['user_id'] = $user->id;
        if($user->permission == 2){
             $param = 'owner';
             $user->owner->fill($request->all())->save();
        }
        if($user->permission == 3){
            $param = 'company';
            if($user->type == 0){
                $user->personal->fill($request->all())->save();
            }
            if($user->type == 1){
                $user->company->fill($request->all())->save();
            }
            if($user->type == 2){
                $user->institute->fill($request->all())->save();
            }
        }
        if($res == true){
            return redirect('admin/users?user='.$param)->with('success', 'تم التعديل بنجاح');
        }
        else{
            return redirect()->back()->with('error', 'Something Went Wrong');
        }
        
    }/* end updateUserProfile */
    
    
}
