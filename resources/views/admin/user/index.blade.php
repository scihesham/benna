@extends('admin.layout.master')

@section('header')
<style>


</style>
@endsection

@section('content')

@section('page_title')
قائمة الاعضاء
@endsection

@section('active_title')
قائمة الاعضاء
@endsection


<!-- Main content -->
<section class="content">

<div style="width:99%; text-align:left; margin-top:10px">
    <a href="" class="btn btn-primary margin-bottom" data-toggle="modal" data-target=".create_user_modal"><i class="fa fa-plus"></i> إضافة مدير جديد</a>
</div>
<div class="row dattable">
    <div class="col-xs-12">
                    <div class="panel panel-primary">
                <div class="panel-heading">قائمة الاعضاء</div>
                <div class="panel-body"> 
                    
        <div class="box">

            <!-- /.box-header -->
            <div class="box-body">
                <table id="users-table" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>الاسم</th>
                            <th>البريد الالكترونى</th>
                            <th>الصلاحيه</th>
                            <th class="text-center">تعديل</th>
                            <th class="text-center">الاجراءات</th>
                        </tr>
                    </thead>
                    <tbody class="alluser">
                       @foreach ($users as $key => $user)
                        <tr class="">
                            <td>{{$key+1}}</td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>
                                @if($user->permission == 3)
                                ({{freelancerType($user)}})
                                @else
                                {{permissions()[$user->permission]}} &nbsp;
                                @endif
 
                            </td>
                            @if($user->permission == 0 || $user->permission == 1)
                            <td class="text-center"><a class="btn btn-primary btn-sm update_user_link" data-toggle="modal" data-target=".update_user_modal" data-href="{{url('admin/users').'/'.$user->id.'/edit'}}"><i class="fa fa-edit"></i></a></td>
                            @else
                            <td class="text-center"><a class="btn btn-primary btn-sm" href="{{url('admin/user').'/'.$user->id.'/edit'}}"><i class="fa fa-edit"></i></a></td>
                            @endif
                            
                            <td class="text-center" style="vertical-align: middle;">
                                @if($user->id != Auth::user()->id)
                                    @if($user->status == 1)
                                    <a class="btn btn-danger btn-sm" href="{{url('admin/users').'/'.$user->id.'/active_status'}}" onclick='return confirmAr()' style="padding: 5px 16px; margin-left:4px">
                                    حظر &nbsp;
                                    <i class="fa fa-ban"></i>
                                    </a>
                                    @else
                                    <a class="btn btn-success btn-sm" href="{{url('admin/users').'/'.$user->id.'/active_status'}}" style="padding: 5px 16px; margin-left:4px" onclick='return confirmAr()'>
                                    تفعيل &nbsp;
                                    <i class="fa fa-check"></i>
                                    </a>
                                    @endif
                                <a href="{{url('admin/users'.'/'.$user->id.'/delete')}}" style="padding: 5px 16px" class="btn btn-danger btn-sm" onclick='return confirmAr()'>
                                   حذف
                                <i class="fa fa-close"></i>   
                                </a>
                                @endif
                            </td>
                        </tr>
                        @endforeach  
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>#</th>
                            <th>الاسم</th>
                            <th>البريد الالكترونى</th>
                            <th>الصلاحيه</th>
                            <th class="text-center">تعديل</th>
                            <th class="text-center">الاجراءات</th>
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



<div class="modal fade create_user_modal" >
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="post" action="{{url('admin/users')}}">

            <div class="modal-header">
                <button type="button" class="close pull-right" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">إضافة عضو</h4>
            </div>
            <div class="modal-body">
<!--
                <div class="panel panel-default">
                    <div class="panel-body">
-->
                        @include('admin.partials.create')
                        
                            {{ csrf_field() }}
                            <div class="modal-body">
                                <div class="panel panel-default">
                                    <div class="panel-body">
                                        <div class="form-group">
                                            <label>اسم العضو </label>
                                            <input type="text" name="name" id='art_name' placeholder="اسم العضو" class="form-control" value="{{ old('name') }}" required>
                                        </div>
                                        <div class="form-group">
                                            <label>البريد الالكترونى </label>
                                            <input type="text" name="email" id='art_name' placeholder="البريد الالكترونى" class="form-control" value="{{ old('email') }}" required>
                                        </div>
                                        <div class="form-group">
                                            <label>الصلاحيه *</label>
                                            <select name="permission" class="select" id='art_name'  required>
                                                <option value="">...</option>
                                                @foreach(permissions() as $key => $val)
                                                    @if($key == 0)
                                                    <option value="{{$key}}">{{$val}}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>الرقم السري </label>
                                            <input type="password" name="password" id='art_name' placeholder="الرقم السري" class="form-control" autocomplete="new-password" required>
                                        </div>
                                        <div class="form-group">
                                            <label>تأكيد الرقم السري </label>
                                            <input type="password" name="password_confirmation" id='art_name' placeholder="تأكيد الرقم السري" class="form-control" autocomplete="new-password" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        
<!--
                    </div>
                </div>
-->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-right" data-dismiss="modal">غلق</button>
<!--                <button type="button" class="btn btn-primary create_application_button pull-left">إضافة عضو</button>-->
                <button type="submit" class="btn btn-primary pull-left">إضافة عضو</button>
            </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


<div class="modal fade update_user_modal" id="update_user_modal">
    <div class="modal-dialog">
        <div class="modal-content">
           
               
            <div class="modal-header">
                <button type="button" class="close pull-right" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">تعديل العضو</h4>
            </div>
            <div class="modal-body body-edit"></div>
          
           
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
