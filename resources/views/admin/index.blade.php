@extends('admin.layout.master')

@section('content')

@section('page_title')
    لوحة التحكم
@endsection

<div class="container-fluid" style="margin-top: 20px">
    <div class="row justify-content-center">
        <div class="col-md-3 col-sm-6 col-xs-12 pull-left">
            <div class="info-box">
                <span class="info-box-icon bg-aqua"><i class="fa fa-building-o" aria-hidden="true"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">عدد المشاريع</span>
                    <span class="info-box-number">{{\App\Project::all()->count()}}</span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12 pull-left">
            <div class="info-box">
                <span class="info-box-icon bg-aqua"><i class="fa fa-users" aria-hidden="true"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">عدد الاعضاء</span>
                    <span class="info-box-number">{{\App\User::all()->count()}}</span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>        
    </div>
</div>
@endsection
