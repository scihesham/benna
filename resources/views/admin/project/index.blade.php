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
                            <th>عنوان المشروع</th>
                            <th>المدينه</th>
                            <th>تفاصيل المشروع</th>
                            <th>صاحب المشروع</th>
                            <th>الشركه المنفذه للمشروع</th>
                            <th>المرفقات</th>
                            <th>العروض</th>
                            <th class="text-center">عرض</th>
                            <th class="text-center">حذف</th>
                        </tr>
                    </thead>
                    <tbody class="alluser">
                       @foreach ($projects as $key => $project)
                        <tr class="">
                            <td>{{$key+1}}</td>
                            <td class="text-center center-vc">{{$project->title}}</td>
                            <td class="text-center center-vc">{{ksaCities()[$project->city]}}</td>
                            <td style="width:300px;" class="text-center"><textarea style="height:115px; width:95%;">{{$project->desc}}</textarea></td>
                            
                            
                            @if(isset($project->owner->id))
                            <td class="text-center center-vc"><a class="update_user_link" data-toggle="modal" data-target=".update_user_modal" data-href="{{url('admin/users').'/'.$project->owner->id.'/edit'}}" style="cursor:pointer">{{$project->owner->name}}</a></td>
                            @else
                            <td>بيانات العضو لم تعد مسجله لدينا</td>
                            @endif
                            
                            @if(isset($project->company->id))
                            <td class="text-center center-vc"><a class="update_user_link" data-toggle="modal" data-target=".update_user_modal" data-href="{{url('admin/users').'/'.$project->company->id.'/edit'}}" style="cursor:pointer">{{$project->company->name}}</a></td>
                            @elseif(!empty($project->company_id))
                            <td>بيانات العضو لم تعد مسجله لدينا</td>
                            @else
                            <td class="text-center center-vc">لا يوجد حتى الان</td>
                            @endif
                            
                            <td class="text-center center-vc">
                                @if(isset($project->attachment_id))
                                    @foreach(json_decode($project->attachment_id) as $val)
                                        @if(isset(\App\Attachment::find($val)->path))
                                        <a href="{{url('public/upload')}}/{{\App\Attachment::find($val)->path}}" target="_blank">
                                             {{\App\Attachment::find($val)->name}} <br>
                                        </a> 
                                        @endif
                                    @endforeach
                                @endif
                            </td>
                            
                            <td class="text-center center-vc"><a  href="{{url('admin/offers').'/'.$project->id}}" class="btn btn-success btn-sm"><i class="fa fa-eye"></i></a></td>
                            
                            <td class="text-center"  style="vertical-align: middle;"><a class="btn btn-success btn-sm update_project_link" data-toggle="modal" data-target=".update_project_modal" data-href="{{url('admin/projects').'/'.$project->id}}"><i class="fa fa-eye"></i></a></td>
                            
                            <td class="text-center" style="vertical-align: middle;">
                                <a class="btn btn-danger btn-sm" href="{{url('admin/projects').'/'.$project->id.'/delete'}}" onclick='return myfunc()'><i class="fa fa-trash-o"></i></a>
                            </td>
                        </tr>
                        @endforeach  
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>#</th>
                            <th>عنوان المشروع</th>
                            <th>المدينه</th>
                            <th>تفاصيل المشروع</th>
                            <th>صاحب المشروع</th>
                            <th>الشركه المنفذه للمشروع</th>
                            <th>المرفقات</th>
                            <th>العروض</th>
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
