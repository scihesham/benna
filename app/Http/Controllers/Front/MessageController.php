<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\OfferStatus;
use App\Attachment;
use App\Message;
use App\MessageNotification;
use Auth;
use Illuminate\Support\Facades\Validator;


class MessageController extends Controller
{
    public function index($offer_id){
        $offer = OfferStatus::find($offer_id);
        $messages = $offer->messages;
        foreach($messages as $message){
            /* isset($message->messageNotifications->to_user)  => for old messages that don't have notifications */
            if(isset($message->messageNotifications->to_user) && $message->messageNotifications->to_user == Auth::user()->id){
                $message->messageNotifications->fill([
                    'to_status' => 1
                ])->save();            
            }

        }
        
        if($offer->owner_id != Auth::user()->id && $offer->company_id != Auth::user()->id){
            return redirect('login')->with('error', 'تم حدوث خطأ ما');
        }
        return view('front.message.index', compact('offer'));
    }
    
    public function store(Request $request, $offer_id){
        $rules = [
            'attachments.*' => ['mimes:jpeg,png,jpg,pdf,txt,docx', 'max:10000'],
        ];

        $messages = [
            'attachments.*.mimes' => 'نوع الملف (png, jpeg, jpg, pdf, txt, docx)'
        ];

        $validation = Validator::make($request->all(),$rules, $messages);

        if ($validation->fails()){
            return response()->json(['error' => $validation->messages()->first()]);
        }
        
        if(empty($request->content) && empty($request->attachments)){
             return response()->json(['error' => 'لا يمكنك ارسال رساله فارغه']);
        }
        
        $offer = OfferStatus::find($offer_id);
        
        if(is_object($offer)){
            if($offer->owner_id != Auth::user()->id && $offer->company_id != Auth::user()->id){
                return response()->json(['error' => 'تم حدوث خطأ ما']);
            }
            /* first time message */
            if($offer->communication_status == 0){
                if($offer->owner_id == Auth::user()->id){
                    $offer->fill([
                        'communication_status' => '1'
                    ])->save();
                }

                else{
                   return response()->json(['error' => 'Something Went Wrong']);
                }
            }
            if(!empty($offer->muted_user_id)){
                return response()->json(['error' => 'Something Went Wrong']); 
            }
            
            /* create message content */
            $msg_created = [];
            if(Auth::user()->permission == 3){
               $to_user = $offer->owner_id; 
            }
            if(Auth::user()->permission == 2){
               $to_user = $offer->company_id; 
            }
            if(!empty($request->attachments)){
                foreach($request->attachments as $key => $attach){
                    /* add new files */
                    $newname =  Auth::user()->id.'_'.$key.date("d_m_Y").rand(1, 1000).time().'_'.rand(1, 1000).'.'.$attach->getClientOriginalExtension();
                    $attach->move(public_path('upload/'.$offer->project_id), $newname); 
                    $input = [];
                    $input['name'] = $attach->getClientOriginalName();
                    $input['path'] = $offer->project_id.'/'.$newname;
                    $attach_res = Attachment::create($input);
                    $attachment[] = $attach_res->id;
     
                    $msg = Message::create([
                        'send_from' => Auth::user()->id,
                        'type' => '1',
                        'content' => $attach_res->id,
                        'offer_status_id' => $offer_id,
                        'to_user' => $to_user
                    ]);
                    $msg_created[] = $msg;
                    
//                    /* MessageNotification Creation */
//                    if(Auth::user()->permission == 3){
//                       $to_user = $offer->owner_id; 
//                    }
//                    if(Auth::user()->permission == 2){
//                       $to_user = $offer->company_id; 
//                    }
                    MessageNotification::create([
                        'message_id' => $msg->id,
                        'to_user' => $to_user
                    ]);
                }
            }
            
            if(!empty($request->content)){
                $msg = Message::create([
                    'send_from' => Auth::user()->id,
                    'type' => '0',
                    'content' => $request->content,
                    'offer_status_id' => $offer_id,
                    'to_user' => $to_user
                ]);  
                $msg_created[] = $msg;
                
                /* MessageNotification Creation */
                if(Auth::user()->permission == 3){
                   $to_user = $offer->owner_id; 
                }
                if(Auth::user()->permission == 2){
                   $to_user = $offer->company_id; 
                }
                MessageNotification::create([
                    'message_id' => $msg->id,
                    'to_user' => $to_user
                ]);
            }
            
            $data = Self::showCreatedMsg($msg_created);
            

            
            return response()->json([
                'success' => 'تم الارسال بنجاح',
                'data' => $data
            ]);
            

        }
        else{
            return  'لا يوجد عرض';
        }
        

    }
    
    
   public function showCreatedMsg($msg_created){
       
       $output = '';
       /* send from owner */
       if($msg_created[0]->messageFrom->permission == 2){
           foreach($msg_created as $message){
               if($message->type == '0'){               
                   $output .=  '<div class="panel panel-default message" style="width:70%; margin-right:0 !important; margin-bottom: 6px;background-color:#3578e5; border-radius: 40px; border: 1px solid #d1dfec;">
                        <div class="panel-body" style="color:#FFF !important">'.
                                $message->content. 
                            '<span class="time">'.$message->created_at->format("h:i a").'</span>
                        </div>
                    </div>';
               }
               else{
                   $output .=  '<div class="panel panel-default message" style="width:70%; margin-right:0 !important; margin-bottom: 6px;background-color:#FFF; border-radius: 40px; border: 1px solid #d1dfec;">
                    <div class="panel-body" style="color:blue !important"><a href="'.url('public/upload').'/'.$message->attachment->path.'" target="_blank">'.
                                $message->attachment->name.'</a>
                            <span class="time">'.$message->created_at->format("h:i a").'</span>
                        </div>
                    </div>';

               }
           }
       }
       
       /* send from company */
       if($msg_created[0]->messageFrom->permission == 3){
           foreach($msg_created as $message){
               if($message->type == '0'){               
                   $output .=  '<div class="panel panel-default message" style="width:70%; margin-right:auto !important; margin-bottom: 6px;background-color:#EEE; border-radius: 40px; border: 1px solid #d1dfec;">
                    <div class="panel-body" >'.
                                $message->content. 
                            '<span class="time">'.$message->created_at->format("h:i a").'</span>
                        </div>
                    </div>';

               }
               else{
                   $output .=  '<div class="panel panel-default message" style="width:70%; margin-right:auto !important; margin-bottom: 6px;background-color:#FFF;     border-radius: 40px; border: 1px solid #d1dfec; ">
                    <div class="panel-body" ><a href="'.url('public/upload').'/'.$message->attachment->path.'" target="_blank">'.
                                $message->attachment->name.'</a>
                            <span class="time">'.$message->created_at->format("h:i a").'</span>
                        </div>
                    </div>';

               }
           }
       }
       
       return $output;
   }
    
    
    public function checkMsgOtherSend($offer_id){
        $msg_notifications = MessageNotification::where([ ['to_user', Auth::user()->id], ['to_status', '0'] ])
                        ->whereHas('message', function ($query) use ($offer_id) {
                                    $query->where('offer_status_id', $offer_id);
                        })->get();

        if(!empty($msg_notifications[0])){
           $data = Self::showMsgOtherSend($msg_notifications);
            return response()->json([
                'success' => 'تم جلب البيانات بنجاح',
                'data' => $data
            ]);
        } 
    }
    
    
    
   public function showMsgOtherSend($msg_notifications){
       
       $output = '';
       /* send from owner */
       if($msg_notifications[0]->message->messageFrom->permission == 2){
           foreach($msg_notifications as $message){
               $message->fill(['to_status' => '1'])->save();
               if($message->message->type == '0'){               
                   $output .=  '<div class="panel panel-default message" style="width:70%; margin-right:0 !important; margin-bottom: 6px;background-color:#3578e5; border-radius: 40px; border: 1px solid #d1dfec;">
                        <div class="panel-body" style="color:#FFF !important">'.
                                $message->message->content. 
                            '<span class="time">'.$message->message->created_at->format("h:i a").'</span>
                        </div>
                    </div>';
               }
               else{
                   $output .=  '<div class="panel panel-default message" style="width:70%; margin-right:0 !important; margin-bottom: 6px;background-color:#FFF; border-radius: 40px; border: 1px solid #d1dfec;">
                    <div class="panel-body" style="color:blue !important"><a href="'.url('public/upload').'/'.$message->message->attachment->path.'" target="_blank">'.
                                $message->message->attachment->name.'</a>
                            <span class="time">'.$message->message->created_at->format("h:i a").'</span>
                        </div>
                    </div>';

               }
           }
       }
       
       /* send from company */
       if($msg_notifications[0]->message->messageFrom->permission == 3){
           foreach($msg_notifications as $message){
               $message->fill(['to_status' => '1'])->save();
               if($message->message->type == '0'){               
                   $output .=  '<div class="panel panel-default message" style="width:70%; margin-right:auto !important; margin-bottom: 6px;background-color:#EEE; border-radius: 40px; border: 1px solid #d1dfec;">
                    <div class="panel-body" >'.
                                $message->message->content. 
                            '<span class="time">'.$message->message->created_at->format("h:i a").'</span>
                        </div>
                    </div>';

               }
               else{
                   $output .=  '<div class="panel panel-default message" style="width:70%; margin-right:auto !important; margin-bottom: 6px;background-color:#FFF;     border-radius: 40px; border: 1px solid #d1dfec; ">
                    <div class="panel-body" ><a href="'.url('public/upload').'/'.$message->message->attachment->path.'" target="_blank">'.
                                $message->message->attachment->name.'</a>
                            <span class="time">'.$message->message->created_at->format("h:i a").'</span>
                        </div>
                    </div>';

               }
           }
       }
       
       return $output;
   }
    
    
    public function notification(){
        $i = 0;
        $output = '';
        $unseen_count = 0;
        foreach(messagesNotification() as $msg){
            if(isset($msg->offer->project->title)){
                if($msg->messageNotifications->to_user == Auth::user()->id && $msg->messageNotifications->to_status == '0'){
                    $unseen_count += 1; 
                }
            }
        }
        
        foreach(messagesNotification() as $msg){
            /* show 4 messages only */
            if($i < 4){
                $i++;
            }
            else{
                break;
            }

            $output .= '<li class="msg" style="position:relative">';
                    if(isset($msg->offer->project->title)){
                    $output .= '<a href="'.url('messages').'/'.$msg->offer->id.'#last-msg" style="font-size:16px; font-weight:bold; color:green; padding:0 20px">
                        <center style="padding-top:10px">'.$msg->offer->project->title.'</center><br>';
                        if($msg->type == '0'){
                          $output .=  '<span style="color:#75787d">'.$msg->content.'</span>';
                        }
                        else{
                          $output .= '<span style="color:#75787d">'.$msg->attachment->name.'</span>';
                        }
                        
                    if($msg->messageNotifications->to_user == Auth::user()->id && $msg->messageNotifications->to_status == '0'){
                    $output .= '<small>لم تتم القراءه</small>';
                    }
                    $output .= '<hr style="margin-bottom:0"></a>';

                    }
                $output .= '</li>';
        }
        $output .= '<li><a href="'.url('allmessages').'" style="font-size:16px; font-weight:bold; color:green; padding:20px 20px">عرض كافه الرسائل</a>
                    </li>';
 
        return response()->json([
            'success' => 'تم جلب البيانات بنجاح',
            'unseen' => $unseen_count,
            'data' => $output
        ]);
    }
    
    
    
    public function allmessages(){
        return view('front.message.allmessages');
    }
    
}











