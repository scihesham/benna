@extends('front.layout.master')

@section('title')
{{$project->title}}
@endsection

@section('header')
<style>
    svg {
        width: 50px;
        color: #aaa
    }

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

    #create hr {
        display: none
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


        <div class="col-md-3">
            <div style="position: absolute;" class="hide-991">
                <div class="col-md-12" style="padding-right:0">
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


                <div class="col-md-12" style="padding-right:0">
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
        </div>


        <div class="col-md-9">
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



<div class="container" style="margin-top: -55px;">
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-9 ">
            <div class="col-xs-6 text-center">
                <a href="https://twitter.com/intent/tweet?text={{url('/')}}/offer/project/{{$project->id}}" target="_blank">
                    <svg aria-hidden="true" focusable="false" data-prefix="fab" data-icon="twitter" class="svg-inline--fa fa-twitter fa-w-16 fa-2x " role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                        <path fill="currentColor" d="M459.37 151.716c.325 4.548.325 9.097.325 13.645 0 138.72-105.583 298.558-298.558 298.558-59.452 0-114.68-17.219-161.137-47.106 8.447.974 16.568 1.299 25.34 1.299 49.055 0 94.213-16.568 130.274-44.832-46.132-.975-84.792-31.188-98.112-72.772 6.498.974 12.995 1.624 19.818 1.624 9.421 0 18.843-1.3 27.614-3.573-48.081-9.747-84.143-51.98-84.143-102.985v-1.299c13.969 7.797 30.214 12.67 47.431 13.319-28.264-18.843-46.781-51.005-46.781-87.391 0-19.492 5.197-37.36 14.294-52.954 51.655 63.675 129.3 105.258 216.365 109.807-1.624-7.797-2.599-15.918-2.599-24.04 0-57.828 46.782-104.934 104.934-104.934 30.213 0 57.502 12.67 76.67 33.137 23.715-4.548 46.456-13.32 66.599-25.34-7.798 24.366-24.366 44.833-46.132 57.827 21.117-2.273 41.584-8.122 60.426-16.243-14.292 20.791-32.161 39.308-52.628 54.253z"></path>
                    </svg>
                </a>
            </div>

            <div class="col-xs-6 text-center">
                <a href="whatsapp://send?text={{url('/')}}/offer/project/{{$project->id}}">
                    <svg aria-hidden="true" focusable="false" data-prefix="fab" data-icon="whatsapp" class="svg-inline--fa fa-whatsapp fa-w-14 fa-2x " role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                        <path fill="currentColor" d="M380.9 97.1C339 55.1 283.2 32 223.9 32c-122.4 0-222 99.6-222 222 0 39.1 10.2 77.3 29.6 111L0 480l117.7-30.9c32.4 17.7 68.9 27 106.1 27h.1c122.3 0 224.1-99.6 224.1-222 0-59.3-25.2-115-67.1-157zm-157 341.6c-33.2 0-65.7-8.9-94-25.7l-6.7-4-69.8 18.3L72 359.2l-4.4-7c-18.5-29.4-28.2-63.3-28.2-98.2 0-101.7 82.8-184.5 184.6-184.5 49.3 0 95.6 19.2 130.4 54.1 34.8 34.9 56.2 81.2 56.1 130.5 0 101.8-84.9 184.6-186.6 184.6zm101.2-138.2c-5.5-2.8-32.8-16.2-37.9-18-5.1-1.9-8.8-2.8-12.5 2.8-3.7 5.6-14.3 18-17.6 21.8-3.2 3.7-6.5 4.2-12 1.4-32.6-16.3-54-29.1-75.5-66-5.7-9.8 5.7-9.1 16.3-30.3 1.8-3.7.9-6.9-.5-9.7-1.4-2.8-12.5-30.1-17.1-41.2-4.5-10.8-9.1-9.3-12.5-9.5-3.2-.2-6.9-.2-10.6-.2-3.7 0-9.7 1.4-14.8 6.9-5.1 5.6-19.4 19-19.4 46.3 0 27.3 19.9 53.7 22.6 57.4 2.8 3.7 39.1 59.7 94.8 83.8 35.2 15.2 49 16.5 66.6 13.9 10.7-1.6 32.8-13.4 37.4-26.4 4.6-13 4.6-24.1 3.2-26.4-1.3-2.5-5-3.9-10.5-6.6z"></path>
                    </svg>
                </a>
            </div>
        </div>
    </div>
</div>



<div class="container" style="margin-top: 30px; margin-bottom:80px">
    <div class="row animatee color">
        <div class="col-md-3"></div>
        <div class="col-md-9">
            <div class="well well-sm">
                <form method="post" action="{{url('offer/project').'/'.$project->id}}" enctype="multipart/form-data">
                    {{ csrf_field() }}
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
                                <textarea name="desc" id="desc" class="form-control" rows="9" cols="25" placeholder="تفاصيل العرض " required style="font-size:20px"></textarea>
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

                            <hr style="border-top: 1px solid #cdded5;">
                            <center>
                                <h3>انشاء مراحل سعريه</h3>
                            </center>

                            <div class="form-group" id="create" style="margin-top: 30px;">


                                <div class="col-md-12 offer-val">
                                    <label for="values[]">
                                        السعر
                                    </label>
                                    <input name="values[]" id="values[]" max="9999999999" type="number" class="form-control" placeholder="السعر" required>
                                </div>
                                @if ($errors->has('values.*'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('values.*') }}</strong>
                                </span>
                                @endif
                                <div class="col-md-12">
                                    <label for="milestones[]">
                                        تفاصيل المرحله
                                    </label>
                                    <input name="milestones[]" id="milestones[]" class="form-control" placeholder="تفاصيل المرحله " required>
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

                            <div class="">
                                <button type="submit" style="margin:10px 0; margin-top: 40px" class="btn btn-primary pull-right" id="btnContactUs" onclick='return confirmAr()'>

                                    تقديم
                                </button>
                            </div>
                        </div>


                    </div>
                </form>
            </div>
        </div>

    </div>
</div>

<!--
<span style="position: fixed;  bottom: 10px;  z-index: 999;">
    <a href="whatsapp://send?text={{url('/')}}/offer/project/{{$project->id}}">
        <img width="100" height="100" src="{{url('public/images/icon-whatsapp.png')}}" data-src="https://cdn.shortpixel.ai/client/to_webp,q_glossy,ret_img,w_1000/https://best-gator.com/wp-content/uploads/2019/12/icon-whatsapp-png-27.png" class="attachment-large size-large lazyloaded" alt="" data-srcset="https://cdn.shortpixel.ai/client/to_webp,q_glossy,ret_img,w_1000/https://best-gator.com/wp-content/uploads/2019/12/icon-whatsapp-png-27.png 1000w, https://cdn.shortpixel.ai/client/q_glossy,ret_img,w_300/https://best-gator.com/wp-content/uploads/2019/12/icon-whatsapp-png-27-300x300.png 300w, https://cdn.shortpixel.ai/client/q_glossy,ret_img,w_150/https://best-gator.com/wp-content/uploads/2019/12/icon-whatsapp-png-27-150x150.png 150w, https://cdn.shortpixel.ai/client/q_glossy,ret_img,w_768/https://best-gator.com/wp-content/uploads/2019/12/icon-whatsapp-png-27-768x768.png 768w" data-sizes="(max-width: 1000px) 100vw, 1000px" sizes="(max-width: 1000px) 100vw, 1000px" srcset="https://cdn.shortpixel.ai/client/to_webp,q_glossy,ret_img,w_1000/https://best-gator.com/wp-content/uploads/2019/12/icon-whatsapp-png-27.png 1000w, https://cdn.shortpixel.ai/client/q_glossy,ret_img,w_300/https://best-gator.com/wp-content/uploads/2019/12/icon-whatsapp-png-27-300x300.png 300w, https://cdn.shortpixel.ai/client/q_glossy,ret_img,w_150/https://best-gator.com/wp-content/uploads/2019/12/icon-whatsapp-png-27-150x150.png 150w, https://cdn.shortpixel.ai/client/q_glossy,ret_img,w_768/https://best-gator.com/wp-content/uploads/2019/12/icon-whatsapp-png-27-768x768.png 768w">
    </a>
</span>
-->
<!--==========================================================-->
@endsection


@section('footer')
<script>
    $(document).ready(function() {

        var i = 1;
        $('#add').click(function() {
            i++;
            $('#create').append('<hr><div id="row' + i + '"><div class="form-group append" style="margin-top:10px">' + '<div class="col-md-offset-11 col-md-1"><button type="button" name="remove" id="' + i + '" class="btn btn-danger btn_remove" style="position:relative; top:27px">X</button></div>' + '<div class=" col-md-12 offer-val" style="margin-top: 22px;"><label for="values[]"> السعر</label><input name="values[]" id="values[]" type="number" class="form-control" max="9999999999" placeholder="السعر"  required></div>' + '<div class="col-md-12" style=""><label for="milestones[]">تفاصيل المرحله  </label><input name="milestones[]" id="milestones[]" class="form-control" placeholder="تفاصيل المرحله " required></div></div>');

        });



        $(document).on('click', '.btn_remove', function() {
            var button_id = $(this).attr("id");
            $('#row' + button_id + '').remove();
            $(this).remove();
        });

    });

</script>

@endsection
