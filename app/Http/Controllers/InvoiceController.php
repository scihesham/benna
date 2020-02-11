<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Invoice;
use Auth;
use PDF;
use Illuminate\Support\Facades\Mail;
use App\Mail\InvoiceMail;


class InvoiceController extends Controller
{
    public function index(Request $request){       
         
        if(isset($request->action)){
           if(isset($request->invoice_id)){
                $invoices = Invoice::where('id', $request->invoice_id)->get();
           }
            else{
                $invoices = Invoice::where('status', '0')->get(); 
            }
        }
        else{
                $invoices = Invoice::where('status', '1')->get();             
        }        
           
        $title = 'قائمه الفواتير';            
        
        return view('admin.invoice.index', compact('invoices', 'title'));
    }
    
    
    
    public function edit(Request $request, $id)
    {
        if ($request->ajax()){
            $invoice = Invoice::findOrFail($id);
            return view('admin.invoice.edit', compact('invoice'));
        } else {
            return back();
        }
    }
    
    public function update(Request $request, $id)
    {
        $invoice = Invoice::find($id);
        $res = $invoice->fill($request->all())->save();
        if($res == true){
            if($invoice->status == 1){
//                dd($invoice->offer->company->email);
                $invoice_num = $invoice->id;
                $project_title = $invoice->offer->project->title;
                $invoice_val = $invoice->offer->milestones->sum('value') *  0.01;
                $invoice_link = url('invoice?invoice_id='.$invoice->id);
                
                Mail::to($invoice->offer->company->email)->send(new InvoiceMail($invoice_num, $project_title, $invoice_val, $invoice_link));
            }
            return redirect()->back()->with('success', 'تم تعديل الفاتورة بنجاح');
        }
        else{
           return redirect()->back()->with('error', 'Something Went Wrong'); 
        }
    }
    
    
    public function show(Request $request, $id){
        $invoice = Invoice::find($id);
        if(is_object($invoice)){
            $invoice_title = 'فاتورة'.$invoice->offer->project->title;
            $pdf = PDF::loadView('admin.invoice.pdf', compact('invoice'));
            if(isset($request->action)){
                return $pdf->download($invoice_title.' .pdf'); 
            }
            else
                return $pdf->stream($invoice_title.' .pdf'); 
        }
        else{
            return redirect()->back()->with('error', 'تم حدوث خطأ');
        }
    }
    
    
     public function editReceipt(Request $request, $invoice_id){
         if ($request->ajax()){
            $invoice = Invoice::find($invoice_id);
            return view('admin.receipt.editreceipt', compact('invoice')); 
         }
         else{
            return back(); 
         }
     }
    
    
    public function lastSeenInvoice(Request $request){
        $user = Auth::user();
        if(isset($request->last_overdate_invoice)){
            $user->last_seen_overdate_invoice  = $request->last_overdate_invoice;
        }
        else{
            $user->last_seen_invoice = $request->last_invoice;
            $user->last_seen_receipt = $request->last_receipt; 
        }

        $user->save();
        $data['status'] = 'success';
        return response()->json($data);
    }
    
    
   public function invoiceNotification(){
       
       $output = '';
       
        foreach(invoicesNotification() as $notification){
        if(isset($notification->transfer_time) && isset($notification->invoice_id)){
            if($notification->invoice->status == '0'){
                $output .= '<li class="receipt-content">';
                   $output .= '<a href="'.url('admin/invoice?action=not-paid&invoice_id='.$notification->invoice_id).'">';
                   $output .= '<h3 class="text-center title">ايصال </h3>';
                    $output .= '<h4 class="text-center">';
                      $output .=  '('.$notification->invoice->offer->project->title.')';
                    $output .= '</h4>';
                   $output .= '<div class="notification-content">';
                       $output .= '<div class="col-md-6 text-right" style="padding-left:0">';
                           $output .= '<h4>رقم المشروع :</h4>';
                           $output .= '<span>'.$notification->invoice->offer->project->id.'</span>';
                        $output .= '</div>';
                        $output .= '<div class="col-md-6 text-right">';
                           $output .= '<h4>البنك :</h4>';
                           $output .= '<span>'.$notification->bank.'</span>';
                       $output .= '</div>';

                       $output .= '<div class="col-md-6 text-right" style="padding-left:0">';
                           $output .= '<h4>المحول :</h4>';
                           $output .= '<span>'.$notification->transfer_name.'</span>';
                        $output .= '</div>';
                        $output .= '<div class="col-md-6 text-right">';
                          $output .=  '<h4>المبلغ :</h4>';
                           $output .= '<span>'.$notification->money.'</span>';
                       $output .= '</div>';
                    $output .= '</div>';
                    $output .= '</a>';
                $output .= '</li>';
            }
        }
            // overdate invoices 
        elseif((isset($notification->days_num)) && (isset($notification->invoice_type) && $notification->invoice_type == 'overdate_invoices' )){
            $output .= '<li id="" class="msg overdate-invoice" style="position:relative">';
               $output .=  '<a href="'.url('admin/invoice?action=not-paid&invoice_id='.$notification->id).'" style="font-size:16px; font-weight:bold; color:green; padding:0 20px">';
                   $output .=  '<center style="padding-top:10px">';
                       $output .=  '<span style="color:red">فاتورة </span><br>';
                        $output .= '('.$notification->offer->project->title.')';
                    $output .= '</center><br>';
                    $output .= '<span style="color:#75787d;display:inline-block;text-align:right;margin-top: 11px;">';
                       $output .=  'برجاء العلم ان هذه الفاتورة قد انتهى';
                        $output .= '<br>';

                        $output .= 'ميعاد استحقاقها منذ';
                      $output .= '<span style="color:#f70c0c"> ('.(-1 * $notification->days_num).') </span> ';
                       $output .=  'ايام';
                    $output .= '</span>';
                    $output .= '<div class="overdate-invoice-content">';
                        $output .= '<div class="col-md-6 text-left" style="padding-left:0;">';
                           $output .=  '<h4>رقم المشروع :</h4>';
                           $output .=  '<span>'.$notification->offer->project->id.'</span>';
                       $output .=  '</div>';
                        $output .= '<div class="col-md-6 text-right" style="padding-right:0">';
                           $output .=  '<h4>المبلغ :</h4>';
                            $output .= '<span>'.($notification->offer->milestones->sum('value') *  0.01).'</span>';
                        $output .= '</div>';
                    $output .= '</div>';
                    $output .= '<hr style="margin-bottom:0; margin-top:10px;">';
                $output .= '</a>';
           $output .=  '</li>';
        }
        else{
        $output .= '<li class="invoice-content">';
           $output .= '<a href="'.url('admin/invoice?action=not-paid&invoice_id='.$notification->id).'">';
            $output .= '<h3 class="text-center title">فاتورة </h3>';
            $output .= '<h4 class="text-center">';
               $output .= '('.$notification->offer->project->title.')';
            $output .= '</h4>';
           $output .= '<div class="notification-content">';
               $output .= '<div class="col-md-6 text-right" style="padding-left:0">';
                   $output .= '<h4>رقم المشروع :</h4>';
                   $output .= '<span>'.$notification->offer->project->id.'</span>';
                $output .= '</div>';
                $output .= '<div class="col-md-6 text-right">';
                   $output .= '<h4>المبلغ :</h4>';
                   $output .= '<span>'.$notification->offer->milestones->sum('value') *  0.01.'</span>';
                $output .= '</div>';
            $output .= '</div>';
        $output .= '</li>';
        $output .= '</a>';
        }
        $output .= '<hr>';
        }
           
       $last_receipt = last_receipt_notconfirmed();
       
        if(isset(\App\Invoice::latest()->first()->id)){
            $last_invoice = Invoice::where('status', '0')->latest()->first()->id;
        }
        else{
           $last_invoice = 0; 
        }
       
                    

       return response()->json([
            'success' => 'تم جلب البيانات بنجاح',
            'last_invoice' => $last_invoice,
            'last_receipt' => $last_receipt,
            'data' => $output
        ]);
       
   }
    
    
    
   public function overdateInvoiceNotification(){
       
       $output = '';
       
        foreach(admin_overdateInvoices() as $notification){

            // overdate invoices 

            $output .= '<li id="" class="msg overdate-invoice" style="position:relative">';
               $output .=  '<a href="'.url('admin/invoice?action=not-paid&invoice_id='.$notification->id).'" style="font-size:16px; font-weight:bold; color:green; padding:0 20px">';
                   $output .=  '<center style="padding-top:10px">';
                       $output .=  '<span style="color:red">فاتورة </span><br>';
                        $output .= '('.$notification->offer->project->title.')';
                    $output .= '</center><br>';
                    $output .= '<span style="color:#75787d;display:inline-block;text-align:right;margin-top: 11px;">';
                       $output .=  'برجاء العلم ان هذه الفاتورة قد انتهى';
                        $output .= '<br>';

                        $output .= 'ميعاد استحقاقها منذ';
                      $output .= '<span style="color:#f70c0c"> ('.(-1 * $notification->days_num).') </span> ';
                       $output .=  'ايام';
                    $output .= '</span>';
                    $output .= '<div class="overdate-invoice-content">';
                        $output .= '<div class="col-md-6 text-left" style="padding-left:0;">';
                           $output .=  '<h4>رقم المشروع :</h4>';
                           $output .=  '<span>'.$notification->offer->project->id.'</span>';
                       $output .=  '</div>';
                        $output .= '<div class="col-md-6 text-right" style="padding-right:0">';
                           $output .=  '<h4>المبلغ :</h4>';
                            $output .= '<span>'.($notification->offer->milestones->sum('value') *  0.01).'</span>';
                        $output .= '</div>';
                    $output .= '</div>';
                    $output .= '<hr style="margin-bottom:0; margin-top:10px;">';
                $output .= '</a>';
           $output .=  '</li>';
        
        }
           
       
       $last_overdate_invoice = last_overdateInvoices_general();
                    

       return response()->json([
            'success' => 'تم جلب البيانات بنجاح',
            'last_overdate_invoice' => $last_overdate_invoice,
            'data' => $output
        ]);
       
   }
    
    
}




