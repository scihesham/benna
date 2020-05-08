<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\City;
use Redirect;
use Validator;


class CityController extends Controller
{
     public function index(){
        $cities = City::all(); 
        return view('admin.city.index', compact('cities'));
    }
    
    
    public function store(Request $request)
    {  
        
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string'],
        ]);


        if ($validator->fails()) {
            return redirect()->back()->with('error', $validator->errors()->first());
        }
        
        $max_ordering = City::max('ordering');
        $request['ordering'] = $max_ordering + 1;
        
        $res = City::create($request->all());
        
        if(is_object($res)){
            return redirect()->back()->with('success', 'تمت الاضافه بنجاح');
        }
        else{
           return redirect()->back()->with('error', 'Something Went Wrong'); 
        }
        
    }
    
    
    
    public function edit(Request $request, $id)
    {
        if ($request->ajax()){
            $city = City::findOrFail($id);
            return view('admin.city.edit', compact('city'));
        } else {
            return back();
        }
    }
    
    
    public function update(Request $request, $id){
        
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string'],
        ]);


        if ($validator->fails()) {
            return redirect()->back()->with('error', $validator->errors()->first());
        }
        
        
        $city = City::find($id);
        
        if(is_object($city)){
                $res = $city->fill($request->all())->save();
                if($res == true){
                    return redirect()->back()->with('success', 'تم التعديل بنجاح'); 
                }
                else{
                    return redirect()->back()->with('error', 'Something Went Wrong'); 
                }
                    
            }
            else{
               return redirect()->back()->with('error', 'Something Went Wrong'); 
            }
   }
    
    
    public function destroy($id){
        
        $city = City::find($id);
        $res = $city->delete();

        if($res == true){
            return redirect()->back()->with('success', 'تم الحذف بنجاح');
        }
        else{
            return redirect()->back()->with('error', 'Something Went Wrong');
        }
        
    }
}
