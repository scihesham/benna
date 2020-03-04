@extends('front.layout.master')

@section('title')
{{$project->title}}
@endsection

@section('header')
<link rel="stylesheet" href="{{url('public/design/mandoby/fxss-rate/rate.css')}}">
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


    .rate_text {
        margin-bottom: 30px;
        margin-top: 10px;
        /*        color: #1b78b3 !important;*/
        font-size: 20px !important;
        line-height: 0 !important;
        display: block !important;
    }

    svg.icon {
        font-size: 38px !important
    }
    
    #rate-to-owner svg.icon, #rate-to-company svg.icon {
        font-size: 32px !important
    }
</style>
@endsection

@section('content')

<!--==================================================-->

<div class="container" style="margin-top: 250px; ">
    <div class="row animatee">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="fa fa-building" style="margin-left: 12px;"></i>{{$project->title}}
                    <span style="float:left">
                    <i class="fa fa-user" style="margin-left: 8px;"></i>
                    {{$project->owner->name}}
                    </span>
                </div>
                <div class="panel-body">
                    <div class="col-sm-4">

                    </div>
                    <div class="col-sm-8" style="color:#000;overflow-wrap: break-word; word-break: break-word; word-wrap: break-word;">
                        {{$project->desc}}
                    </div>
<!--
                    <div class="col-sm-4" style="">

                    </div>
-->
                    @if(isset($project->attachment_id))
                    <div class="col-sm-12" style="margin-top:30px">
                        <i class="fa fa-paperclip" aria-hidden="true" style="margin-left: 4px;"></i><span>الملحقات</span><br>
                        @foreach(json_decode($project->attachment_id) as $val)
                        @if(isset(\App\Attachment::find($val)->path))
                        <a href="{{url('public/upload')}}/{{\App\Attachment::find($val)->path}}" target="_blank">
                            {{\App\Attachment::find($val)->name}} <br>
                        </a>
                        @endif
                        @endforeach
                    </div>
                    @endif                    
                    <div class="col-sm-4" style="margin-top:30px; direction:ltr">
                        {{$project->created_at->format('h:i a')}}
                    </div>
                    <div class="col-sm-8" style="margin-top:30px">
                        {{$project->created_at->format('Y-m-d')}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div style="margin:70px 0">
<!-- if project awarded -->
@if($project->status > 0)
            <div class="container" style="">
            <div class="row animatee">
                <div class="col-md-12">
                    <div class="panel panel-default" id="offer{{$project->awardOffer->id}}">
                        <div class="panel-heading"><i class="fa fa-user" style="margin-left: 12px;"></i>
                            {{$project->awardOffer->company->name}}
                        </div>
                        <div class="panel-body">
                            <div class="col-sm-4">
                                <div style="direction:ltr">
                                <a class="btn btn-default" href="{{url('messages').'/'.$project->awardOffer->id}}">محادثه</a>
                                @if($project->status == 1)
                                <a href="{{url('confirmdone/project').'/'.$project->id}}" class="btn btn-success" onclick='return confirmAr()'> انهاء المشروع </a>
                                @endif
                                @if($project->status == 2)
                                @if($project->rating && !empty($project->rating->rating_to_company))
                                <a href="{{url('messages').'/'.$project->awardOffer->id}}" class="btn btn-default"> تم انهاء المشروع</a>
                                @else
                                <button class="open-button btn btn-success" onclick="openForm()"><i class="fas fa-palette" style="margin-right:1px"></i> تقييم</button>
                                @endif
                                @endif
                                <span class="btn">(تم التعيين)</span>
                                </div>
                            </div>
                            <div class="col-sm-8" style="color:#000;overflow-wrap: break-word; word-break: break-word; word-wrap: break-word;">
                                {{$project->awardOffer->offer->desc}}
                            </div>
                            @foreach($project->awardOffer->milestones as $key => $milestone)
                            <div class="col-sm-12" style="margin-top:30px">
                                <div class="col-sm-2  col-sm-offset-2">
                                    <input  type="number" class="form-control" value="{{$milestone->value}}" disabled>
                                </div>
                                <div class="col-sm-8" >
                                    <input class="form-control" value="{{$milestone->desc}}" disabled>
                                </div>

                            </div>
                            @endforeach

                            <div class="col-sm-6  col-sm-offset-6" style="margin-top:30px; font-size:18px; color:#75787d">
                                <span>التكلفه الاجماليه</span>
                                <span style="color:#000">{{$project->awardOffer->milestones->sum('value')}}</span>
                                <span>ريال سعودى</span>

                            </div>

                            @if(isset($project->awardOffer->offer->attachment_id))
                            <div class="col-sm-12" style="margin-top:30px">
                                <i class="fa fa-paperclip" aria-hidden="true" style="margin-left: 4px;"></i><span>الملحقات</span><br>
                                @foreach(json_decode($project->awardOffer->offer->attachment_id) as $val)
                                @if(isset(\App\Attachment::find($val)->path))
                                <a href="{{url('public/upload')}}/{{\App\Attachment::find($val)->path}}" target="_blank">
                                    {{\App\Attachment::find($val)->name}} <br>
                                </a>
                                @endif
                                @endforeach
                            </div>
                            @endif
                            <div  class="col-sm-12" style="margin-top:50px;">
                                <div class="col-sm-8" style="direction:ltr">
                                    {{$project->awardOffer->offer->created_at->format('Y-m-d')}}
                                </div>
                                <div class="col-sm-4" style="">
                                    {{$project->awardOffer->offer->created_at->format('h:i a')}}
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
@endif
    
@foreach($project->offers as $offer)
    @if($offer->project->company_id != $offer->company_id)
    <div class="container" style="" >
        <div class="row animatee">
            <div class="col-md-12">
                <div class="panel panel-default" id="offer{{$offer->id}}">
                    <div class="panel-heading"><i class="fa fa-user" style="margin-left: 12px;"></i>
                        <a href="{{url('reviews').'/'.$offer->company->id}}" style="color:#FFF; text-decoration:none">{{$offer->company->name}}</a>
                    </div>
                    <div class="panel-body">
                        <div class="col-sm-4">
                            <div style="direction:ltr">
                            <a class="btn btn-default" href="{{url('messages').'/'.$offer->id}}">محادثه</a>
                            @if($offer->project->status == 0)
                            <a class="btn btn-primary" href="{{url('offer/project/').'/'.$offer->id.'/award'}}"  onclick='return myfuncAward("{{$offer->company->name}}")'>تعيين</a>
                            @endif
                            </div>
                        </div>
                        <div class="col-sm-8" style="color:#000;overflow-wrap: break-word; word-break: break-word; word-wrap: break-word;">
                            {{$offer->offer->desc}}
                        </div>
                        @foreach($offer->milestones as $key => $milestone)
                        <div class="col-sm-12" style="margin-top:30px">
                            <div class="col-sm-2  col-sm-offset-2">
                                <input  type="number" class="form-control" value="{{$milestone->value}}" disabled>
                            </div>
                            <div class="col-sm-8" >
                                <input class="form-control" value="{{$milestone->desc}}" disabled>
                            </div>

                        </div>
                        @endforeach

                        <div class="col-sm-6  col-sm-offset-6" style="margin-top:30px; font-size:18px; color:#75787d">
                            <span>التكلفه الاجماليه</span>
                            <span style="color:#000">{{$offer->milestones->sum('value')}}</span>
                            <span>ريال سعودى</span>

                        </div>

                        @if(isset($offer->offer->attachment_id))
                        <div class="col-sm-12" style="margin-top:30px">
                            <i class="fa fa-paperclip" aria-hidden="true" style="margin-left: 4px;"></i><span>الملحقات</span><br>
                            @foreach(json_decode($offer->offer->attachment_id) as $val)
                            @if(isset(\App\Attachment::find($val)->path))
                            <a href="{{url('public/upload')}}/{{\App\Attachment::find($val)->path}}" target="_blank">
                                {{\App\Attachment::find($val)->name}} <br>
                            </a>
                            @endif
                            @endforeach
                        </div>
                        @endif
                        <div  class="col-sm-12" style="margin-top:50px;">
                            <div class="col-sm-8" style="direction:ltr">
                                {{$offer->offer->created_at->format('Y-m-d')}}
                            </div>
                            <div class="col-sm-4" style="">
                                {{$offer->offer->created_at->format('h:i a')}}
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    
    @endif
@endforeach
</div>


<!-- evaluate form -->
<div class="form-popup" id="myForm">
    <form action="{{url('project/evaluate').'/'.$offer->project->id}}" class="form-container" method="post">
        {{ csrf_field() }}
        <h4 style="text-align:center; color:#5d5959 !important; margin-bottom:17px">التقييم</h4>
        <div class="row colors">
            <div class="col-sm-12">
                <label for="email" style="margin-bottom:7px"><b>اختر تقييما</b></label>
                <div id="rateBox"></div>
                <input type="hidden" name="rate" id="rate" value="5">
            </div>
            <div class="col-sm-12">
                <label for="email"><b>ضع تعليقا</b></label><br>
                <textarea rows="6" style="width:100%;" name="comment" required></textarea>
            </div>
        </div>
        <button type="submit" class="btn" style="margin-top:25px">موافق</button>
        <button type="button" class="btn cancel" onclick="closeForm()">اغلاق</button>
    </form>
</div>

<!--==========================================================-->
@endsection


@section('footer')
<script src="{{url('public/design/mandoby/fxss-rate/rate.js')}}"></script>

<script>
    $("#rateBox").rate({
        length: 5,
        value: 5,
        readonly: false,
        size: '48px',
        selectClass: 'fxss_rate_select',
        incompleteClass: 'fxss_rate_no_all_select',
        customClass: 'custom_class',
        callback: function(object) {
            //            console.log(object);
            $('#rate').val(object.index + 1);
        }
    });
</script>
@endsection
