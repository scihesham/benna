<?php

function target(){
    $array = ['admin', 'manager', '/', '/'];
    
    if(Auth::user()->permission == 0){
        return $array[0];
    }

    if(Auth::user()->permission == 1){
        return $array[1];
    }
    
    if(Auth::user()->permission == 2){
        return $array[2];
    }
    
    if(Auth::user()->permission == 3){
        return $array[3];
    }
        
}


function permissions(){
    $array = [
              'مدير الموقع',
              'مشرف',
              'صاحب مشروع',
              'شركه'
             ];
    // Admin => 0, User => 1
    return $array;
}

function freelancerType($user){
    if($user->type == 0) return 'شخصي';
    if($user->type == 1) return 'شركه';
    if($user->type == 2) return 'مؤسسه';
}

//function ksaCities(){
//    $array = [
//                'الرياض',
//                'جدة',
//                'مكّة المكرمة',
//                'الدمام',
//                'المدينة المنوّرة',
//                'الظهران',
//                'الجبيل',
//                'الخبر',
//                'القصيم',
//                'الطائف',
//                'الاحساء',
//                'عسير',
//                'جازان',
//                'نجران',
//                'تبوك',
//                'المنطقة الشمالية'
//             ];
//    return $array;
//}


function messagesNotification(){
    
    $user_id = Auth::user()->id;
    $messages = collect(\App\Message::whereRaw("id IN (select max(`id`) from messages where to_user=$user_id or send_from=$user_id GROUP BY offer_status_id)")->orderBy('id', 'desc')->limit(15)->get());
        
    $dispute = collect(\App\DisputeMessage::orderBy('id', 'desc')->limit(15)->get());
    $all_messages = $dispute->merge($messages)->sortByDesc('created_at');
 
    return $all_messages;   
}

function awardProjects(){
    $projects = \App\Project::where([['company_id', Auth::user()->id], ['status', 1]])->get();
    foreach($projects as $project){
       $project['type'] = 'award project';
    }
    return $projects; 
}

function awardProjects_not_seen(){
    $projects = \App\Project::where([['company_id', Auth::user()->id], ['status', 1], ['award_offer_seen', '0']])->get();
    return $projects; 
}

/* to show the projects  that ends */
function endProjects(){
    $projects = \App\Project::where([['company_id', Auth::user()->id],  ['status', 2]])->orderBy('project_end_at', 'desc')->limit(15)->get();
    
    foreach($projects as $project){
       $project['type'] = 'end project';
       $project['created_at'] = $project->project_end_at;
    }
    return $projects;
}

/* to count the projects  that ends and not seen */
function endProjects_not_seen(){
    $projects = \App\Project::where([['company_id', Auth::user()->id],  ['status', 2], ['project_end_at_seen', 0]])->orderBy('project_end_at', 'desc')->limit(15)->get();

    return $projects;
}

function evaluationNotification(){
    $user_type = 'company_id';
    $rating_type = 'rating_to_company';
    $time_type = 'rating_to_company_time';
    if(Auth::user()->permission == 2){
      $user_type = 'owner_id';
      $rating_type = 'rating_to_owner';  
      $time_type = 'rating_to_owner_time';
    }
    
     $evaluations = App\Evaluation::where([[$rating_type, '!=', '']])
         ->whereHas('project', function ($query) use($user_type) {
             $query->where($user_type, Auth::user()->id);
         })->orderBy($time_type, 'desc')->limit(10)->get(); 
    
    foreach($evaluations as $evaluation){
        $evaluation['created_at'] = $evaluation->$time_type;
    }
    return $evaluations;
}


function evaluationNotification_not_seen(){
    $user_type = 'company_id';
    $rating_type = 'rating_to_company';
    $time_type = 'rating_to_company_time';
    $seen_type = 'company_seen';
    if(Auth::user()->permission == 2){
      $user_type = 'owner_id';
      $rating_type = 'rating_to_owner';  
      $time_type = 'rating_to_owner_time';
      $seen_type = 'owner_seen';
    }
    
     $evaluations = App\Evaluation::where([[$rating_type, '!=', ''], [$seen_type, 0]])
         ->whereHas('project', function ($query) use($user_type) {
             $query->where($user_type, Auth::user()->id);
         })->orderBy($time_type, 'desc')->limit(10)->get(); 
    
    foreach($evaluations as $evaluation){
        $evaluation['created_at'] = $evaluation->$time_type;
    }
    return $evaluations;
}



function overdateInvoices(){
    $res = [];
    $invoices = \App\Invoice::where([['status', 0]])
                ->whereHas('offer', function ($query) {
                    $query->where('company_id',  Auth::user()->id);
               })->orderBy('id', 'desc')->get();
    
    $now = strval(date('y-m-d', time())); // or your date as well
    $now = strtotime($now);
    
    foreach($invoices as $key => $invoice){
        $your_date = strtotime($invoice->created_at->format('Y-m-d'). ' + 8 days');
        $datediff = $your_date - $now;
        $days_num = round($datediff / (60 * 60 * 24));
        if($days_num < 0){
           $invoice['days_num'] = $days_num;
           $res[] =  $invoice;
        }
    }
    
    return $res;
}


function overdateInvoicesUnseen(){    
    $res = [];
    $invoices = \App\Invoice::where([['status', 0], ['seen_overdate_invoice', 0]])
                ->whereHas('offer', function ($query) {
                    $query->where('company_id',  Auth::user()->id);
               })->orderBy('id', 'desc')->get();
    
    $now = strval(date('y-m-d', time())); // or your date as well
    $now = strtotime($now);
    
    foreach($invoices as $key => $invoice){
        $your_date = strtotime($invoice->created_at->format('Y-m-d'). ' + 8 days');
        $datediff = $your_date - $now;
        $days_num = round($datediff / (60 * 60 * 24));
        if($days_num < 0){
           $invoice['days_num'] = $days_num;
           $res[] =  $invoice;
        }
    }
    
    return $res;
}

function last_overdateInvoices_general(){
    $res_id = 0;
    $invoices = \App\Invoice::where('status', 0)->orderBy('id', 'desc')->get();
    
    $now = strval(date('y-m-d', time())); // or your date as well
    $now = strtotime($now);
    
    foreach($invoices as $key => $invoice){
        $your_date = strtotime($invoice->created_at->format('Y-m-d'). ' + 8 days');
        $datediff = $your_date - $now;
        $days_num = round($datediff / (60 * 60 * 24));
        if($days_num < 0){
            $res_id =  $invoice->id;
            break;
        }
    }
    
    return $res_id;    
}

function user_invoices(){
        $invoices = collect(\App\Invoice::whereHas('offer', function ($query) {
                    $query->where('company_id',  Auth::user()->id);
               })->orderBy('id', 'desc')->limit(15)->get()
            );

    
    $all_notifications = $invoices->merge(overdateInvoices())->sortByDesc('created_at');
    
    return $all_notifications;
}
/* freelancer invoices & projects notification */
function invoices_projects(){
    $projects = collect(\App\Project::where('status', '0')->orderBy('id', 'desc')->limit(15)->get());
//    $invoices = collect(\App\Invoice::whereHas('offer', function ($query) {
//                    $query->where('company_id',  Auth::user()->id);
//               })->orderBy('id', 'desc')->limit(10)->get()
//            );
    $end_projects = collect(endProjects());
    
    $rating = collect(evaluationNotification());
    
//    $all_notifications = $projects->merge($end_projects)->merge($invoices)->merge($rating)->sortByDesc('created_at');
    
    $all_notifications = $projects->merge($end_projects)->merge(awardProjects())->merge($rating)->sortByDesc('created_at');

    return $all_notifications;
}


/* owner offer notification */
function offerNotification(){
   $offer =  collect(\App\OfferStatus::where('owner_id', Auth::user()->id)->orderBy('id', 'desc')->limit(10)->get()); 
    
   $rating = collect(evaluationNotification());
    
   $all_notifications = $rating->merge($offer)->sortByDesc('created_at');
    
   return $all_notifications;
}


function admin_overdateInvoices(){
    $res = [];
    $invoices = \App\Invoice::where([['status', 0]])
                ->orderBy('id', 'desc')->get();
    
    $now = strval(date('y-m-d', time())); 
    $now = strtotime($now);
    
    foreach($invoices as $key => $invoice){
        $your_date = strtotime($invoice->created_at->format('Y-m-d'). ' + 8 days');
        $datediff = $your_date - $now;
        $days_num = round($datediff / (60 * 60 * 24));
        if($days_num < 0){
           $invoice['days_num'] = $days_num;
           $invoice['created_at'] = $your_date;
           $invoice['invoice_type'] = 'overdate_invoices';
           $res[] =  $invoice;
        }
    }
    
    return $res;
}
    
/* admin invoices notification */
function invoicesNotification(){
    $receipt = collect(\App\Receipt::orderBy('id', 'desc')->limit(15)->get());  
    $invoice = collect(\App\Invoice::where('status', '0')->orderBy('id', 'desc')->limit(15)->get());
//    $overdateInvoices = collect(admin_overdateInvoices());
//    $all_invoices = $receipt->merge($overdateInvoices)->merge($invoice)->sortByDesc('created_at');
    $all_invoices = $receipt->merge($invoice)->sortByDesc('created_at');
 
    return $all_invoices;   
}

function last_receipt_notconfirmed(){
    $receipts = \App\Receipt::orderBy('id', 'desc')->get();
    $receipt_id = 0;
    foreach($receipts as $receipt){
        if($receipt->invoice->status == '0'){
            $receipt_id = $receipt->id;
             break;
        }
    }
    return $receipt_id;
}

function projectCategories(){
    $array = [
       '0' => 'البناء والتشييد',
       '1' => 'التشطيب الداخلي والخارجي',
       '2' => 'التخطيط الهندسي والمعماري والتصميم',
       '3' =>'التخطيط والتصميم الداخلي والخارجي والديكور',
       '4' => 'الاعمال الكهربائية والمكانيكية',
       '5' => 'مشاريع البناء الخيرية والأوقاف',
       '7' => 'المقاولات الصناعية',
       '6' => 'مشاريع غير مصنفة'
    ]; 
    
    return $array;
}

function banks(){
     $array = [
         'مصرف الراجحي',
         'بنك البلاد'
    ]; 
    
    return $array;   
}

?>