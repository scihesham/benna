<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\OfferRequest;
use App\OfferStatus;
use App\Offer;
use App\Project;
use App\User;
use App\Invoice;
use App\Milestone;
use App\Attachment;
use Illuminate\Support\Facades\Auth;
use Redirect;
use File;

class OfferStatusController extends Controller
{
    
    public function create(Request $request, $id){
        $project = Project::find($id);
        if(Auth::user()){
            /* check if the company make an offer for this project */
            $offer = OfferStatus::where([['project_id', $id], ['company_id', Auth::user()->id]])->first();
        }
        else{
            $offer = '';
        }

        /* views page counter */
        if(!($request->session()->has('project'.$project->id))){
            $request->session()->put('project'.$project->id, 'new view');
            $project->fill([
               'view_num' =>  $project->view_num + 1
            ])->save();
        }
        
        if(is_object($offer)){
            return view('front.offer.edit', compact('offer'));
        }
        else{
            return view('front.offer.create', compact('project'));
        }  
    }
    
    public function store(OfferRequest $request, $project_id){
        
        if(!(Auth::user()->permission == 3)){
            return redirect()->back()->with('error','عفوا, انك لاتمتلك هذه الصلاحيه');
        }
        
        $res = Project::find($project_id);
        
        if(is_object($res)){
            
            if($res->status > 0){
                return redirect()->back()->with('error','عفوا, تم اسناد المشروع الى شركه');
            }
            
            $offer_status = OfferStatus::create([
                'owner_id' => $res->owner_id,
                'company_id' => Auth::user()->id,
                'project_id' => $res->id
            ]);
            
            $attachment_id = null;
                
            if(!empty($request->attachments)){
                foreach($request->attachments as $key => $attach){
                    /* add new files */
                    $newname =  Auth::user()->id.'_'.$key.date("d_m_Y").rand(1, 1000).time().'_'.rand(1, 1000).'.'.$attach->getClientOriginalExtension();
                    $attach->move(public_path('upload/'.$res->id), $newname); 
                    $input = [];
                    $input['name'] = $attach->getClientOriginalName();
                    $input['path'] = $res->id.'/'.$newname;
                    $attach_res = Attachment::create($input);
                    $attachment[] = $attach_res->id;
                }
                $attachment_id =  json_encode($attachment);         
            }
            
            $offer = Offer::create([
                'attachment_id' => $attachment_id,
                'desc' => $request->desc,
                'offer_status_id' => $offer_status->id
            ]);
            
            foreach($request->milestones as $key => $milestone)
            $milestone = Milestone::create([
                'desc' => $milestone,
                'value' => $request->values[$key],
                'offer_status_id' => $offer_status->id
            ]);
            
            return redirect()->back()->with('success', 'تم تقديم العرض بنجاح, يمكنك التعديل فى هذا العرض حتى يتم اسناده الى شركه');
        }
        else{
            return redirect()->back()->with('error', 'تم حدوث خطأ');
        }
        
    }
    
    public function update(OfferRequest $request, $offer_id){
//        dd($request->all());
                
        $res = OfferStatus::find($offer_id);
                
        if(is_object($res)){
            
            if($res->project->status > 0){
                return redirect()->back()->with('error','عفوا, تم اسناد المشروع الى شركه');
            }
            
            if(Auth::user()->id != $res->company_id){
                return redirect()->back()->with('error','عفوا, انك لاتمتلك هذه الصلاحيه');
            }

            if(empty($res->offer->attachment_id)){
                $attachment_id = null;
            }
            else{
                $attachment_id = $res->offer->attachment_id;
            }
                
            if(!empty($request->attachments)){
                foreach($request->attachments as $key => $attach){
                    /* add new files */
                    $newname =  Auth::user()->id.'_'.$key.date("d_m_Y").rand(1, 1000).time().'_'.rand(1, 1000).'.'.$attach->getClientOriginalExtension();
                    $attach->move(public_path('upload/'.$res->id), $newname); 
                    $input = [];
                    $input['name'] = $attach->getClientOriginalName();
                    $input['path'] = $res->id.'/'.$newname;
                    $attach_res = Attachment::create($input);
                    $attachment[] = $attach_res->id;
                }
                
                /* attachment in the database */
                $attachment_old = json_decode($res->offer->attachment_id);
                if(!empty($attachment_old)){
                   $attachment_id = json_encode(array_merge($attachment_old, $attachment)); 
                }
                else{
                    $attachment_id = json_encode($attachment);
                }
            }
            $offer = $res->offer;
            $offer->fill([
                'attachment_id' => $attachment_id,
                'desc' => $request->desc
            ])->save();
            $res->milestones()->delete();
            foreach($request->milestones as $key => $milestone)
            $milestone = Milestone::create([
                'desc' => $milestone,
                'value' => $request->values[$key],
                'offer_status_id' => $res->id
            ]);
            
            return redirect()->back()->with('success', 'تم تعديل العرض بنجاح, يمكنك التعديل فى هذا العرض حتى يتم اسناده الى شركه');
        }
        else{
            return redirect()->back()->with('error', 'تم حدوث خطأ');
        }
    }
    
    
    
    public function awardProject($offer_id){
        $offer = OfferStatus::find($offer_id);
        if(is_object($offer)){
            if($offer->project->status > 0){
                return redirect()->back()->with('error', 'عفوا تم اسناد المشروع الى شركه من قبل');
            }
            if($offer->project->owner_id == Auth::user()->id){
//                if(Auth::user()->balance >= $offer->milestones->sum('value')){
                    
                    $owner = User::find(Auth::user()->id);
                    $owner->balance = Auth::user()->balance - $offer->milestones->sum('value');
                    $owner->save();
                    
                    $offer->project->fill([
                        'status' => 1,
                        'company_id' => $offer->company_id,
                        'awardoffer' => $offer_id
                    ])->save();
                
                    $offer->fill([
                        'communication_status' => '1'
                    ])->save();
                
                    /* ليس مشروع خيرى */
                   if($offer->project->category != 5){ 
                        Invoice::create([
                             'offer_status_id' => $offer->id,
                             'company_id' => $offer->company_id,
                        ]);
                   }
                    
                 return redirect()->back()->with('success', 'تمت الموافقه على العرض بنجاح');
//                }  
//                else{
//                   return redirect()->back()->with('error', 'عفوا رصيدكم الحالى هو'.' '.Auth::user()->balance.' ريال سعودى'); 
//                }
            }
            else{
               return redirect()->back()->with('error', 'تم حدوث خطأ'); 
            }
        }
        else{
           return redirect()->back()->with('error', 'تم حدوث خطأ'); 
        }
        
    }
    
    
   public function offerNotification(){
       if(isset(OfferStatus::where('owner_id', Auth::user()->id)->latest()->first()->id)){
            $offer_id = OfferStatus::where('owner_id', Auth::user()->id)->latest()->first()->id;
            $last_offer_id = $offer_id;
       }
       else
           $last_offer_id = 0;
       
       $offers = OfferStatus::where('owner_id', Auth::user()->id)->orderBy('id', 'desc')->limit(4)->get();
       $evaluation_notification_notseen_count = count(evaluationNotification_not_seen());
       $output = '';
       foreach(offerNotification() as $notification){
           
        // for evaluations 
        if(isset($notification->rating_to_owner)){
            $output .= '<li class="msg" style="position:relative">';
               $output .=  '<a href="'.url('messages').'/'.$notification->project->awardOffer->id.'" style="font-size:16px; font-weight:bold; color:green; padding:0 20px">';
                    $output .= '<center style="padding-top:10px;color:#000">';
                        $output .= '<span style="color:#000">';
                           $output .=  ' قام '; 
                            $output .= $notification->project->owner->name;
                          $output .=  ' بتقيييمك في ';
                        $output .= '</span><br>';
                        $output .= '('.$notification->project->title.')';
                    $output .= '</center><br>';
                    $output .= '<span style="color:#75787d">';
                        $output .= $notification->project->desc;
                    $output .= '</span>';

                    $output .= '<div class="overdate-invoice-content">';
                        $output .= '<div class="col-md-6 text-right" style="padding-right:0">';
                            $output .= '<h4 style="display:inline-block">رقم المشروع :</h4>';
                            $output .= '<span>'.$notification->project->id.'</span>';
                        $output .= '</div>';
                       $output .= ' <div class="col-md-6 text-left" style="padding-left:0">';
                            $output .= '<h4 style="display:inline-block">المبلغ :</h4>';
                           $output .= ' <span>'.$notification->project->awardOffer->milestones->sum('value').'</span>';
                        $output .= '</div>';
                    $output .= '</div>';

                   $output .= ' <hr style="margin-bottom:0; margin-top:75px;">';
                $output .= '</a>';
            $output .= '</li>';
          }
          else{
               $output .= '<li class="msg" style="position:relative"><a href="'.url('projects').'/'.$notification->project->id.'/#offer'.$notification->id.'" style="font-size:16px; font-weight:bold; color:green; padding:0 20px"><center style="padding-top:10px">'.$notification->company->name.'</center><br><span style="color:#75787d">عرض جديد على مشروع '.$notification->project->title.'</span><small style="color: green">'.$notification->created_at->format('Y-m-d').'</small><small style="color: green; direction:ltr" class="hours">'.$notification->created_at->format('h:i a').'</small>
                <hr style="margin-bottom:0; margin-top:30px;"></a></li>';
          }
       }
       $output .= '<li><a href="'.url('#').'" style="font-size:16px; font-weight:bold; color:green; padding:20px 20px">كافه العروض</a></li>';
       
        return response()->json([
            'success' => 'تم جلب البيانات بنجاح',
            'last_offer_id' => $last_offer_id,
            'evaluation_notification_notseen_count' => $evaluation_notification_notseen_count,
            'data' => $output
        ]);
       
   }
    
    
    public function myOffers(){
        $offers = OfferStatus::where('company_id', Auth::user()->id)->orderBy('id', 'desc')->get();
        $offers = OfferStatus::where('company_id', Auth::user()->id)
                    ->whereHas('project', function ($query) {
                        $query->where('status', '0');
                   })->get();
        return view('front.offer.myoffer', compact('offers'));
    }
    
    public function offerSeen(Request $request){
        $project = Project::find($request->project_id);
        $res = $project->fill([
            'award_offer_seen' => 1
        ])->save();
        $offers_count = awardProjects()->count();
        
        
        if($res == true){
            $data['id'] = $request->project_id;
            $data['status'] = 'success';
            $data['offers_count'] = $offers_count;
            return response()->json($data);
        }
        else{
            $data['status'] = 'error';
            return response()->json($data);
        }
    }
    
}



