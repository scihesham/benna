<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use Illuminate\Support\Facades\Auth;
use App\Attachment;
use File;
use Redirect;

class ProjectController extends Controller
{
     public function index(Request $request){
         
        if(isset($request->id) ){
                $projects = Project::where('id', $request->id)->get();
                $title = 'عرض المشروع';
                return view('admin.project.index', compact('projects', 'title'));
        }
         
        if(isset($request->project) && ( ($request->project == 'under') || ($request->project == 'done') )){

            if($request->project == 'under'){
                $projects = Project::where('status', '1')->orderBy('id', 'desc')->get();
                $title = 'قائمه المشاريع تحت التنفيذ';
            }

            if($request->project == 'done'){
                $projects = Project::where('status', '2')->orderBy('id', 'desc')->get();
                $title = 'قائمه المشاريع المنفذه';
            }
        }
        
        else{
           $projects = Project::where('status', '0')->orderBy('id', 'desc')->get(); 
           $title = 'قائمه المشاريع غير المنفذه';
        } 
        return view('admin.project.index', compact('projects', 'title'));
    }
    
    
    public function show(Request $request, $id)
    {
        if ($request->ajax()){
            $project = Project::findOrFail($id);
            return view('admin.project.show', compact('project'));
        } else {
            return back();
        }
    }
    
    public function destroy($id){
        
        $project = Project::find($id);
                
        /* remove old file */
        if(!empty($project->attachment_id)){
              $attachments_id = json_decode($project->attachment_id);
              foreach($attachments_id as $attachment_id){
                  $attachment = Attachment::find($attachment_id);
                  $path = public_path('upload/').$attachment->path;  
                  if(File::exists($path)) {
                        File::delete($path);
                  }
                  $attachment->delete();
              }
        }
        
        $res = $project->delete();
        
        if($res == true){
            return redirect()->back()->with('success', 'تم حذف المشروع بنجاح');
        }
        else{
            return redirect()->back()->with('error', 'Something Went Wrong');
        }
        
    }
    
    
    
}




