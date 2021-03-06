@extends('front.layout.master')

@section('title')
{{$project->title}}
@endsection

@section('header')
<style>
    .form-group {
        margin-bottom: 15px
    }

    .cont-center {
        width: 80%;
        margin: 0 auto
    }

    .well-sm {
        border-radius: 10px
    }


    .panel-default {
        border: none
    }

    .panel-body {
        border: 1px solid #a1d45e !important
    }

    .panel-heading {
        border-color: #EEE !important;
        border-top-left-radius: 0;
        border-top-right-radius: 0;
        padding: 16px 15px;
        background: #7cbb29 !important;
        color: #FFF !important
    }

    .panel {
        border: none;
        margin-bottom: 30px
    }

    .panel-body {
        padding-top: 30px
    }

    .color h2 {
        margin-top: 10px;
        margin-bottom: 10px;
        font-size: 22px;
    }

    .pro-detail {
        margin-bottom: 8px;
        color: #716565
    }

    .pro-res {
        font-size: 25px;
        margin-bottom: 27px;
    }

</style>
@endsection

@section('content')

<!--==================================================-->

<div class="container re-size" style="margin-top: 260px; margin-bottom:80px">
    <div class="row animatee">


        <!------------->
        <div style="" class="hide-def">
            <div class="col-md-12">
                <div class="panel panel-default" style="font-family: 'Cairo', sans-serif !important; width:100%">
                    <div class="panel-heading"><i class="fa fa-tag" style="margin-left: 12px;"></i>{{projectCategories()[$project->category]}}</div>
                    <div class="panel-body" style="text-align:center">

                        <div class="pro-detail">
                            <b>عدد العروض المقدمه</b>
                        </div>
                        <div class="pro-res">
                            <b>{{$project->offers->count()}}</b>
                        </div>
                        <hr>
                        <div class="pro-detail">
                            <b>عدد المشاهدات</b>
                        </div>
                        <div class="pro-res">
                            <b>{{$project->view_num}}</b>
                        </div>
                        <hr>
                        <div class="pro-detail">
                            <b>ميزانيه المشروع المتوقعه (ر.س.)</b>
                        </div>
                        <div class="pro-res">
                            <b>
                                @if($project->expectbudget != null)
                                {{$project->expectbudget}}
                                @else
                                لم تحدد
                                @endif
                            </b>
                        </div>
                        <hr>
                        <div class="pro-detail">
                            <b>مدة التنفيذ المتوقعة </b>
                        </div>
                        <div class="pro-res">
                            <b>
                                @if($project->expecttime != null)
                                {{$project->expecttime}}
                                @else
                                لم تحدد
                                @endif
                            </b>
                        </div>
                        <hr>
                        <div class="pro-detail">
                            <b>متوسط اسعار العروض (ر.س.)</b>
                        </div>
                        <?php
                            $sum = 0;
                            foreach($project->offers as $project_offer){
                                $sum += $project_offer->milestones->sum('value');
                            }
                        ?>
                        <div class="pro-res">
                            <b>
                                @if($project->offers->count() != 0)
                                {{$sum / $project->offers->count()}}
                                @else
                                0
                                @endif
                            </b>
                        </div>

                    </div>
                </div>
            </div>


            <div class="col-md-12 hide-def">
                <div class="panel panel-default" style="font-family: 'Cairo', sans-serif !important; width:100%">
                    <div class="panel-heading"><i class="fa fa-user" style="margin-left: 12px;"></i>
                        <a href="{{url('reviews').'/'.$project->owner->id}}" style="color:#FFF; text-decoration:none" target="_blank">{{$project->owner->name}}</a>
                    </div>
                    <div class="panel-body" style="text-align:center">

                        <div class="col-xs-4" style="font-size:22px; color:green">
                            <b>{{$project->owner->projectOwners->where('status', '0')->count()}}</b>
                        </div>
                        <div class="col-xs-4" style="font-size:22px">
                            <b>{{$project->owner->projectOwners->where('status', '1')->count()}}</b>
                        </div>
                        <div class="col-xs-4" style="font-size:22px">
                            <b>{{$project->owner->projectOwners->where('status', '2')->count()}}</b>
                        </div>

                        <div class="col-xs-12" style="padding:0">
                            <div class="col-xs-4" style="font-size:14px; color:#999999">مشاريع مفتوحه</div>
                            <div class="col-xs-4" style="font-size:14px; padding:0; color:#999999">مشاريع قيد التنفيذ</div>
                            <div class="col-xs-4" style="font-size:14px; color:#999999">مشاريع مكتمله</div>
                        </div>
                    </div>
                </div>
            </div>
            <!----------->

            <div class="col-md-12 hide-991" style="padding-right:0">
                <div class="panel panel-default" style="font-family: 'Cairo', sans-serif !important; width:100%">
                    <div class="panel-heading"><i class="fa fa-user" style="margin-left: 12px;"></i>
                        <a href="{{url('reviews').'/'.$project->owner->id}}" style="color:#FFF; text-decoration:none" target="_blank">{{$project->owner->name}}</a>
                    </div>
                    <div class="panel-body" style="text-align:center">

                        <div class="col-md-4" style="font-size:22px; color:green">
                            <b>{{$project->owner->projectOwners->where('status', '0')->count()}}</b>
                        </div>
                        <div class="col-md-4" style="font-size:22px">
                            <b>{{$project->owner->projectOwners->where('status', '1')->count()}}</b>
                        </div>
                        <div class="col-md-4" style="font-size:22px">
                            <b>{{$project->owner->projectOwners->where('status', '2')->count()}}</b>
                        </div>

                        <div class="col-md-12" style="padding:0">
                            <div class="col-md-4" style="font-size:14px; color:#999999">مشاريع مفتوحه</div>
                            <div class="col-md-4" style="font-size:14px; padding:0; color:#999999">مشاريع قيد التنفيذ</div>
                            <div class="col-md-4" style="font-size:14px; color:#999999">مشاريع مكتمله</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!------------->



        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading"><i class="fa fa-building" style="margin-left: 12px;"></i>{{$project->title}}</div>
                <div class="panel-body">
                    <div class="col-sm-4">

                    </div>
                    <div class="col-sm-8" style="color:#000;overflow-wrap: break-word; word-break: break-word; word-wrap: break-word;">
                        {{$project->desc}}
                    </div>
                    <div class="col-sm-12" style="color:#75787d;overflow-wrap: break-word; word-break: break-word; word-wrap: break-word;margin-top:20px; font-weight:bold">
                        <i class="fa fa-map-marker" style="margin-left: 2px;"></i>
                        {{$project->cityData->name}}
                    </div>
                    @if(isset($project->attachment_id))
                    <div class="col-sm-12" style="margin-top:20px">
                        <i class="fa fa-paperclip" aria-hidden="true" style="margin-left: 4px;"></i><span>الملحقات</span><br>
                        @foreach(json_decode($project->attachment_id) as $val)
                        @if(isset(\App\Attachment::find($val)->path))
                        <a href="{{url('public/upload')}}/{{\App\Attachment::find($val)->path}}" target="_blank" class="attach-link">
                            {{\App\Attachment::find($val)->name}} <br>
                        </a>
                        @endif
                        @endforeach
                    </div>
                    @endif
                    <div class="col-xs-4" style="margin-top:30px; direction:ltr">
                        {{$project->created_at->format('h:i a')}}
                    </div>
                    <div class="col-xs-8" style="margin-top:30px">
                        {{$project->created_at->format('Y-m-d')}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<div class="container hide-991" style="margin-top: -55px; margin-bottom:80px;">
    <div class="col-md-12" style="padding:0">
        <div class="panel panel-default" style="font-family: 'Cairo', sans-serif !important; width:100%">
            <div class="panel-heading"><i class="fa fa-tag" style="margin-left: 12px;"></i>{{projectCategories()[$project->category]}}</div>
            <div class="panel-body" style="text-align:center">

                <div class="pro-detail">
                    <b>عدد العروض المقدمه</b>
                </div>
                <div class="pro-res">
                    <b>{{$project->offers->count()}}</b>
                </div>
                <hr>
                <div class="pro-detail">
                    <b>عدد المشاهدات</b>
                </div>
                <div class="pro-res">
                    <b>{{$project->view_num}}</b>
                </div>
                <hr>
                <div class="pro-detail">
                    <b>ميزانيه المشروع المتوقعه (ر.س.)</b>
                </div>
                <div class="pro-res">
                    <b>
                        @if($project->expectbudget != null)
                        {{$project->expectbudget}}
                        @else
                        لم تحدد
                        @endif
                    </b>
                </div>
                <hr>
                <div class="pro-detail">
                    <b>مدة التنفيذ المتوقعة </b>
                </div>
                <div class="pro-res">
                    <b>
                        @if($project->expecttime != null)
                        {{$project->expecttime}}
                        @else
                        لم تحدد
                        @endif
                    </b>
                </div>
                <hr>
                <div class="pro-detail">
                    <b>متوسط اسعار العروض (ر.س.)</b>
                </div>
                <?php
                            $sum = 0;
                            foreach($project->offers as $project_offer){
                                $sum += $project_offer->milestones->sum('value');
                            }
                        ?>
                <div class="pro-res">
                    <b>
                        @if($project->offers->count() != 0)
                        {{$sum / $project->offers->count()}}
                        @else
                        0
                        @endif
                    </b>
                </div>

            </div>
        </div>
    </div>
</div>

<!--==========================================================-->
@endsection


@section('footer')


@endsection
