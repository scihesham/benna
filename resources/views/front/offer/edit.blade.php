@extends('front.layout.master')

@section('title')
{{$offer->project->title}}
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
    
    #row2{margin-top: -40px}
    
    .pro-detail{
         margin-bottom: 8px; color: #716565
    }
    .pro-res{
       font-size:25px;
       margin-bottom: 27px;
    }

</style>
@endsection

@section('content')

<!--==================================================-->

<div class="container re-size" style="margin-top: 260px; margin-bottom:80px; font-size:17px">
    <div class="row animatee">
        
<!----------------->
                <div class="col-md-12 hide-def" >
                <div class="panel panel-default" style="font-family: 'Cairo', sans-serif !important; width:100%">
                    <div class="panel-heading"><i class="fa fa-tag" style="margin-left: 12px;"></i>{{projectCategories()[$offer->project->category]}}</div>
                    <div class="panel-body" style="text-align:center">

                        <div class="pro-detail">
                            <b>عدد العروض المقدمه</b>
                        </div>
                        <div class="pro-res">
                           <b>{{$offer->project->offers->count()}}</b>
                        </div>
                        <hr>
                        <div class="pro-detail">
                            <b>عدد المشاهدات</b>
                        </div>
                        <div class="pro-res" >
                           <b>{{$offer->project->view_num}}</b>
                        </div>
                        <hr>
                        <div class="pro-detail">
                            <b>ميزانيه المشروع المتوقعه (ر.س.)</b>
                        </div>
                        <div class="pro-res">
                           <b>
                               @if($offer->project->expectbudget != null)
                                {{$offer->project->expectbudget}}
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
                               @if($offer->project->expecttime != null)
                                {{$offer->project->expecttime}}
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
                            foreach($offer->project->offers as $project_offer){
                                $sum += $project_offer->milestones->sum('value');
                            }
                        ?>
                        <div class="pro-res">
                           <b> {{$sum / $offer->project->offers->count()}}</b>
                        </div>

                    </div>
                </div>
            </div>
        
        
        
                <div class="col-md-12 hide-def" >
                <div class="panel panel-default" style="font-family: 'Cairo', sans-serif !important; width:100%">
                    <div class="panel-heading"><i class="fa fa-user" style="margin-left: 12px;"></i>
                        <a href="{{url('reviews').'/'.$offer->owner->id}}" style="color:#FFF; text-decoration:none" target="_blank">{{$offer->owner->name}}</a>
                    </div>
                    <div class="panel-body" style="text-align:center">
                        
                        <div class="col-xs-4" style="font-size:22px; color:green">
                           <b>{{$offer->owner->projectOwners->where('status', '0')->count()}}</b>
                        </div>
                        <div class="col-xs-4" style="font-size:22px">
                            <b>{{$offer->owner->projectOwners->where('status', '1')->count()}}</b>
                        </div>
                        <div class="col-xs-4" style="font-size:22px">
                            <b>{{$offer->owner->projectOwners->where('status', '2')->count()}}</b>
                        </div>
                        
                        <div class="col-xs-12" style="padding:0">
                            <div class="col-xs-4" style="font-size:14px; color:#999999">مشاريع مفتوحه</div>
                            <div class="col-xs-4" style="font-size:14px; padding:0; color:#999999">مشاريع قيد التنفيذ</div>
                            <div class="col-xs-4" style="font-size:14px; color:#999999">مشاريع مكتمله</div>
                        </div>
                    </div>
                </div>
            </div>
<!----------------->
                
                
        <div class="col-md-3 hide-991">
            <div style="position: absolute;">
                <div class="col-md-12" style="padding-right:0">
                <div class="panel panel-default" style="font-family: 'Cairo', sans-serif !important; width:100%">
                    <div class="panel-heading"><i class="fa fa-tag" style="margin-left: 12px;"></i>{{projectCategories()[$offer->project->category]}}</div>
                    <div class="panel-body" style="text-align:center">

                        <div class="pro-detail">
                            <b>عدد العروض المقدمه</b>
                        </div>
                        <div class="pro-res">
                           <b>{{$offer->project->offers->count()}}</b>
                        </div>
                        <hr>
                        <div class="pro-detail">
                            <b>عدد المشاهدات</b>
                        </div>
                        <div class="pro-res" >
                           <b>{{$offer->project->view_num}}</b>
                        </div>
                        <hr>
                        <div class="pro-detail">
                            <b>ميزانيه المشروع المتوقعه (ر.س.)</b>
                        </div>
                        <div class="pro-res">
                           <b>
                               @if($offer->project->expectbudget != null)
                                {{$offer->project->expectbudget}}
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
                               @if($offer->project->expecttime != null)
                                {{$offer->project->expecttime}}
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
                            foreach($offer->project->offers as $project_offer){
                                $sum += $project_offer->milestones->sum('value');
                            }
                        ?>
                        <div class="pro-res">
                           <b> {{$sum / $offer->project->offers->count()}}</b>
                        </div>

                    </div>
                </div>
            </div>
            
            
                <div class="col-md-12" style="padding-right:0">
                <div class="panel panel-default" style="font-family: 'Cairo', sans-serif !important; width:100%">
                    <div class="panel-heading"><i class="fa fa-user" style="margin-left: 12px;"></i>
                        <a href="{{url('reviews').'/'.$offer->owner->id}}" style="color:#FFF; text-decoration:none" target="_blank">{{$offer->owner->name}}</a>
                    </div>
                    <div class="panel-body" style="text-align:center">
                        
                        <div class="col-md-4" style="font-size:22px; color:green">
                           <b>{{$offer->owner->projectOwners->where('status', '0')->count()}}</b>
                        </div>
                        <div class="col-md-4" style="font-size:22px">
                            <b>{{$offer->owner->projectOwners->where('status', '1')->count()}}</b>
                        </div>
                        <div class="col-md-4" style="font-size:22px">
                            <b>{{$offer->owner->projectOwners->where('status', '2')->count()}}</b>
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
        </div>
        <div class="col-md-9">
            <div class="panel panel-default">
                <div class="panel-heading"><i class="fa fa-building" style="margin-left: 12px;"></i>{{$offer->project->title}}</div>
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
                        <a href="{{url('public/upload')}}/{{\App\Attachment::find($val)->path}}" target="_blank" class="attach-link">
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



<div class="container" style="margin-top: -55px; margin-bottom:80px">
    <div class="row animatee color">
        <div class="col-md-3">
        </div>
        <div class="col-md-9">
            <div class="well well-sm">
                <form method="post" action="{{url('offer/project').'/'.$offer->id}}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <input name="_method" type="hidden" value="PATCH" />
                    <h2>

                        تقديم عرض الان
                    </h2>
                    <hr class="">
                    <div class="row">

                        <div class="cont-center">
                            <div class="form-group" style="margin-top:10px">
                                <label for="desc">

                                    تفاصيل العرض
                                </label>
                                <textarea name="desc" id="desc" class="form-control" rows="9" cols="25" placeholder="تفاصيل العرض " required style="font-size:18px">{{$offer->offer->desc}}</textarea>
                                @if ($errors->has('desc'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('desc') }}</strong>
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
                            <div class="form-group" style="font-size:18px">
                                @if(isset($offer->offer->attachment_id))
                                    @foreach(json_decode($offer->offer->attachment_id) as $val)
                                        @if(isset(\App\Attachment::find($val)->path))
                                        <a href="{{url('public/upload')}}/{{\App\Attachment::find($val)->path}}" target="_blank">
                                            <i class="fa fa-paperclip" aria-hidden="true" style="margin-left: 4px;"></i>
                                             {{\App\Attachment::find($val)->name}} <br>
                                        </a> 
                                        @endif
                                    @endforeach
                                @endif
                            </div>
                            
                            <hr style="border-top: 1px solid #cdded5;">
                            <center><h3>انشاء مراحل سعريه</h3></center>
                            
                            <div class="form-group" id="create" style="margin-top: 0px;">

                                <div class="col-sm-2 col-md-1">
                                </div>
                                <div class="col-sm-2 col-md-3">
   
                                </div>
                                @if ($errors->has('values.*'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('values.*') }}</strong>
                                </span>
                                @endif
                                <div class="col-sm-8"  style="padding:0">

                                </div>
                                @if ($errors->has('milestones.*'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('milestones.*') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div id="add" style="cursor:pointer">
                            <i class="fa fa-plus" aria-hidden="true" style="color: #7cbb29; font-size: 22px; margin-top: 10px;"></i>
                            </div>

                            <div class="" >
                                <button type="submit" style="margin:10px 0; margin-top: 40px" class="btn btn-primary pull-right" onclick='return confirmAr()'>

                                    تعديل
                                </button>
                            </div>
                        </div>


                    </div>
                </form>
            </div>
        </div>

    </div>
</div>

<!--==========================================================-->
@endsection


@section('footer')
<script>
    $(document).ready(function() {
        
        var i = 1;
        @foreach($offer->milestones as $milestone)
        i++;
        $('#create').append('<div id="row'+ i +'"><div class="form-group append" style="margin-top:0px">' +'<div class="col-md-offset-11 col-md-1"><button type="button" name="remove" id="' + i + '" class="btn btn-danger btn_remove" style="position:relative; top:27px">X</button></div>'+ '<div class="col-md-12 offer-val" style="margin-top: 22px;"><label for="values[]"> السعر</label><input name="values[]" id="values[]" style="" type="number" class="form-control" placeholder="السعر" value="{{$milestone->value}}" style="padding:0" required></div>'+ '<div class="col-md-12" style=""><label for="milestones[]">تفاصيل المرحله  </label><input name="milestones[]" id="milestones[]" class="form-control" placeholder="تفاصيل المرحله " value="{{$milestone->desc}}" required></div></div><br>');
        @endforeach
        
        $('#add').click(function() {
            i++;
            $('#create').append('<div id="row'+ i +'"><div class="form-group append" style="margin-top:0px">' +'<div class="col-md-offset-11 col-md-1"><button type="button" name="remove" id="' + i + '" class="btn btn-danger btn_remove" style="position:relative; top:27px">X</button></div>'+ '<div class="col-md-12 offer-val" style="margin-top: 22px;"><label for="values[]"> السعر</label><input name="values[]" id="values[]" style="" type="number" class="form-control" placeholder="السعر" required></div>'+ '<div class="col-md-12" style=""><label for="milestones[]">تفاصيل المرحله  </label><input name="milestones[]" id="milestones[]" class="form-control" placeholder="تفاصيل المرحله " required></div></div><br>');
        
        });


        
        $(document).on('click', '.btn_remove', function() {
            var button_id = $(this).attr("id");
            $('#row' + button_id + '').remove();
            $(this).remove();
        });
                
    });

</script> 

@endsection
