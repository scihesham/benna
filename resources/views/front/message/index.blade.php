@extends('front.layout.master')

@section('title')
{{$offer->project->title}}
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

    .color h2 {
        margin-top: 10px;
        margin-bottom: 10px;
        font-size: 22px;
    }

    #row2 {
        margin-top: -40px
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
    
    textarea, textarea.form-control{font-family: ara !important; font-size: 22px !important;}

</style>
@endsection

@section('content')

<!--==================================================-->

<div class="container re-size" style="margin-top:230px;margin-bottom:80px">
    <div class="row animatee">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <span>
                        <i class="fa fa-building" style="margin-left: 12px;"></i>
                        {{$offer->project->title}}
                    </span>

                    <span style="float:left">
                        <i class="fa fa-user" style="margin-left: 8px;"></i>
                        <a href="{{url('reviews').'/'.$offer->owner->id}}" style="color:#FFF; text-decoration:none" target="_blank">{{$offer->project->owner->name}}</a>
                    </span>
                </div>
                <div class="panel-body">
                    <div class="col-sm-4">

                    </div>
                    <div class="col-sm-8" style="color:#000;overflow-wrap: break-word; word-break: break-word; word-wrap: break-word;">
                        {{$offer->project->desc}}
                    </div>

                    <div class="col-sm-12" style="color:#75787d;overflow-wrap: break-word; word-break: break-word; word-wrap: break-word;margin-top:20px; font-weight:bold">
                        <i class="fa fa-map-marker" style="margin-left: 2px;"></i>
                        {{ksaCities()[$offer->project->city]}}
                    </div>

                    @if(isset($offer->project->attachment_id))
                    <div class="col-sm-12" style="margin-top:20px">
                        <i class="fa fa-paperclip" aria-hidden="true" style="margin-left: 4px;"></i><span>الملحقات</span><br>
                        @foreach(json_decode($offer->project->attachment_id) as $val)
                        @if(isset(\App\Attachment::find($val)->path))
                        <a href="{{url('public/upload')}}/{{\App\Attachment::find($val)->path}}" target="_blank">
                            {{\App\Attachment::find($val)->name}} <br>
                        </a>
                        @endif
                        @endforeach
                    </div>
                    @endif
                    <div class="col-sm-4" style="margin-top:30px; direction:ltr">
                        {{$offer->project->created_at->format('h:i a')}}
                    </div>
                    <div class="col-sm-8" style="margin-top:30px">
                        {{$offer->project->created_at->format('Y-m-d')}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div style="margin:70px 0" id="milestone">
    <div class="container" style="">
        <div class="row animatee">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading"><i class="fa fa-user" style="margin-left: 12px;"></i>
                        <a href="{{url('reviews').'/'.$offer->company->id}}" style="color:#FFF; text-decoration:none" target="_blank">{{$offer->company->name}}</a>
                    </div>
                    <div class="panel-body">


                        <div class="col-sm-8  col-sm-offset-4" style="color:#000;overflow-wrap: break-word; word-break: break-word; word-wrap: break-word;">
                            {{$offer->offer->desc}}
                        </div>
                        <!-- check that all milestones paid -->
                        <?php
                        $milestone_paid = true;
                    ?>
                        @foreach($offer->milestones as $key => $milestone)
                        <?php
                        if($milestone->status != 1){
                           $milestone_paid = false; 
                        }
                    ?>
                        <div class="col-sm-12" style="margin-top:30px">
                            <!-- if project awarded to this company -->
                            @if($offer->project->status > 0 && $offer->project->awardOffer->id == $offer->id)
                            <!--
                    <div class="col-sm-2 col-sm-offset-1">
                        @if($milestone->status == 1 && isset($milestone->dispute->id))
                        <a href="{{url('milestone/dispute/show').'/'.$milestone->id}}"  class="btn btn-primary">تم فض النزاع </a>
                        @elseif($milestone->status == 0)
                            @if(Auth::user()->permission == 2)
                            <a href="{{url('milestone/release').'/'.$milestone->id}}" class="btn btn-primary">تحرير</a>
                            @else
                            <a href="#" class="btn btn-primary">طلب</a>
                            @endif
                        <a href="{{url('milestone/dispute').'/'.$milestone->id}}" class="btn btn-danger">نزاع</a>
                        @elseif($milestone->status == 2)
                        <a href="{{url('milestone/dispute/show').'/'.$milestone->id}}"  class="btn btn-primary">تفاصيل تذكرة فض النزاع</a>
                        @elseif($milestone->status == 1)
                        <span class="btn btn-default">تم التحرير</span>
                        @endif
                     </div>
-->
                            <div class="col-sm-2 col-sm-offset-3">
                                <input type="number" class="form-control" value="{{$milestone->value}}" disabled>
                            </div>

                            <div class="col-sm-7" style="padding-right:0 !important">
                                <input class="form-control" value="{{$milestone->desc}}" disabled>
                            </div>
                            @else
                            <div class="col-sm-2 col-sm-offset-3">
                                <input type="number" class="form-control" value="{{$milestone->value}}" disabled>
                            </div>

                            <div class="col-sm-7" style="padding-right:0 !important">
                                <input class="form-control" value="{{$milestone->desc}}" disabled>
                            </div>
                            @endif
                        </div>
                        @endforeach
                        <!--                   hif($milestone_paid && Auth::user()->permission == 2) -->

                        <div class="col-sm-2 col-sm-offset-10" style="margin-top:30px;">
                            @if(Auth::user()->permission == 2 && $offer->project->status == 1)
                            <a href="{{url('confirmdone/project').'/'.$offer->project->id}}" class="btn btn-success" onclick='return confirmAr()'> انهاء المشروع </a>
                            @endif
                            @if($offer->project->status == 2)
                            @if(Auth::user()->permission == 2)
                            @if($offer->project->rating && !empty($offer->project->rating->rating_to_company))
                            <span class="btn btn-default"> تم انهاء المشروع</span>
                            @else
                            <button class="open-button btn btn-success" onclick="openForm()"><i class="fas fa-palette" style="margin-right:1px"></i> تقييم</button>
                            @endif
                            @elseif(Auth::user()->permission == 3)
                            @if($offer->project->rating && !empty($offer->project->rating->rating_to_owner))
                            <span class="btn btn-default"> تم انهاء المشروع</span>
                            @else
                            <button class="open-button btn btn-success" onclick="openForm()"><i class="fas fa-palette" style="margin-right:1px"></i> تقييم</button>
                            @endif
                            @endif
                            @endif

                        </div>

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
                        <div class="col-sm-12" style="margin-top:50px;">
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



<!-- reviews -->
@if($offer->project->evaluation_status == 1)
<div style="margin:70px 0">
    <div class="container" style="">
        <div class="row animatee">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading"><i class="fa fa-star" style="margin-left: 12px;"></i>التقييمات</div>
                    <div class="panel-body" style="max-height:645px;overflow-y:auto">

                        <div class="text-center" style="width:100%;position: relative; bottom: -30px; color: #9a9a9a">
                           
                        </div>
                        <div>
                            @if(isset($offer->owner->attachment->path))
                            <img class='img-circle' style="width:40px" src="{{url('public/upload')}}/{{$offer->owner->attachment->path}}">
                            @else
                            <img class='img-circle'style="width:40px" src="{{url('public/design/adminlte/dist/img/avatar5.png')}}">
                            @endif
                        </div>

                        <div class="panel panel-default message" style="width:70%; margin-right:0 !important; margin-bottom: 6px;background-color:#3578e5; border-radius: 40px; border: 1px solid #d1dfec;">
                            <div class="panel-body" style="color:#FFF !important">
                                {{$offer->project->rating->comment_to_company}}
                                
                            </div>
                        </div>
                        <div id="rate-to-company"></div>
                        
                        
                        <div class="text-center" style="width:100%;position: relative; bottom: -30px; color: #9a9a9a">
                            
                        </div>
                        <div class="text-left" style="width:100%">
                            @if(isset($offer->company->attachment->path))
                            <img class='img-circle' style="width:40px" src="{{url('public/upload')}}/{{$offer->company->attachment->path}}">
                            @else
                            <img class='img-circle'style="width:40px" src="{{url('public/design/adminlte/dist/img/engineer.png')}}">
                            @endif
                        </div>
                        <div>
                            <div class="panel panel-default message" style="width:70%; margin-right:auto !important; margin-bottom: 6px;background-color:#FFF;     border-radius: 40px; border: 1px solid #d1dfec; ">
                                <div class="panel-body">
                                        {{$offer->project->rating->comment_to_owner}}
                                </div>
                            </div>
                        </div>
                        <div id="rate-to-owner" style="float:left"></div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endif



<!-- messages -->
<div style="margin:70px 0">
    <div class="container" style="">
        <div class="row animatee">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading"><i class="fa fa-envelope" style="margin-left: 12px;"></i>الرسائل</div>
                    <div class="panel-body" style="max-height:645px;overflow-y:auto">
                        @foreach($offer->messages as $key => $message)
                        <?php
                            if($key == 0 || ($offer->messages[$key]->created_at->format('Y-m-d') != $offer->messages[$key-1]->created_at->format('Y-m-d')))
                                 $avatar = true;
                            else
                                $avatar = false;

                         ?>


                        <!-- check if it is text -->
                        @if($message->type == '0')
                        <!-- send from owner -->
                        @if($message->messageFrom->permission == 2)

                        @if($key == 0 || $avatar || ($offer->messages[$key]->messageFrom->id != $offer->messages[$key-1]->messageFrom->id))
                        <div class="text-center" style="width:100%;position: relative; bottom: -30px; color: #9a9a9a">{{$message->created_at->format('Y-m-d')}}</div>
                        <div>
                            
                            @if(isset($offer->messages[$key]->messageFrom->attachment->path))
                            <img class='img-circle' style="width:40px" src="{{url('public/upload')}}/{{$offer->messages[$key]->messageFrom->attachment->path}}">
                            @else
                            <img class='img-circle' style="width:40px" src="{{url('public/design/adminlte/dist/img/avatar5.png')}}">
                            @endif
                           <span class="message-owner">{{$offer->messages[$key]->messageFrom->name}}</span>
                            
                        </div>
                        @endif

                        <div class="panel panel-default message" style="width:70%; margin-right:0 !important; margin-bottom: 6px;background-color:#3578e5; border-radius: 40px; border: 1px solid #d1dfec;">
                            <div class="panel-body" style="color:#FFF !important">
                                {{$message->content}}
                                <span class="time">{{$message->created_at->format('h:i a')}}</span>
                            </div>
                        </div>
                        <!-- send from company -->
                        @elseif($message->messageFrom->permission == 3)

                        @if($key == 0 || $avatar || ($offer->messages[$key]->messageFrom->id != $offer->messages[$key-1]->messageFrom->id))
                        <div class="text-center" style="width:100%;position: relative; bottom: -30px; color: #9a9a9a">{{$message->created_at->format('Y-m-d')}}</div>
                        <div class="text-left" style="width:100%">
                            <span class="message-owner">{{$offer->messages[$key]->messageFrom->name}}</span>
                            @if(isset($offer->messages[$key]->messageFrom->attachment->path))
                            <img class='img-circle' style="width:40px" src="{{url('public/upload')}}/{{$offer->messages[$key]->messageFrom->attachment->path}}">
                            @else
                            <img class='img-circle' style="width:40px" src="{{url('public/design/adminlte/dist/img/engineer.png')}}">
                            @endif
                            
                        </div>
                        @endif

                        <div class="panel panel-default message" style="width:70%; margin-right:auto !important; margin-bottom: 6px;background-color:#EEE; border-radius: 40px; border: 1px solid #d1dfec;">
                            <div class="panel-body">
                                {{$message->content}}
                                <span class="time">{{$message->created_at->format('h:i a')}}</span>
                            </div>
                        </div>
                        @endif

                        <!-- check if it is attachment -->
                        @else
                        <!-- send from owner -->
                        @if($message->messageFrom->permission == 2)
                        @if($key == 0 || $avatar || ($offer->messages[$key]->messageFrom->id != $offer->messages[$key-1]->messageFrom->id))
                        <div class="text-center" style="width:100%;position: relative; bottom: -30px; color: #9a9a9a">{{$message->created_at->format('Y-m-d')}}</div>
                        <div>
                            @if(isset($offer->messages[$key]->messageFrom->attachment->path))
                            <img class='img-circle' style="width:40px" src="{{url('public/upload')}}/{{$offer->messages[$key]->messageFrom->attachment->path}}">
                            @else
                            <img class='img-circle' style="width:40px" src="{{url('public/design/adminlte/dist/img/avatar5.png')}}">
                            @endif
                            <span class="message-owner">{{$offer->messages[$key]->messageFrom->name}}</span>
                        </div>
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
                        @if($key == 0 || $avatar || ($offer->messages[$key]->messageFrom->id != $offer->messages[$key-1]->messageFrom->id))
                        <div class="text-center" style="width:100%;position: relative; bottom: -30px; color: #9a9a9a">{{$message->created_at->format('Y-m-d')}}</div>
                        <div class="text-left" style="width:100%">
                            <span class="message-owner">{{$offer->messages[$key]->messageFrom->name}}</span>
                            @if(isset($offer->messages[$key]->messageFrom->attachment->path))
                            <img class='img-circle' style="width:40px" src="{{url('public/upload')}}/{{$offer->messages[$key]->messageFrom->attachment->path}}">
                            @else
                            <img class='img-circle' style="width:40px" src="{{url('public/design/adminlte/dist/img/engineer.png')}}">
                            @endif
                            
                        </div>
                        @endif
                        <div>
                            <div class="panel panel-default message" style="width:70%; margin-right:auto !important; margin-bottom: 6px;background-color:#FFF;     border-radius: 40px; border: 1px solid #d1dfec; ">
                                <div class="panel-body">
                                    <a href="{{url('public/upload')}}/{{$message->attachment->path}}" target="_blank">
                                        {{$message->attachment->name}}
                                    </a>
                                    <span class="time">{{$message->created_at->format('h:i a')}}</span>
                                </div>
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


<!------------------------------------------------------------------>

@if(Auth::user()->permission == 2 || ($offer->communication_status == 1 && empty($offer->muted_user_id)))
<div class="container" style="margin-top: -55px; margin-bottom:80px">
    <div class="row animatee color">
        <div class="col-md-12">
            <div class="well well-sm" style="background:#FFF">
                <h2>

                    انشاء رساله
                </h2>
                <hr class="">
                <div class="row">

                    <div class="cont-center">
                        <div class="form-group" style="margin-top:10px">
                            <label for="content">

                                محتوى الرساله
                            </label>
                            <textarea id="content" class="form-control" rows="6" placeholder="محتوى الرساله"></textarea>
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
                            <input type="file" class="form-control" id="attachments" placeholder="الملحقات" multiple />
                            @if ($errors->has('attachments.*'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('attachments.*') }}</strong>
                            </span>
                            @endif
                        </div>
                        <br>
                        <div class="">
                            <button type="button" style="margin:20px 0; margin-top:10px" class="btn btn-primary pull-right" id="send-msg">
                                ارسال
                            </button>
                        </div>
                    </div>


                </div>
            </div>
        </div>

    </div>
</div>
@endif

<!------------------------------------------------------------------>

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
    
    @if($offer->project->evaluation_status == 1)
    $("#rate-to-owner").rate({
        length: 5,
        value: {{$offer->project->rating->rating_to_owner}},
        readonly: true,
        size: '48px',
        selectClass: 'fxss_rate_select',
        incompleteClass: 'fxss_rate_no_all_select',
        customClass: 'custom_class',
        callback: function(object) {
            //            console.log(object);
        }
    });
    
    
    $("#rate-to-company").rate({
        length: 5,
        value: {{$offer->project->rating->rating_to_company}},
        readonly: true,
        size: '48px',
        selectClass: 'fxss_rate_select',
        incompleteClass: 'fxss_rate_no_all_select',
        customClass: 'custom_class',
        callback: function(object) {
            //            console.log(object);
        }
    });
    @endif

</script>

<script>
    $(document).ready(function() {


        function createMsg() {
            const attachments = document.getElementById('attachments');
            const send_msg = document.getElementById('send-msg');
            //    console.log(attachments.files);
            const formData = new FormData();
            formData.append("_token", "{{ csrf_token() }}");
            formData.append("content", $('#content').val());
            for (const file of attachments.files) {
                formData.append("attachments[]", file);
            }


            $.ajax({
                url: "{{url('messages').'/'.$offer->id}}",
                method: 'POST',
                data: formData,
                contentType: false,
                processData: false,
                success: function(data) {
                    for (i in data) {
                        if (i == 'success') {
                            console.log(data.data);
                            $('#newmsg').append(data.data);
                            $('#content').val('');
                            $('#attachments').val('');
                        }

                    }
                }
            })

        }





        $(document).on('click', '#send-msg', function() {
            createMsg();
        });


        function checkMsgOtherSend() {
            $.ajax({
                url: "{{url('message/othersend').'/'.$offer->id}}",
                method: 'GET',
                success: function(data) {
                    for (i in data) {
                        if (i == 'success') {
                            $('#newmsg').append(data.data);
                        }

                    }
                }
            })

        }

        window.setInterval(function() {
            checkMsgOtherSend();
        }, 5000);


    });

</script>

<script>
    $(document).ready(function() {


    });

</script>

@endsection
