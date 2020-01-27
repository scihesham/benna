<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\OfferStatus;
use App\Dispute;
use App\Milestone;
use App\DisputeMessage;
use App\Attachment;
use Redirect;
use Illuminate\Support\Facades\Validator;
use Auth;

class DisputeController extends Controller
{

     public function index(Request $request){
        if(isset($request->status) && ( ($request->status == 'solved') )){
                $disputes = Dispute::where('status', '1')->get();
                $title = 'النزاعات التى تم حلها';
        }
        
        else{
                $disputes = Dispute::where('status', '0')->get();
                $title = 'النزاعات المفتوحه';
        } 
        return view('admin.dispute.index', compact('disputes', 'title'));
    }
    
    
    
    public function edit_dispute(Request $request, $id)
    {
        if ($request->ajax()){
            $dispute = Dispute::findOrFail($id);
            return view('admin.dispute.edit', compact('dispute'));
        } else {
            return back();
        }
    }
    
    
    public function update_dispute(Request $request, $id)
    {
        $dispute = Dispute::findOrFail($id);
        $res = $dispute->fill($request->all())->save();

        if($res == true){
            return redirect()->back()->with('success', 'تم تعديل النزاع بنجاح');
        }
        else{
           return redirect()->back()->with('error', 'Something Went Wrong'); 
        }
    }
    
    
    public function showDisputeMessage($dispute_id){
        $dispute = Dispute::find($dispute_id);
        return view('admin.dispute.show', compact('dispute'));
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
                if(!empty($request->attachments)){
                    foreach($request->attachments as $attach){
                        /* add new files */
                        $newname =  date("d_m_Y").rand(1, 1000).time().'_'.$attach->getClientOriginalName();
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
                    return redirect()->back()->with('success','تم الارسال بنجاح');
                }
                else{
                    return redirect()->back()->with('error', 'تم حدوث خطأ');
                }
            
        }
        else{
            return redirect()->back()->with('error', 'تم حدوث خطأ');
        }
        
        
    }
    


    public function judge(Request $request, $dispute_id){
        $rules = [
            'owner_percent' => ['required', 'numeric'],
        ];

        $validation = Validator::make($request->all(),$rules);

        if ($validation->fails()){
            return redirect()->back()->with('error', $validation->messages()->first());
        }
        
        $dispute = Dispute::find($dispute_id);
        if(is_object($dispute)){
           if($dispute->milestone->status == 1){
                return redirect()->back()->with('error', 'تم التحرير من قبل');
            }
            $milestone_val = $dispute->milestone->value;
            $company_percent = 100 - $request->owner_percent;
            $owner_balance = $milestone_val * ($request->owner_percent / 100);
            $company_balance = $milestone_val * ($company_percent / 100);
            
            $milestone = $dispute->milestone;
            $milestone->status = 1;
            $milestone->value = $company_balance;
            $milestone->save();
            
//            $dispute->milestone->fill([
//                'status' => 'dsdsd'
//            ])->save();
            
//            dd($dispute->milestone->status);
            
            $dispute->milestone->offer->owner->fill([
                'balance' => $owner_balance + $dispute->milestone->offer->owner->balance
            ])->save();
            
            $dispute->milestone->offer->company->fill([
                'balance' => $company_balance + $dispute->milestone->offer->company->balance
            ])->save();
                
            $request['company_percent'] = $company_percent;
            $request['status'] = 1;
            $res = $dispute->fill($request->all())->save();
            if($res == true){
                return redirect(target().'/project/offer/disputes')->with('success','تم تقسيم الدفعه الماليه بنجاح');
            }
            else{
                return redirect()->back()->with('error', ' تم حدوث خطأ');
            }
        }
        else{
             return redirect()->back()->with('error', 'تم حدوث خطأ');
        }
        
        
    }




}







