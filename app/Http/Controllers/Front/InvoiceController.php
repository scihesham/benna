<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Invoice;
use App\Receipt;
use App\Attachment;
use Auth;
use PDF;
use File;
use Illuminate\Support\Facades\Validator;


class InvoiceController extends Controller
{
    public function index(Request $request){
 
        $user_id = Auth::user()->id;
        if(isset($request->invoice_id)){
            $invoices = Invoice::where('id', $request->invoice_id)->
                        whereHas('offer', function ($query) use ($user_id) {
                                $query->where('company_id', $user_id);
                        })->get();
        }
        else{
            $invoices = Invoice::whereHas('offer', function ($query) use ($user_id) {
                        $query->where('company_id', $user_id);
                   })->get();
        }
          
        $title = 'قائمه الفواتير';            
        
        return view('front.invoice.index', compact('invoices', 'title'));
    }
    
    
    
    public function show(Request $request, $id){
        $invoice = Invoice::find($id);
        if(is_object($invoice)){
            $invoice_title = 'فاتورة'.$invoice->offer->project->title;
            $pdf = PDF::loadView('front.invoice.pdf', compact('invoice'));
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
    
    
    public function showReceipt($invoice_id){
        return view('front.receipt.showreceipt', compact('invoice_id'));
    }
    
    
  public function storeReceipt(Request $request, $invoice_id){
            
        $rules = [
            'money' => ['required', 'numeric'],
            'bank' => ['required', 'string'],
            'transfer_time' => ['required', 'string'],
            'transfer_name' => ['required', 'string'],
            'attachment' => ['required', 'mimes:jpeg,png,jpg', 'max:2048'],
        ];

        $validation = Validator::make($request->all(),$rules);

        if ($validation->fails()){
            return redirect()->back()->with('error', $validation->messages()->first());
        }
      
      
      /* add photo */
      $invoice = Invoice::find($invoice_id);
      $attach = $request->attachment;
      $newname =  date("d_m_Y").rand(1, 1000).time().'_'.$attach->getClientOriginalName();
      $attach->move(public_path('upload/'.$invoice->offer->project->id), $newname); 
      $input = [];
      $input['name'] = $attach->getClientOriginalName();
      $input['path'] = $invoice->offer->project->id.'/'.$newname;
      $attach_res = Attachment::create($input);
      
      $request['invoice_id'] = $invoice_id;
      $request['attachment_id'] = $attach_res->id;
      
      $res = Receipt::create($request->all());
      
      if(is_object($res)){
          return redirect('invoices')->with('success', 'تم الانشاء بنجاح'); 
      }
      else{
          return redirect()->back()->with('error', 'تم حدوث خطأ'); 
      }
  }
    
 public function editReceipt($invoice_id){
    $invoice = Invoice::find($invoice_id);
    return view('front.receipt.editreceipt', compact('invoice')); 
 }
    
  public function updateReceipt(Request $request, $invoice_id){
            
        $rules = [
            'money' => ['required', 'numeric'],
            'bank' => ['required', 'string'],
            'transfer_time' => ['required', 'string'],
            'attachment' => ['nullable', 'mimes:jpeg,png,jpg', 'max:2048'],
        ];

        $validation = Validator::make($request->all(),$rules);

        if ($validation->fails()){
            return redirect()->back()->with('error', $validation->messages()->first());
        }
      
      $invoice = Invoice::find($invoice_id);
      
        /* remove old file */
        if(!empty($request->attachment)){
            
              /* add new file */
              $attach = $request->attachment;
              $newname =  Auth::user()->id.'_'.date("d_m_Y").rand(1, 1000).time().'_'.rand(1, 1000).'.'.$attach->getClientOriginalExtension();
              $attach->move(public_path('upload/'.$invoice->offer->project->id), $newname); 
            
              /* delete old file */
              $attachment = Attachment::find($invoice->receipt->attachment_id);
              $path = public_path('upload/').$attachment->path;  
              if(File::exists($path)) {
                    File::delete($path);
              }
            
              /* edit attachment database */
              $invoice->receipt->attachment->fill([
                     'name' => $attach->getClientOriginalName(),
                     'path' => $invoice->offer->project->id.'/'.$newname
              ])->save();
        }
      
      $res = $invoice->receipt->fill($request->all())->save();
      
      if($res == true){
          return redirect('invoices')->with('success', 'تم التعديل بنجاح'); 
      }
      else{
          return redirect()->back()->with('error', 'تم حدوث خطأ'); 
      }
  }
    
    
    
  public function overdateInvoiceSeen(Request $request){
        $invoice = Invoice::find($request->invoice_id);
        $res = $invoice->fill([
            'seen_overdate_invoice' => 1
        ])->save();
        $overdate_invoice_count = count(overdateInvoicesUnseen());
        if($res == true){
            $data['id'] = $request->invoice_id;
            $data['status'] = 'success';
            $data['overdate_invoice_count'] = $overdate_invoice_count;
            return response()->json($data);
        }
        else{
            $data['status'] = 'error';
            return response()->json($data);
        }
  }
    
    
}
