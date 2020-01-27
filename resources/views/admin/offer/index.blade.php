@extends('admin.layout.master')

@section('header')
<style>
    .yea{margin-top: 35px; margin-bottom: 25px}
    .yea:last-child{display: none}
</style>
@endsection

@section('content')

@section('page_title')
قائمة العروض
@endsection

@section('active_title')
قائمة العروض
@endsection


<!-- Main content -->
<section class="content">

<div class="row dattable">
    <div class="col-xs-12">
                    <div class="panel panel-primary" style="margin-top:30px">
                <div class="panel-heading">قائمة العروض</div>
                <div class="panel-body"> 
                    
        <div class="box">

            <!-- /.box-header -->
            <div class="box-body">
                <table id="users-table" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>الشركة المقدمه للعرض</th>
                            <th>تفاصيل العرض</th>
                            <th>حاله الاتصال</th>
                            <th>المرفقات</th>
                            <th>مراحل التنفيذ</th>
                            <th>الرسائل</th>
                            <th class="text-center">عرض</th>
                            <th class="text-center">حذف</th>
                        </tr>
                    </thead>
                    <tbody class="alluser">
                       @foreach ($project->offers as $key => $offer)
                        <tr class="">
                            <td>{{$key+1}}</td>
                            @if(isset($offer->company->id))
                            <td class="text-center center-vc"><a class="update_user_link" data-toggle="modal" data-target=".update_user_modal" data-href="{{url('admin/users').'/'.$offer->company->id.'/edit'}}" style="cursor:pointer">{{$offer->company->name}}</a></td>
                            @else
                            <td class="text-center center-vc">بيانات العضو لم تعد مسجله لدينا</td>
                            @endif   
                            <td style="width:300px;" class="text-center">
                                <textarea style="height:115px; width:95%;">{{$offer->offer->desc}}</textarea>
                            </td>     
                            @if($offer->communication_status == 0)
                            <td class="text-center center-vc">لم يتم الرد بعد</td>
                            @elseif($offer->communication_status == 1)
                            <td class="text-center center-vc">تم التواصل</td>
                            @elseif($offer->communication_status == 2)
                            <td class="text-center center-vc">تم عمل حجب للاتصال من قبل {{$offer->user->name}}</td>
                            @endif
                            <td class="text-center center-vc">
                                @if(isset($offer->offer->attachment_id))
                                    @foreach(json_decode($offer->offer->attachment_id) as $val)
                                        @if(isset(\App\Attachment::find($val)->path))
                                        <a href="{{url('public/upload')}}/{{\App\Attachment::find($val)->path}}" target="_blank">
                                             {{\App\Attachment::find($val)->name}} <br>
                                        </a> 
                                        @endif
                                    @endforeach
                                @endif
                            </td>   
                            
                            <td class="text-center"  style="vertical-align: middle;">
                                <a class="btn btn-success btn-sm show_offer_milestone_link" data-toggle="modal" data-target=".show_offer_milestone_modal" data-href="{{url('admin/milestone').'/'.$offer->id}}"><i class="fa fa-eye"></i></a>
                            </td>
                            
                            <td class="text-center"  style="vertical-align: middle;">
                                <a class="btn btn-success btn-sm show_message_link" data-toggle="modal" data-target=".show_message_modal" data-href="{{url('admin/messages').'/'.$offer->id}}"><i class="fa fa-eye"></i></a>
                            </td>
                            
                            <td class="text-center"  style="vertical-align: middle;">
                                <a class="btn btn-success btn-sm show_offer_link" data-toggle="modal" data-target=".show_offer_modal" data-href="{{url('admin/offer').'/'.$offer->id}}"><i class="fa fa-eye"></i></a>
                            </td>
                            
                            <td class="text-center" style="vertical-align: middle;">
                                <a class="btn btn-danger btn-sm" href="{{url('admin/offer').'/'.$offer->id.'/delete'}}" onclick='return myfunc()'><i class="fa fa-trash-o"></i></a>
                            </td>
                        </tr>
                        @endforeach  
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>#</th>
                            <th>الشركة المقدمه للعرض</th>
                            <th>تفاصيل العرض</th>
                            <th>حاله الاتصال</th>
                            <th>المرفقات</th>
                            <th>مراحل التنفيذ</th>
                            <th>الرسائل</th>
                            <th class="text-center">عرض</th>
                            <th class="text-center">حذف</th>
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



<div class="modal fade show_offer_modal">
    <div class="modal-dialog">
        <div class="modal-content">
           
               
            <div class="modal-header">
                <button type="button" class="close pull-right" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">بيانات العرض</h4>
            </div>
            <div class="modal-body body-edit"></div>
          
           
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->



<div class="modal fade update_user_modal">
    <div class="modal-dialog">
        <div class="modal-content">
           
               
            <div class="modal-header">
                <button type="button" class="close pull-right" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">بيانات العضو</h4>
            </div>
            <div class="modal-body body-edit"></div>
          
           
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


<div class="modal fade show_message_modal">
    <div class="modal-dialog">
        <div class="modal-content">
           
               
            <div class="modal-header">
                <button type="button" class="close pull-right" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">عرض الرسائل</h4>
            </div>
            <div class="modal-body body-edit" style="max-height: 80%; overflow-y: auto;"></div>
          
           
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


<div class="modal fade show_offer_milestone_modal">
    <div class="modal-dialog">
        <div class="modal-content">
           
               
            <div class="modal-header">
                <button type="button" class="close pull-right" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">مراحل التنفيذ</h4>
            </div>
            <div class="modal-body body-edit" style="max-height: 80%; overflow-y: auto;"></div>
          
           
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
