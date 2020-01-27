<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Milestone;
use App\Dispute;
use App\DisputeMessage;
use App\OfferStatus;
use App\Attachment;
use Auth;
use Illuminate\Support\Facades\Validator;

class MilestoneController extends Controller
{
    public function release($milestone_id){
        $milestone = Milestone::find($milestone_id);
        if(is_object($milestone)){
            /* check if the milestone is for the awardoffer */
            if(!isset($milestone->offer->project->awardOffer->id)){
                return redirect('/')->with('error', 'this isn\'t milestone for this project');
            }
            
            /* check if the user is the owner */
            if(Auth::user()->id == $milestone->offer->project->owner_id){
                if($milestone->status == 1){
                    return redirect()->back()->with('error', 'تم التحرير من قبل');
                }else{
                    $milestone->status = 1;
                    $res = $milestone->save();
                    $milestone->offer->project->company->fill([
                        'balance' => $milestone->offer->project->company->balance + $milestone->value
                    ])->save();
                    if($res == true){
                        return redirect()->back()->with('success', 'تم التحرير بنجاح');
                    }
                    else{
                        return redirect()->back()->with('error', 'تم حدوث خطأ');
                    }
                    
                }
            }
            else{
                return redirect()->back()->with('error','عفوا, انك لاتمتلك هذه الصلاحيه');
            }
        }
        else{
             return redirect()->back()->with('error', 'تم حدوث خطأ');
        }
    }
    
    public function createdispute($milestone_id){
        $milestone = Milestone::find($milestone_id);
        if(is_object($milestone)){
            if($milestone->status == 2){
                return redirect('/')->with('error', 'تم فتح تزكره من قبل');
            }
            return view('front.dispute.create', compact('milestone'));
        }
        else{
            return redirect()->back()->with('error', 'تم حدوث خطأ');  
        }
    }
    
    
    public function storedispute(Request $request, $milestone_id){
        $rules = [
            'attachments.*' => ['mimes:jpeg,png,jpg,pdf,txt,docx', 'max:10000'],
        ];

        $messages = [
            'attachments.*.mimes' => 'نوع الملف (png, jpeg, jpg, pdf, txt, docx)'
        ];

        $validation = Validator::make($request->all(),$rules, $messages);

        if ($validation->fails()){
            return redirect()->back()->with('error', $validation->messages()->first());
        }
        
        $milestone = Milestone::find($milestone_id);
        if(is_object($milestone)){
            /* check if the milestone is for the awardoffer */
            if(!isset($milestone->offer->project->awardOffer->id)){
                return redirect('/')->with('error', 'this isn\'t milestone for this project');
            }
            /* if user isn't owner or company for this project */
            if(Auth::user()->id != $milestone->offer->owner_id && Auth::user()->id != $milestone->offer->company_id){
                return redirect()->back()->with('error','عفوا, انك لاتمتلك هذه الصلاحيه');
            }
            
/************************************ if dispute created before *************************************************/
            if($milestone->status == 2){
                $msg_count = $milestone->dispute->disputeMessages->where('send_from', Auth::user()->id)->where('type', '0')->count();
                if($msg_count > 4){
                    return redirect()->back()->with('error', 'عفوا لقد ارسلت 5 رسائل');
                }
                if(!empty($request->attachments)){
                    foreach($request->attachments as $key => $attach){
                        /* add new files */
                        $newname =  Auth::user()->id.'_'.$key.date("d_m_Y").rand(1, 1000).time().'_'.rand(1, 1000).'.'.$attach->getClientOriginalExtension();
                        $attach->move(public_path('upload/'.$milestone->offer->project_id), $newname); 
                        $input = [];
                        $input['name'] = $attach->getClientOriginalName();
                        $input['path'] = $milestone->offer->project_id.'/'.$newname;
                        $attach_res = Attachment::create($input);

                        $msg = DisputeMessage::create([
                            'send_from' => Auth::user()->id,
                            'type' => '1',
                            'content' => $attach_res->id,
                            'dispute_id' => $milestone->dispute->id
                        ]);
                    }
                }

                if(!empty($request->content)){
                    $msg = DisputeMessage::create([
                        'send_from' => Auth::user()->id,
                        'type' => '0',
                        'content' => $request->content,
                        'dispute_id' => $milestone->dispute->id
                    ]);  

               }

                if(is_object($msg)){
//                    $milestone->status = 2;
//                    $milestone->save();
                    return redirect()->back()->with('success','تم الارسال بنجاح');
                }
                else{
                    return redirect()->back()->with('error', 'تم حدوث خطأ');
                }                
               
            }
/*********************************************************************************************/
            
          
            $opponent_user = Auth::user()->permission == '2' ? $milestone->offer->company_id : $milestone->offer->owner_id;
            $res = Dispute::create([
                'from_user' => Auth::user()->id,
                'opponent_user' => $opponent_user,
                'milestone_id' => $milestone->id
            ]);

            /* create message content */
            $msg_created = [];
            if(!empty($request->attachments)){
                foreach($request->attachments as $key => $attach){
                    /* add new files */
                    $newname =  Auth::user()->id.'_'.$key.date("d_m_Y").rand(1, 1000).time().'_'.rand(1, 1000).'.'.$attach->getClientOriginalExtension();
                    $attach->move(public_path('upload/'.$milestone->offer->project_id), $newname); 
                    $input = [];
                    $input['name'] = $attach->getClientOriginalName();
                    $input['path'] = $milestone->offer->project_id.'/'.$newname;
                    $attach_res = Attachment::create($input);

                    $msg = DisputeMessage::create([
                        'send_from' => Auth::user()->id,
                        'type' => '1',
                        'content' => $attach_res->id,
                        'dispute_id' => $res->id
                    ]);
                }
            }

            if(!empty($request->content)){
                $msg = DisputeMessage::create([
                    'send_from' => Auth::user()->id,
                    'type' => '0',
                    'content' => $request->content,
                    'dispute_id' => $res->id
                ]);  

           }
            
            if(is_object($msg)){
                $milestone->status = 2;
                $milestone->save();
                return redirect(url('messages'.'/'.$milestone->offer->id.'#milestone'))->with('success','تم انشاء تذكره بنجاح');
            }
            else{
                return redirect()->back()->with('error', 'تم حدوث خطأ');
            }
        }
        else{
             return redirect()->back()->with('error', 'تم حدوث خطأ');
        }
    }
    
    
   
    
    public function showdispute($milestone_id){
        $milestone = Milestone::find($milestone_id);
        if(is_object($milestone)){

            return view('front.dispute.show', compact('milestone'));
        }
        else{
            return redirect()->back()->with('error', 'تم حدوث خطأ');  
        }

        
    } 
    
    
}
