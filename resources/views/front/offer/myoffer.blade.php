@extends('front.layout.master')

@section('title')
عروضي
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
    
    .h-panels{
        margin-top: 280px
    }
    
    
    @media (max-width: 1199px) {
        .h-panels{
            margin-top: 80px !important
        }
    }
    
</style>
@endsection

@section('content')

<!--==================================================-->
@foreach($offers as $key => $offer)
<div class="container {{$key == '0' ? 'h-panels' : ''}}" style="margin-bottom:80px">
    <div class="row animatee color">
        <div class="" style="width:90%; margin: 0 auto">
            <div class="well well-sm">
                <form method="post" action="{{url('offer/project').'/'.$offer->id}}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <input name="_method" type="hidden" value="PATCH" />
                    <h2 >
                        <span class="" style="margin-right:15px">
                            <i class="fa fa-building" style="margin-left: 12px;"></i>
                        {{$offer->project->title}}
                        </span>
                        <span class="" style="float:left; margin-left:15px">
                        {{$offer->project->id}}
                            </span>
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
                            <div class="form-group">
                                @if(isset($offer->offer->attachment_id))
                                    @foreach(json_decode($offer->offer->attachment_id) as $val)
                                        @if(isset(\App\Attachment::find($val)->path))
                                        <a href="{{url('public/upload')}}/{{\App\Attachment::find($val)->path}}" target="_blank" class="attach-link">
                                            <i class="fa fa-paperclip" aria-hidden="true" style="margin-left: 4px;"></i>
                                             {{\App\Attachment::find($val)->name}} <br>
                                        </a> 
                                        @endif
                                    @endforeach
                                @endif
                            </div>
                            
                            <hr style="border-top: 1px solid #cdded5;">
                            <center><h3>انشاء مراحل سعريه</h3></center>
                            
                            <div class="form-group" id="create{{$offer->id}}" style="margin-top: 0px;">

                                <div class="col-sm-2">
                                </div>
                                <div class="col-sm-2">
   
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
                            <div class="add" style="cursor:pointer" data-offer="{{$offer->id}}">
                            <i class="fa fa-plus" aria-hidden="true" style="color: #7cbb29; font-size: 22px; margin-top: 10px;"></i>
                            </div>

                            <div class="" >
                                <button type="submit" style="margin:10px 0; margin-top: 40px" class="btn btn-primary pull-right" onclick='return confirmAr()' >

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
@endforeach
<!--==========================================================-->
@endsection


@section('footer')
<script>
    $(document).ready(function() {
        
        var i = 1;
        @foreach($offers as $offer)
        @foreach($offer->milestones as $milestone)
        i++;
        $('#create'+"{{$offer->id}}").append('<div id="row'+ i +'"><div class="form-group append" style="margin-top:55px">' +'<div class="col-xs-2"><button type="button" name="remove" id="' + i + '" class="btn btn-danger btn_remove" style="position:relative; top:27px">X</button></div>'+ '<div class="col-xs-2 offer-val"><label for="values[]"> السعر</label><input name="values[]" id="values[]" style="padding:0" type="number" class="form-control" placeholder="السعر" value="{{$milestone->value}}" style="padding:0" required></div>'+ '<div class="col-xs-8" style="padding:0"><label for="milestones[]">تفاصيل المرحله  </label><input name="milestones[]" id="milestones[]" class="form-control" placeholder="تفاصيل المرحله " value="{{$milestone->desc}}" required></div></div><br>');
        @endforeach
        @endforeach
        
        $('.add').click(function() {
//            alert($(this).data('offer'));
            i++;
            $( '#create'+ $(this).data('offer') ).append('<div id="row'+ i +'"><div class="form-group append" style="margin-top:55px">' +'<div class="col-xs-2"><button type="button" name="remove" id="' + i + '" class="btn btn-danger btn_remove" style="position:relative; top:27px">X</button></div>'+ '<div class="col-xs-2 offer-val"><label for="values[]"> السعر</label><input name="values[]" id="values[]" style="padding:0" type="number" class="form-control" placeholder="السعر" required></div>'+ '<div class="col-xs-8" style="padding:0"><label for="milestones[]">تفاصيل المرحله  </label><input name="milestones[]" id="milestones[]" class="form-control" placeholder="تفاصيل المرحله " required></div></div><br>');
        
        });


        
        $(document).on('click', '.btn_remove', function() {
            var button_id = $(this).attr("id");
            $('#row' + button_id + '').remove();
            $(this).remove();
        });
                
    });

</script> 

@endsection
