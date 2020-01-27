@extends('admin.layout.master')

@section('header')
<style>


</style>
@endsection

@section('content')

@section('page_title')
قائمة المشاريع
@endsection

@section('active_title')
قائمة المشاريع
@endsection


<!-- Main content -->
<section class="content">

<div class="row dattable">
    <div class="col-xs-12">
                    <div class="panel panel-primary" style="margin-top:30px">
                <div class="panel-heading">{{$title}}</div>
                <div class="panel-body"> 
                    
        <div class="box">

            <!-- /.box-header -->
            <div class="box-body">
                <table id="users-table" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>رقم المشروع</th>
                            <th>عنوان المشروع</th>
                            <th>الحاله</th>
                            <th>الايام المتبقيه</th>
                            <th class="text-center">عرض الفاتورة</th>
                            <th class="text-center">تحميل الفاتورة</th>
                            <th class="text-center">ايصال دفع</th>
                            <th class="text-center">تعديل الحاله</th>
                        </tr>
                    </thead>
                    <tbody class="alluser">
                       @foreach ($invoices as $key => $invoice)
                            @if($invoice->status == '0')
                            <?php
                            $now = strval(date('y-m-d', time())); // or your date as well
                            $now = strtotime($now);
                            $your_date = strtotime($invoice->created_at->format('Y-m-d'). ' + 8 days');
                            $datediff = $your_date - $now;
                            $days_num = round($datediff / (60 * 60 * 24));
                            ?>
                            @endif
                        <tr class="">
                        <td class="text-center center-vc">{{$key+1}}</td>
                        <td class="text-center center-vc">{{$invoice->offer->project->id}}</td>
                        <td class="text-center center-vc">
                            <a href="{{url('admin/projects')}}?id={{$invoice->offer->project->id}}" target="_blank">
                                {{$invoice->offer->project->title}}
                            </a>
                        </td>
                        <td class="text-center center-vc">
                        @if($invoice->status == '0')

                            @if($days_num < 0)
                                <span style="color:red">لم يتم الدفع</span>
                            @else
                            <span>لم يتم الدفع</span>
                            @endif
                        @else
                            <span>تم الدفع</span>
                        @endif
                        </td>
                        <td class="text-center center-vc" style="direction:ltr">
                            @if($invoice->status == '0')
                            {{$days_num}}
                            @endif                                                   
                        </td>
                        <td class="text-center center-vc">
                            <a class="btn btn-success btn-sm " href="{{url('invoice').'/'.$invoice->id}}" target="_blank"><i class="fa fa-eye"></i></a> </td>

                       <td class="text-center center-vc"><a class="btn btn-success btn-sm " href="{{url('invoice').'/'.$invoice->id}}?action=download" target="_blank"><i class="fa fa-download"></i></a> </td>  
                            
                        <td class="text-center center-vc">
                        @if(isset($invoice->receipt->id))
                        <a class="btn btn-success btn-sm update_receipt_link" data-toggle="modal" data-target=".update_receipt_modal" data-href="{{url('admin/receipt/edit').'/'.$invoice->id}}" ><i class="fa fa-eye"></i></a> 
                        @else
                        <span>لايوجد</span> 
                        @endif
                        </td>
                            
                        <td class="text-center"  style="vertical-align: middle;"><a class="btn btn-success btn-sm update_invoice_link" data-toggle="modal" data-target=".update_invoice_modal" data-href="{{url('admin/invoice').'/'.$invoice->id.'/edit'}}"><i class="fa fa-edit"></i></a></td>
                        </tr>
                        @endforeach 
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>#</th>
                            <th>رقم المشروع</th>
                            <th>عنوان المشروع</th>
                            <th>الحاله</th>
                            <th>الايام المتبقيه</th>
                            <th class="text-center">عرض الفاتورة</th>
                            <th class="text-center">تحميل الفاتورة</th>
                            <th class="text-center">ايصال دفع</th>
                            <th class="text-center">تعديل الحاله</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
                        </div>
        </div>
        

    </div>
    <!-- /.col -->
</div>
</section>
<!-- /.content -->




@endsection

@section('footer')
<script src="{{url('public/design/adminlte')}}/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="{{url('public/design/adminlte')}}/plugins/datatables/dataTables.bootstrap.min.js"></script>
<script>
    $(function() {
        $('#users-table').DataTable({
            processing: true,
            serverSide: false,
            responsive: true,                                   
            
        });
    });
</script>
@endsection




<div class="modal fade update_invoice_modal">
    <div class="modal-dialog">
        <div class="modal-content">
           
               
            <div class="modal-header">
                <button type="button" class="close pull-right" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">بيانات الفاتورة</h4>
            </div>
            <div class="modal-body body-edit"></div>
          
           
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


<div class="modal fade update_receipt_modal">
    <div class="modal-dialog">
        <div class="modal-content">
           
               
            <div class="modal-header">
                <button type="button" class="close pull-right" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">بيانات الايصال</h4>
            </div>
            <div class="modal-body body-edit"></div>
          
           
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
