<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Project;
use App\Evaluation;
use Auth;


class EvaluationController extends Controller
{
    public function evaluate(Request $request, $project_id){
        $rules = [
            'comment' => ['required', 'string', 'max:10000'],
            'rate' => ['required', 'integer'],
        ];

//        $messages = [
//            'attachments.*.mimes' => 'نوع الملف (png, jpeg, jpg, pdf, txt, docx)'
//        ];

        $validation = Validator::make($request->all(), $rules);

        if ($validation->fails()){
            return redirect()->back()->with('error',  $validation->messages()->first());
        }
        
        $rate = $request->rate;
        if($rate < 1)
            $rate = 1;
        if($rate > 5)
            $rate = 5;
        
        $eval = Evaluation::where('project_id', $project_id)->first();
        if(is_object($eval)){
            if(Auth::user()->permission == 2){
                if(!empty($eval->rating_to_company)){
                    return redirect()->back()->with('error', 'تم التقييم من قيل'); 
                }
                $res = $eval->fill([
                    'rating_to_company' => $rate,
                    'comment_to_company' => $request->comment,
                    'rating_to_company_time' => date('Y-m-d h:i:s', time()),
                ])->save();
                
                $project = $eval->project;
                $user = $project->company;
                $user->rating = ($user->rating * $user->total_rating_num + $rate) / ($user->total_rating_num + 1);
                $user->total_rating_num += 1;
                $user->save();
                
            }
            else{
                if(!empty($eval->rating_to_owner)){
                    return redirect()->back()->with('error', 'تم التقييم من قيل'); 
                }
                $res = $eval->fill([
                    'rating_to_owner' => $rate,
                    'comment_to_owner' => $request->comment,
                    'rating_to_owner_time' => date('Y-m-d h:i:s', time()),
                ])->save();  
                
                $project = $eval->project;
                $user = $project->owner;
                $user->rating = ($user->rating * $user->total_rating_num + $rate) / ($user->total_rating_num + 1);
                $user->total_rating_num += 1;
                $user->save();
            }
        }
        /* create rating */
        else{
            /* if the user is owner */
            if(Auth::user()->permission == 2){
                $res = Evaluation::create([
                    'rating_to_company' => $rate,
                    'comment_to_company' => $request->comment,
                    'project_id' => $project_id,
                    'rating_to_company_time' => date('Y-m-d h:i:s', time()),
                ]);
                
                $project = Project::find($project_id);
                $user = $project->company;
                $user->rating = ($user->rating * $user->total_rating_num + $rate) / ($user->total_rating_num + 1);
                $user->total_rating_num += 1;
                $user->save();
            }
            else{
                $res = Evaluation::create([
                    'rating_to_owner' => $rate,
                    'comment_to_owner' => $request->comment,
                    'project_id' => $project_id,
                    'rating_to_owner_time' => date('Y-m-d h:i:s', time()),
                ]);
                
                $project = Project::find($project_id);
                $user = $project->owner;
                $user->rating = ($user->rating * $user->total_rating_num + $rate) / ($user->total_rating_num + 1);
                $user->total_rating_num += 1;
                $user->save();
            }
            
        }
        if(is_object($res) || $res == true){
            if(!empty($project->rating->rating_to_owner) && !empty($project->rating->rating_to_company)){
                $project->fill([
                    'evaluation_status' => 1
                ])->save();
            }
            return redirect()->back()->with('success', 'تم التقييم بنجاح');
        }
        else
            return redirect()->back()->with('error', 'Something Went Wrong'); 

    }
    
    
}
