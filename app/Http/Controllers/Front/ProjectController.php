<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Requests\ProjectRequest;
use App\Http\Controllers\Controller;
use App\Project;
use App\Invoice;
use App\Attachment;
use Illuminate\Support\Facades\Auth;
use Redirect;
use File;

class ProjectController extends Controller
{

     public function index(Request $request){
         
        /* company */ 
        if(Auth::user()->permission == 3){
            if(isset($request->project) && ( ($request->project == 'under') || ($request->project == 'done') )){

                if($request->project == 'under'){
                    $projects = Project::where([['company_id', Auth::user()->id], ['status', '1']])->orderBy('id', 'desc')->get();
                    $title = 'قائمه المشاريع تحت التنفيذ';
                }

                if($request->project == 'done'){
                    $projects = Project::where([['company_id', Auth::user()->id], ['status', '2']])->orderBy('id', 'desc')->get();
                    $title = 'قائمه المشاريع المنفذه';
                }
            }

            else{
               $projects = Project::where([['company_id', Auth::user()->id], ['status', '0']])->orderBy('id', 'desc')->get(); 
               $title = 'قائمه المشاريع غير المنفذه';
            } 
            return view('front.project.index', compact('projects', 'title'));            
        }
         
        /* owner */
        if(isset($request->project) && ( ($request->project == 'under') || ($request->project == 'done') )){

            if($request->project == 'under'){
                $projects = Project::where([['owner_id', Auth::user()->id], ['status', '1']])->orderBy('id', 'desc')->get();
                $title = 'قائمه المشاريع تحت التنفيذ';
            }

            if($request->project == 'done'){
                $projects = Project::where([['owner_id', Auth::user()->id], ['status', '2']])->orderBy('id', 'desc')->get();
                $title = 'قائمه المشاريع المنفذه';
            }
        }
        
        else{
           $projects = Project::where([['owner_id', Auth::user()->id], ['status', '0']])->orderBy('id', 'desc')->get(); 
           $title = 'قائمه المشاريع غير المنفذه';
        } 
        return view('front.project.index', compact('projects', 'title'));
    }
    
    
    public function create(){
       return view('front.project.add'); 
    }
    
    public function store(ProjectRequest $request){
        
        $request['owner_id'] = Auth::user()->id;
        $res = Project::create($request->all());
        
        if(is_object($res)){
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
                $res->fill(['attachment_id' => json_encode($attachment)])->save();
            }
            return redirect('projects')->with('success', 'تم انشاء المشروع بنجاح');
        }
        else{
            return redirect('projects')->with('error', 'تم حدوث خطأ');
        }
            
    }
    
    
    public function show($id){
        $project = Project::find($id);
        
        if($project->owner_id != Auth::user()->id){
            return redirect()->back()->with('error', 'تم حدوث خطأ');
        }
        
        return view('front.project.show', compact('project'));
    }
    
    
    public function destroy($id){
        $project = Project::find($id);
        
        if($project->owner_id != Auth::user()->id){
            return redirect()->back()->with('error', 'Something Went Wrong');
        }
        
        if($project->status  != 0){
            return redirect()->back()->with('error', 'عفوا لايمكنك حذف هذا المشروع');
        }
        
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
    
   
    public function search(Request $request){
        
        if(!$request->session()->has('project_filters')){
            $array = ['city' => '', 'status' => ''];
            /* create new session */
            $request->session()->put('project_filters', $array);
        }
        $array = $request->session()->get('project_filters');
        $array['status'] = 0;
        $request->session()->put('project_filters', $array);
        if(empty($request->session()->get('project_filters')['city']) && $request->session()->get('project_filters')['city'] != 0){
            $city_num = '';
        }
        else{
            $city_num = $request->session()->get('project_filters')['city'];
        }
        
//        $filters[] = ['status', '0'];
        $filter_status = false;
        
        if(isset($request->keyword)){
          $filter_status = true;
        }
        
        if(isset($request->city) && $request->city != 'all'){
           $filter_status = true;
           $city_num = (int)$request->city;
           $array['city'] = $city_num;
           $request->session()->put('project_filters', $array);
//           $filters[] = ['city', $city_num];
        }
        if($request->city == 'all'){
            $city_num = '';
            $array['city'] = $city_num;
            $request->session()->put('project_filters', $array);
        }
//        dd($request->session()->get('project_filters'));
        foreach($request->session()->get('project_filters') as $key => $val){
            if(!empty($val)){
               $filters[] = [$key, $val]; 
            }
            if($val == '0'){
               $filters[] = [$key, $val];  
            }
        }
        if($filter_status){
            if(isset($request->keyword) && !empty($request->keyword)){
             $projects = Project::where($filters)
                        ->where(function($query) use ($request) {
                            return $query->where('title', 'LIKE', '%'.$request->keyword.'%')
                                ->orWhere('desc', 'LIKE', '%'.$request->keyword.'%');
                        })
                        ->get();

            }
            else{
               $projects = Project::where($filters)->get(); 
            }
        }
        else{
           $projects = Project::where($filters)->get();
        }
        
        $title = 'المشاريع الجديده';
        return view('front.project.search', compact('projects', 'title', 'city_num'));
    }
    
    
   public function projectNotification(){
       $last_pro_id = 0;
       $pro = Project::where('status', '0')->latest()->first();
       if(is_object($pro)){
          $last_pro_id = $pro->id; 
       }
       
        if(isset(Invoice::where('status', 1)
                 ->whereHas('offer', function ($query) {
                    $query->where('company_id',  Auth::user()->id);
           })->latest()->first()->id)){
            
              $last_invoice_id = Invoice::where('status', 1)
                    ->whereHas('offer', function ($query) {
                        $query->where('company_id',  Auth::user()->id);
               })->latest()->first()->id;
        }
        else{
           $last_invoice_id = 0; 
        }
       
        if(isset(Invoice::where('status', 0)
                 ->whereHas('offer', function ($query) {
                    $query->where('company_id',  Auth::user()->id);
           })->latest()->first()->id)){
            
              $last_notpaid_invoice_id = Invoice::where('status', 0)
                ->whereHas('offer', function ($query) {
                    $query->where('company_id',  Auth::user()->id);
               })->latest()->first()->id;
        }
        else{
           $last_notpaid_invoice_id = 0; 
        }
       $overdate_invoice_count = count(overdateInvoices());
       $end_projects_notseen_count = count(endProjects_not_seen());
       $evaluation_notification_notseen_count = count(evaluationNotification_not_seen());
                                
       $output = '';
       $offers_count = awardProjects()->count();   
       
       foreach(awardProjects() as $project){
           $output .= '<li id="award'.$project->id.'" class="msg awardoffer" style="position:relative"><a href="'.url('offer/project').'/'.$project->id.'" style="font-size:16px; font-weight:bold; color:green; padding:0 20px"><center style="padding-top:10px"><span style="color:red">تهانينا تم اختيارك لتنفيذ </span><br>('.$project->title.')</span></center><br><span style="color:#75787d">'.$project->desc.'</span><a class="btn btn-success  seen-offer"     data_projectid="'.$project->id.'" onclick="return seenOffer('.$project->id.')">شكرا تمت الرؤيه</a>
            <hr style="margin-bottom:0; margin-top:10px;"></a></li>';
       }      
       
       
        // overdate invoices 
        foreach(overdateInvoices() as $invoice){
            $output .= '<li id="overdate-invoice'.$invoice->id.'" class="msg overdate-invoice" style="position:relative">';
               $output .= '<a href="'.url('invoice?invoice_id='.$invoice->id).'" style="font-size:16px; font-weight:bold; color:green; padding:0 20px">';
                   $output .= '<center style="padding-top:10px">';
                        $output .= '<span style="color:red">فاتورة </span><br>';
                        $output .= '('.$invoice->offer->project->title.')';
                   $output .= '</center><br>';
                    $output .= '<span style="color:#75787d">';
                      $output .=   'برجاء العلم ان هذه الفاتورة قد انتهى';
                       $output .=  '<br>';

                       $output .=  '&nbsp; ميعاد استحقاقها منذ ';
                        $output .= '<span style="color:#f70c0c"> ('. -1 * $invoice->days_num .') </span>';
                      $output .=  '  ايام ';
                    $output .= '</span>';
                    $output .= '<div class="overdate-invoice-content">';
                        $output .= '<div class="col-md-6 text-right" style="padding-right:0">';
                           $output .=  '<h4>رقم المشروع :</h4>';
                           $output .=  '<span>'.$invoice->offer->project->id.'</span>';
                       $output .=  '</div>';
                        $output .=  '<div class="col-md-6 text-left" style="padding-left:0">';
                           $output .=  '<h4>المبلغ :</h4>';
                           $output .=  '<span>'.$invoice->offer->milestones->sum('value') *  0.01.'</span>';
                        $output .= '</div>';
                   $output .=  '</div>';
                    $output .= '<a class="btn btn-success seen-overdate-invoice" onclick="return seenOverdateInvoice('.$invoice->id.')" style="">شكرا تمت الرؤيه</a>';
                   $output .=  '<hr style="margin-bottom:0; margin-top:10px;">';
                $output .= '</a>';
            $output .= '</li>';
        }
                                            
       
    foreach(invoices_projects() as $notification){
    // for end projects 
    if((isset($notification->type) && $notification->type == 'end project')){
       $output .= ' <li class="msg" style="position:relative">';
           $output .=  '<a href="'.url('messages').'/'.$notification->awardOffer->id.'" style="font-size:16px; font-weight:bold; color:green; padding:0 20px">';
               $output .=  '<center style="padding-top:10px;color:red">';
                  $output .=   '<span style="color:red">تهانينا تم انهاء مشروع </span><br>';
                   $output .= '('.$notification->title.')';
                $output .=  '</center><br>';
                $output .= '<span style="color:#75787d">';
                  $output .=   $notification->desc;
                $output .= '</span>';

               $output .=  '<div class="overdate-invoice-content">';
                   $output .=  '<div class="col-md-6 text-right" style="padding-right:0">';
                      $output .=   '<h4 style="display:inline-block">رقم المشروع :</h4>';
                       $output .=  '<span>'.$notification->id.'</span>';
                    $output .= '</div>';
                   $output .= '<div class="col-md-6 text-left" style="padding-left:0">';
                      $output .=   '<h4 style="display:inline-block">المبلغ :</h4>';
                       $output .=  '<span>'.$notification->awardOffer->milestones->sum('value').'</span>';
                    $output .= '</div>';
               $output .=  '</div>';

                $output .= '<hr style="margin-bottom:0; margin-top:75px;">';
            $output .= '</a>';
        $output .= '</li>';
         }
        
        // for evaluations 
        else if(isset($notification->rating_to_company)){
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
        // for projects 
        else if(isset($notification->city) && isset($notification->owner_id)){
           $output .= '<li class="msg" style="position:relative">';
              $output .=  '<a href="'.url('offer/project').'/'.$notification->id.'" style="font-size:16px; font-weight:bold; color:green; padding:0 20px">';
                  $output .=  '<center style="padding-top:10px">'.$notification->title.'</center><br>';
                   $output .= '<span style="color:#75787d">'.$notification->desc.'</span>';
                   $output .= '<small style="color: green">'.$notification->created_at->format('Y-m-d').'</small>';
                   $output .= '<small style="color: green; direction:ltr" class="hours">'.$notification->created_at->format('h:i a').'</small>';
                   $output .= '<hr style="margin-bottom:0; margin-top:30px;">';
               $output .= '</a>';
            $output .= '</li>';
        }
        else{
            // for invoices
            // not paid invoices
            if($notification->status == '0'){
              $output .=  '<li class="invoice-content">';
                 $output .=   '<a href="'.url('invoice?invoice_id='.$notification->id).'" style="padding:0">';
                   $output .= '<h2 class="text-center title">فاتورة </h2>';
                   $output .= '<h3 class="text-center" style="display:block; margin-top:-6px">';
                      $output .=  '('.$notification->offer->project->title.')';
                   $output .= '</h3>';
                   $output .= '<div class="notification-content">';
                      $output .=  '<div class="col-md-6 text-right" style="padding-left:0">';
                          $output .=  '<h4>رقم المشروع :</h4>';
                           $output .= '<span>'.$notification->offer->project->id.'</span>';
                       $output .= '</div>';
                       $output .= '<div class="col-md-6 text-left">';
                          $output .=  '<h4>المبلغ :</h4>';
                           $output .= '<span>'.$notification->offer->milestones->sum('value') *  0.01.'</span>';
                        $output .= '</div>';
                   $output .= '</div>';
                      $output .=  '<hr style="margin-bottom:0; margin-top:68px;">';
                   $output .= '</a>';
                $output .= '</li>';
            }
            /* for paid invoices */
            else{
                   $output .=  '<li class="invoice-content">';
                      $output .=   '<a href="'.url('invoice?invoice_id='.$notification->id).'" style="padding:0">';
                       $output .=  '<h2 class="text-center title">فاتورة </h2>';
                        $output .=  '<h3 class="text-center" style="display:block; margin-top:-6px">';
                           $output .=  '('.$notification->offer->project->title.')';
                        $output .= '</h3>';
                        $output .= '<div class="notification-content">';
                            $output .= '<div class="col-md-12 text-right" style="padding-left:0">';
                               $output .=  '<span>';
                                  $output .=   'يسرنا ان نحيطكم علما انه تم تغيير';
                               $output .=  '</span>';
                                $output .= '<span style="display:block; margin-top: -5px; margin-bottom: 10px;">';   
                                   $output .=  'حاله الفاتورة الى مدفوع';
                                $output .= '</span>';
                            $output .= '</div>';
                            $output .= '<div class="col-md-6 text-right" style="padding-left:0">';
                                $output .= '<h4>رقم المشروع :</h4>';
                                $output .= '<span>'.$notification->offer->project->id.'</span>';
                            $output .= '</div>';
                            $output .= '<div class="col-md-6 text-left">';
                                $output .= '<h4>المبلغ :</h4>';
                                $output .= '<span>'.($notification->offer->milestones->sum('value') *  0.01).'</span>';
                            $output .= '</div>';
                        $output .= '</div>';
                            $output .= '<hr style="margin-bottom:0; margin-top:145px;">';
                       $output .=  '</a>';
                    $output .= '</li>';
            } /* end else for paid invoices */
        }
    }
       $output .= '<li><a href="'.url('search/projects').'" style="font-size:16px; font-weight:bold; color:green; padding:20px 20px">عرض كافه المشاريع</a></li>';
       
        return response()->json([
            'success' => 'تم جلب البيانات بنجاح',
            'last_pro_id' => $last_pro_id,
            'last_invoice_id' => $last_invoice_id,
            'last_notpaid_invoice_id' => $last_notpaid_invoice_id,
            'offers_count' => $offers_count,
            'overdate_invoice_count' => $overdate_invoice_count,
            'end_projects_notseen_count' => $end_projects_notseen_count,
            'evaluation_notification_notseen_count' => $evaluation_notification_notseen_count,
            'data' => $output
        ]);
       
   }
    
    public function confirmdone($project_id){
        $project = Project::find($project_id);
        if(is_object($project) && $project->status == 1 && ($project->owner_id == Auth::user()->id) ){
            $project->status = 2;
            $project->project_end_at = date('Y-m-d', time());
            $project->save();
            return redirect()->back()->with('success', 'تم تعديل حاله المشروع بنجاح');
        }
        else{
           return redirect()->back()->with('error', 'Something Went Wrong'); 
        }
    }
    
    
    public function lastSeenProject(Request $request){
        $offers_count = awardProjects()->count();
        $overdate_invoice_count = count(overdateInvoices());
        
        /* for end projects seen */
        $projects = endProjects_not_seen();
        foreach($projects as $val){
            $val->project_end_at_seen = 1;
            $val->save();
        }
        /**/
        
        /* for evaluations */
        $evaluations = evaluationNotification_not_seen();
        foreach($evaluations as $val){
            $val->company_seen = 1;
            $val->save();
        }
        /**/
        
        $user = Auth::user();
        $user->last_seen_project = $request->last_project_id;
        $user->last_seen_invoice = $request->last_invoice_id;
        $user->last_seen_notpaid_invoice = $request->last_notpaid_invoice_id;
        $user->save();
        $data['status'] = 'success';
        $data['offers_count'] = $offers_count;
        $data['overdate_invoice_count'] = $overdate_invoice_count;
        return response()->json($data);
    }
    
    
    public function lastSeenOffer(Request $request){
        $user = Auth::user();
        $user->last_seen_offer = $request->last_offer_id;
        $user->save();
        
        /* for evaluations */
        $evaluations = evaluationNotification_not_seen();
        foreach($evaluations as $val){
            $val->owner_seen = 1;
            $val->save();
        }
        /**/
        
        $data['status'] = 'success';
        return response()->json($data);
    }
    
    
}











