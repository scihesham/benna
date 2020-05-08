@extends('admin.layout.master')

@section('header')
<style>


</style>
@endsection

@section('content')

@section('page_title')
قائمة المدن
@endsection

@section('active_title')
قائمة المدن
@endsection

<!-- Main content -->
<section class="content">
    <div style="width:99%; text-align:left; margin-top:10px">
        <a href="" class="btn btn-primary margin-bottom" data-toggle="modal" data-target=".create_city_modal"><i class="fa fa-plus"></i> إضافة مدينه</a>
    </div>

    <div class="row dattable">
        <div class="col-xs-12">
            <div class="panel panel-primary">
                <div class="panel-heading">قائمة المدن</div>
                <div class="panel-body">

                    <div class="box">

                        <!-- /.box-header -->
                        <div class="box-body fit">
                            <table id="users-table" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>المدينه</th>
                                        <th>الترتيب</th>
                                        <th>التاريخ</th>
                                        <th class="text-center">تعديل</th>
                                        <th class="text-center">حذف</th>
                                    </tr>
                                </thead>
                                <tbody class="alluser">
                                    @foreach ($cities as $key => $city)
                                    <tr class="">
                                        <td class="center-vc">{{$key+1}}</td>
                                        <td class="center-vc text-center">
                                            {{ $city->name }}
                                        </td>
                                        <td class="center-vc text-center">
                                            {{ $city->ordering }}
                                        </td>
                                        <td class="center-vc text-center">
                                            {{ $city->created_at->format('Y-m-d') }}
                                        </td>

                                        <td class="text-center center-vc"><a class="btn btn-primary btn-sm update_city_link" data-toggle="modal" data-target=".update_city_modal" data-href="{{url('admin/cities').'/'.$city->id.'/edit'}}"><i class="fa fa-edit"></i></a></td>
                                        <td class="text-center" style="vertical-align: middle;">
                                            <a class="btn btn-danger btn-sm" href="{{url('admin/cities').'/'.$city->id.'/delete'}}" onclick='return myfuncAr()'><i class="fa fa-trash-o"></i></a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>#</th>
                                        <th>المدينه</th>
                                        <th>الترتيب</th>
                                        <th>التاريخ</th>
                                        <th class="text-center">تعديل</th>
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
            "order": [
                [2, "asc"]
            ],

        });
    });

</script>

@endsection

<div class="modal fade create_city_modal">
    <div class="modal-dialog">
        <div class="modal-content" style="width:700px">
            <form method="post" action="{{url('admin/cities')}}">

                <div class="modal-header">
                    <button type="button" class="close pull-right" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">إضافة مدينه</h4>
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
                                    <label>المدينه </label>
                                    <input type="text" name="name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" value="{{old('name')}}" required>
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
                    <button type="submit" class="btn btn-primary pull-left">إضافة مدينه</button>
                </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


<div class="modal fade update_city_modal" id="">
    <div class="modal-dialog">
        <div class="modal-content" style="width:700px">


            <div class="modal-header">
                <button type="button" class="close pull-right" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">تعديل المدينه</h4>
            </div>
            <div class="modal-body body-edit"></div>


        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
