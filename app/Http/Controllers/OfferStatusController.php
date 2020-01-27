<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use App\Attachment;
use App\OfferStatus;
use File;
use Redirect;

class OfferStatusController extends Controller
{
    public function index($project_id){
        $project = Project::find($project_id);
        return view('admin.offer.index', compact('project'));
    }
    
    public function show(Request $request, $id)
    {
        if ($request->ajax()){
            $offer = OfferStatus::find($id);
            return view('admin.offer.show', compact('offer'));
        } else {
            return back();
        }
    }
    
    
    public function destroy($id){
        
        $offer = OfferStatus::find($id);
        
        if(isset($offer->offer->attachment_id)){
            foreach(json_decode($offer->offer->attachment_id) as $val){
                $attach = Attachment::find($val);
                if(is_object($attach)){
                    $image_path = './public/upload/'.$attach->path;
                    if(File::exists($image_path)) {
                        File::delete($image_path);
                    }
                    $attach->delete();
                }
            }
        }
       
        
        $offer->offer->delete();
        $res = $offer->delete();
        
        if($res == true){
            return redirect()->back()->with('success', 'تم حذف المرفقات بنجاح');
        }
        else{
            return redirect()->back()->with('error', 'Something Went Wrong');
        }
        
    }
    

    
}
