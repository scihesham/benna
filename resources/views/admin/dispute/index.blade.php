@extends('admin.layout.master')

@section('header')
<style>


</style>
@endsection

@section('content')

@section('page_title')
قائمة النزاعات
@endsection

@section('active_title')
قائمة النزاعات
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
                            <th>عنوان المشروع</th>
                            <th>مقدم التذكره</th>
                            <th>الخصم</th>
                            <th>ملاحظات</th>
                            <th>التفاصيل</th>
                            <th class="text-center">تعديل</th>
                        </tr>
                    </thead>
                    <tbody class="alluser">
                        @foreach ($disputes as $key => $dispute)
                        <tr>
                        <td>{{$key+1}}</td>
                        <td class="text-center center-vc"><a href="{{url('admin/projects')}}?id={{$dispute->milestone->offer->project->id}}" target="_blank">{{$dispute->milestone->offer->project->title}}</a></td>
                      
                        @if(isset($dispute->fromUser->id))
                        <td class="text-center center-vc"><a class="update_user_link" data-toggle="modal" data-target=".update_user_modal" data-href="{{url('admin/users').'/'.$dispute->fromUser->id.'/edit'}}" style="cursor:pointer">{{$dispute->fromUser->name}}</a></td>
                        @else
                        <td class="text-center center-vc">بيانات العضو لم تعد مسجله لدينا</td>
                        @endif 
                        @if(isset($dispute->opponentUser->id))
                        <td class="text-center center-vc"><a class="update_user_link" data-toggle="modal" data-target=".update_user_modal" data-href="{{url('admin/users').'/'.$dispute->opponentUser->id.'/edit'}}" style="cursor:pointer">{{$dispute->opponentUser->name}}</a></td>
                        @else
                        <td class="text-center center-vc">بيانات العضو لم تعد مسجله لدينا</td>
                        @endif 

                        <td style="width:300px;" class="text-center"><textarea style="height:115px; width:95%;">{{$dispute->milestone->notes}}</textarea></td>
                        <td class="text-center"  style="vertical-align: middle;">
                            <a class="btn btn-success btn-sm" href="{{url('admin/messages/disputes').'/'.$dispute->id}}" target="_blank" ><i class="fa fa-eye"></i></a>
                        </td>
                        <td class="text-center"  style="vertical-align: middle;">
                            <a class="btn btn-success btn-sm update_dispute_link" data-toggle="modal" data-target=".update_dispute_modal" data-href="{{url('admin/project/offer/disputes').'/'.$dispute->id}}"><i class="fa fa-eye"></i></a>
                        </td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>#</th>
                            <th>عنوان المشروع</th>
                            <th>مقدم التذكره</th>
                            <th>الخصم</th>
                            <th>ملاحظات</th>
                            <th>التفاصيل</th>
                            <th class="text-center">تعديل</th>
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


<div class="modal fade update_dispute_modal">
    <div class="modal-dialog">
        <div class="modal-content">
           
               
            <div class="modal-header">
                <button type="button" class="close pull-right" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">النزاعات</h4>
            </div>
            <div class="modal-body body-edit"></div>
          
           
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


<div class="modal fade update_project_modal">
    <div class="modal-dialog">
        <div class="modal-content">
           
               
            <div class="modal-header">
                <button type="button" class="close pull-right" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">عرض المشروع</h4>
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
