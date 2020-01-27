@extends('admin.layout.master')

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

    .message .panel-body {
        border: none !important;
        padding-bottom: 15px;
        padding-top: 20px;
        position: relative
    }

    .message .panel-body .time {
        font-size: 12px;
        position: absolute;
        left: 23px;
        bottom: 6px;
        direction: ltr;
    }
    .no-asterick .asterisk{display: none}
</style>
@endsection

@section('content')

@section('page_title')
تفاصيل النزاع
@endsection

@section('active_title')
تفاصيل النزاع
@endsection


<!-- Main content -->
<section class="content">

    <div class="row dattable">
        <div class="" style="margin-top: 30px; margin-bottom:80px">
            <div class="animatee">
                <div class="col-md-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading"><i class="fa fa-building" style="margin-left: 12px;"></i>{{$dispute->milestone->offer->project->title}}</div>
                        <div class="panel-body">
                            <div class="col-sm-2 col-sm-offset-3">
                                <input type="number" class="form-control" value="{{$dispute->milestone->value}}" disabled>
                            </div>
                            <div class="col-sm-7" style="padding-right:0 !important; margin-bottom:40px">
                                <input class="form-control" value="{{$dispute->milestone->desc}}" disabled>
                            </div>
                            
                            <div class="col-sm-2 col-sm-offset-5" style="margin-bottom:35px">
                                <input type="text" id="owner-val" class="form-control" value="" disabled>
                            </div>
                            <form method="post" action="{{url('admin/judge/disputes').'/'.$dispute->id}}">
                                {{ csrf_field() }}
                                <div class="col-sm-2 no-asterick" style="padding-right:0 !important; margin-bottom:22px">
                                    <input class="form-control" type="number" name="owner_percent" id="owner-percent" placeholder="النسبه المئويه" value="{{$dispute->owner_percent}}" required>
                                </div> 
                                <div class="col-sm-3" style="padding-right:0 !important">
                                    <img class='img-circle'style="width:40px;margin-top:-3px" src="{{url('public/design/adminlte/dist/img/avatar5.png')}}">

                                    <input type="text" class="form-control" style="width: calc(100% - 45px); float: left;" value="{{$dispute->milestone->offer->owner->name}}" disabled>
                                </div>


                                <div class="col-sm-2 col-sm-offset-5" style="">
                                    <input type="text" class="form-control" id="company-val" value="" disabled>
                                </div>
                                <div class="col-sm-2" style="padding-right:0 !important; margin-bottom:22px">
                                    <input class="form-control" type="text" id="company-percent" placeholder="النسبه المئويه" value="{{$dispute->company_percent}}" disabled>
                                </div> 
                                <div class="col-sm-3" style="padding-right:0 !important">
                                    <img class='img-circle'style="width:40px;margin-top:-8px" src="{{url('public/design/adminlte/dist/img/engineer.png')}}">

                                    <input type="text" class="form-control" style="width: calc(100% - 45px); float: left;" value="{{$dispute->milestone->offer->company->name}}" disabled>
                                </div>
                                @if($dispute->status == 0)
                                <div class="" >
                                    <button type="submit" style="margin:30px 0; margin-bottom:20px" class="btn btn-primary pull-left" onclick='return confirmAr()'>
                                        اعاده تقسيم
                                    </button>
                                </div>
                                @endif
                            </form>
                            
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
    
    
<div class="row dattable">
<!-- messages -->
<div style="margin:70px 0; margin-top:50px">
    <div class="" style="">
        <div class=" animatee">
            <div class="col-md-12">
                <div class="panel panel-default" >
                    <div class="panel-heading"><i class="fa fa-envelope" style="margin-left: 12px;"></i>الرسائل</div>
                    <div class="panel-body"style="max-height:645px;overflow-y:auto">
         @foreach($dispute->disputeMessages as $key => $message)
         <?php
            if($key == 0 || ($dispute->disputeMessages[$key]->created_at->format('Y-m-d') != $dispute->disputeMessages[$key-1]->created_at->format('Y-m-d')))
                 $avatar = true;
            else
                $avatar = false;

         ?>


            <!-- check if it is text -->
            @if($message->type == '0') 
                <!-- send from owner -->
                @if($message->messageFrom->permission == 2)

                @if($key == 0 || $avatar || ($dispute->disputeMessages[$key]->messageFrom->id != $dispute->disputeMessages[$key-1]->messageFrom->id))
                <div class="text-center" style="width:100%;position: relative; bottom: -30px; color: #9a9a9a">{{$message->created_at->format('Y-m-d')}}</div>
                <div><img class='img-circle'style="width:40px" src="{{url('public/design/adminlte/dist/img/avatar5.png')}}"></div>
                @endif

                <div class="panel panel-default message" style="width:70%; margin-right:0 !important; margin-bottom: 6px;background-color:#3578e5; border-radius: 40px; border: 1px solid #d1dfec;">
                    <div class="panel-body" style="color:#FFF !important">
                            {{$message->content}} 
                        <span class="time">{{$message->created_at->format('h:i a')}}</span>
                    </div>
                </div>
                <!-- send from company -->
                @elseif($message->messageFrom->permission == 3)

                @if($key == 0 || $avatar || ($dispute->disputeMessages[$key]->messageFrom->id != $dispute->disputeMessages[$key-1]->messageFrom->id))
                <div class="text-center" style="width:100%;position: relative; bottom: -30px; color: #9a9a9a">{{$message->created_at->format('Y-m-d')}}</div>
                <div class="text-left" style="width:100%"><img class='img-circle'style="width:40px" src="{{url('public/design/adminlte/dist/img/engineer.png')}}"></div>
                @endif

                <div class="panel panel-default message" style="width:70%; margin-left:0 !important; margin-bottom: 6px;background-color:#EEE; border-radius: 40px; border: 1px solid #d1dfec;">
                    <div class="panel-body" >
                            {{$message->content}} 
                        <span class="time">{{$message->created_at->format('h:i a')}}</span>
                    </div>
                </div>
                        
                <!-- send from admin or support -->
                @elseif($message->messageFrom->permission == 0 || $message->messageFrom->permission == 1)

                @if($key == 0 || $avatar || ($dispute->disputeMessages[$key]->messageFrom->id != $dispute->disputeMessages[$key-1]->messageFrom->id))
                <div class="text-center" style="width:100%;position: relative; bottom: -30px; color: #9a9a9a">{{$message->created_at->format('Y-m-d')}}</div>
                <div><img class='img-circle'style="width:40px" src="{{url('public/design/adminlte/dist/img/support.png')}}"></div>
                @endif

                <div class="panel panel-default message" style="width:70%; margin-right:0 !important; margin-bottom: 6px;background-color:#3578e5; border-radius: 40px; border: 1px solid #d1dfec;">
                    <div class="panel-body" style="color:#FFF !important">
                            {{$message->content}} 
                        <span class="time">{{$message->created_at->format('h:i a')}}</span>
                    </div>
                </div>

                        
                @endif     


            <!-- check if it is attachment -->
            @else  
                <!-- send from owner -->
                @if($message->messageFrom->permission == 2)
                @if($key == 0 || $avatar || ($dispute->disputeMessages[$key]->messageFrom->id != $dispute->disputeMessages[$key-1]->messageFrom->id))
                <div class="text-center" style="width:100%;position: relative; bottom: -30px; color: #9a9a9a">{{$message->created_at->format('Y-m-d')}}</div>
                <div><img class='img-circle'style="width:40px" src="{{url('public/design/adminlte/dist/img/avatar5.png')}}"></div>
                @endif
                <div class="panel panel-default message" style="width:70%; margin-right:0 !important; margin-bottom: 6px;background-color:#FFF; border-radius: 40px; border: 1px solid #d1dfec;">
                    <div class="panel-body" style="color:blue !important">
                            <a href="{{url('public/upload')}}/{{$message->attachment->path}}" target="_blank">
                                {{$message->attachment->name}}
                            </a>  
                        <span class="time">{{$message->created_at->format('h:i a')}}</span>
                    </div>
                </div>
                <!-- send from company -->
                @elseif($message->messageFrom->permission == 3)
                @if($key == 0 || $avatar || ($dispute->disputeMessages[$key]->messageFrom->id != $dispute->disputeMessages[$key-1]->messageFrom->id))
                <div class="text-center" style="width:100%;position: relative; bottom: -30px; color: #9a9a9a">{{$message->created_at->format('Y-m-d')}}</div>
                <div class="text-left" style="width:100%"><img class='img-circle'style="width:40px" src="{{url('public/design/adminlte/dist/img/engineer.png')}}"></div>
                @endif
                <div>
                <div class="panel panel-default message" style="width:70%; margin-left:0 !important; margin-bottom: 6px;background-color:#FFF;     border-radius: 40px; border: 1px solid #d1dfec; ">
                    <div class="panel-body" >
                            <a href="{{url('public/upload')}}/{{$message->attachment->path}}" target="_blank">
                                {{$message->attachment->name}}
                            </a>  
                        <span class="time">{{$message->created_at->format('h:i a')}}</span>
                    </div>
                </div>
                </div>
                        
                <!-- send from admin or suppport -->
                @elseif($message->messageFrom->permission == 0 || $message->messageFrom->permission == 1)
                @if($key == 0 || $avatar || ($dispute->disputeMessages[$key]->messageFrom->id != $dispute->disputeMessages[$key-1]->messageFrom->id))
                <div class="text-center" style="width:100%;position: relative; bottom: -30px; color: #9a9a9a">{{$message->created_at->format('Y-m-d')}}</div>
                <div><img class='img-circle'style="width:40px" src="{{url('public/design/adminlte/dist/img/support.png')}}"></div>
                @endif
                <div class="panel panel-default message" style="width:70%; margin-right:0 !important; margin-bottom: 6px;background-color:#FFF; border-radius: 40px; border: 1px solid #d1dfec;">
                    <div class="panel-body" style="color:blue !important">
                            <a href="{{url('public/upload')}}/{{$message->attachment->path}}" target="_blank">
                                {{$message->attachment->name}}
                            </a>  
                        <span class="time">{{$message->created_at->format('h:i a')}}</span>
                    </div>
                </div>
                        
                @endif

            @endif


         @endforeach
                        <span id="last-msg" style=" position: relative;  top: -220px;"></span>
                        <div id="newmsg"></div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
    
    
    
<div class="row dattable">
<div class="" style="margin-top: -30px; margin-bottom:80px">
    <div class=" animatee color">
        <div class="col-md-12">
            <div class="well well-sm">
                <form method="post" action="{{url('admin/milestone/dispute').'/'.$dispute->milestone_id}}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <h2>
                         انشاء رساله
                    </h2>
                    <hr class="colorgraph">
                    <div class="row">

                        <div class="cont-center">
                            <div class="form-group" style="margin-top:10px">
                                <label for="content">

                                     التفاصيل
                                </label>
                                <textarea name="content" id="content" class="form-control" rows="9" cols="25" placeholder="التفاصيل" ></textarea>
                                @if ($errors->has('content'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('content') }}</strong>
                                </span>
                                @endif
                            </div>

                            <div class="form-group">
                                <i class="fa fa-paperclip" aria-hidden="true" style="margin-left: 4px;"></i>
                                <label for="attachments">

                                    الملحقات
                                </label>
                                <input type="file" class="form-control" name="attachments[]" id="attachments" placeholder="الملحقات" multiple />
                                @if ($errors->has('attachments.*'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('attachments.*') }}</strong>
                                </span>
                                @endif
                            </div>
                            <br>

                            <div class="" >
                                <button type="submit" style="margin:10px 0; margin-bottom:15px" class="btn btn-primary pull-left" id="btnContactUs">
                                    ارسال
                                </button>
                            </div>
                        </div>


                    </div>
                </form>
            </div>
        </div>

    </div>
</div>
</div>

</section>

@endsection

@section('footer')
<script>
    $(function() {
        var milestone_val = "{{$dispute->milestone->value}}";
        $('#owner-percent').keyup(function(){
            var owner_percent = Number($('#owner-percent').val());
            var company_percent = 100 - owner_percent;
            var owner_val = (milestone_val * (owner_percent / 100)).toFixed(2);
            var company_val = (milestone_val * (company_percent / 100)).toFixed(2);
            $('#company-percent').val(company_percent+' %');
            $('#company-val').val(company_val+' ريال سعودى');
            $('#owner-val').val(owner_val+' ريال سعودى');

        })
        
    });
</script>
@endsection
