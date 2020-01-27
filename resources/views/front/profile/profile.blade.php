@extends('front.layout.master')

@section('title')
بياناتى
@endsection

@section('header')
<link rel="stylesheet" href="{{url('public/design/mandoby/fxss-rate/rate.css')}}">
<style>
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
    
    
    
    
    
    th {
        display: none
    }

    .first-td {
        display: none
    }

    .table>tbody>tr>td {
        padding: 0
    }

    .panel-default {
        border: none !important
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
        margin-bottom: 30px;
        box-shadow: none !important
    }

    .panel-body {
        padding-top: 30px
    }

    td {
        background: none !important;
        border-top: none !important;
        border-bottom: none !important;
        border-right: none !important;
    }

    .table-bordered>tbody>tr>td {
        border-left: none
    }

    .table-striped>tbody>tr:nth-of-type(odd) {
        background: none !important
    }

    table.dataTable.no-footer {
        border-left: none
    }

    .dataTables_length {
        display: none
    }

    #example_filter {
        display: none
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
        font-size: 34px !important
    }
    
    .project-rev svg.icon {
        font-size: 32px !important
    }

    .img-center{    width: 100%;
    text-align: center;
    position: absolute;
    top: -106px;
/*    left: 84px;*/
    }
</style>
@endsection

@section('content')
<div class="re-size-more" style=" margin-top:320px" id="milestone">
    <div class="container" style="">
        <div class="row animatee">
            <div class="col-md-12">
                <div class="panel panel-default">
              
                    <div class="panel-heading" >
                        <span>
                        <i class="fa fa-user" style="margin-left: 12px;"></i>
                        بياناتى
                        </span>

<!--
                        <span style="float:left">
                        <i class="fa fa-money" style="margin-left: 8px;"></i>
                        {{Auth::user()->balance}} ريال سعودى
                        </span>
-->
                        <div style="position:relative;">
                            <div class="img-center">
                                @if(empty(Auth::user()->attachment_id))
                                <img src="{{url('public/design/adminlte/dist/img/avatar.png')}}"  class='img-circle'  style="max-width:150px">
                                @else
                                <img src="{{url('public/upload')}}/{{Auth::user()->attachment->path}}" style="max-width:150px;    max-height: 170px;" class='img-circle'>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">

                    <form method="post" action="{{url('myprofile')}}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <input name="_method" type="hidden" value="PATCH" />
                        
                        @if(Auth::user()->type == 1 || Auth::user()->type == 2)
                        <div class="col-sm-12" style="margin-top:30px">
                            <div style="width:100%; margin:0 auto">
                                
                            <div style="width:100%; margin:0 auto">
                                <label>الاسم</label>
                                <input class="form-control" name="name" value="{{Auth::user()->name}}" required>
                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                            @if(Auth::user()->type == 1)
                            <div style="width:100%; margin:30px auto">
                                <label>الاسم بالانجليزى</label>
                                <input class="form-control" name="en_name" value="{{Auth::user()->company->en_name}}" required>
                                @if ($errors->has('en_name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('en_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                            @else
                            <div style="width:100%; margin:30px auto">
                                <label>الاسم بالانجليزى</label>
                                <input class="form-control" name="en_name" value="{{Auth::user()->institute->en_name}}" required>
                                @if ($errors->has('en_name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('en_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                            @endif
                            
                            @if(Auth::user()->type == 1)
                            <div class="col-sm-6" style="padding-left:0; margin:30px auto; margin-top:0">
                                <label>ممثل الجهة</label>
                                <input class="form-control" name="representative" value="{{Auth::user()->company->representative}}" required>
                                @if ($errors->has('representative'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('representative') }}</strong>
                                    </span>
                                @endif
                            </div>
                                
                            <div class="col-sm-6" style="padding-right:0; margin:30px auto; margin-top:0">
                                <label>السجل التجاري</label>
                                <input class="form-control" name="commercial_reg" value="{{Auth::user()->company->commercial_reg}}" required>
                                @if ($errors->has('commercial_reg'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('commercial_reg') }}</strong>
                                    </span>
                                @endif
                            </div>
                                
                            <div class="col-sm-12" style="padding:0; margin:30px auto; margin-top:0">
                                <label>نبذة عن المنشأة</label>
                                <textarea class="form-control" name="notes" rows="10"  style="font-size:19px">{{Auth::user()->company->notes}}
                                </textarea>
                                @if ($errors->has('notes'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('notes') }}</strong>
                                    </span>
                                @endif
                            </div>
                                
                            <div class="col-sm-6" style="padding-left:0; margin:30px auto; margin-top:0">
                                <label>اسم العائله</label>
                                <input class="form-control" name="contact_fname" value="{{Auth::user()->company->contact_fname}}" required>
                                @if ($errors->has('contact_fname'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('contact_fname') }}</strong>
                                    </span>
                                @endif
                            </div>
                                
                            <div class="col-sm-6" style="padding-right:0; margin:30px auto; margin-top:0">
                                <label>الاسم الاول</label>
                                <input class="form-control" name="contact_lname" value="{{Auth::user()->company->contact_lname}}" required>
                                @if ($errors->has('contact_lname'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('contact_lname') }}</strong>
                                    </span>
                                @endif
                            </div>
                                
                            <div class="col-sm-6" style="padding-left:0; margin:30px auto; margin-top:0">
                                <label>مواقع التواصل الاجتماعي</label>
                                <input class="form-control" name="contact_social" value="{{Auth::user()->company->contact_social}}" required>
                                @if ($errors->has('contact_social'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('contact_social') }}</strong>
                                    </span>
                                @endif
                            </div>
                                
                            <div class="col-sm-6" style="padding-right:0; margin:30px auto; margin-top:0">
                                <label>البريد الالكتروني</label>
                                <input class="form-control" name="email" value="{{Auth::user()->email}}" required>
                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div style="width:100%; margin:30px auto">
                                <label>الموقع الالكترونى</label>
                                <input class="form-control" name="website" value="{{Auth::user()->company->website}}" required >
                                @if ($errors->has('website'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('website') }}</strong>
                                    </span>
                                @endif
                            </div>
                                
                            <div class="col-sm-6" style="padding-left:0; margin:0px auto; margin-top:0">
                                <label>رقم الجوال</label>
                                <input class="form-control" name="phone" value="{{Auth::user()->company->phone}}" required>
                                @if ($errors->has('phone'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                @endif
                            </div>
                                
                            <div class="col-sm-6" style="padding-right:0; margin:30px auto; margin-top:0">
                                <label>المدينه</label>
                                <select class="form-control" name="city" style="font-size:19px">
                                    @foreach(ksaCities() as $key => $val)
                                    <option value="{{$key}}" {{Auth::user()->company->city == $key ? 'selected' : ''}}>{{$val}}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('city'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('city') }}</strong>
                                    </span>
                                @endif
                            </div>
                                
                            @else
                                
                            <div class="col-sm-6" style="padding-left:0; margin:30px auto; margin-top:0">
                                <label>ممثل الجهة</label>
                                <input class="form-control" name="representative" value="{{Auth::user()->institute->representative}}" required>
                                @if ($errors->has('representative'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('representative') }}</strong>
                                    </span>
                                @endif
                            </div>
                                
                            <div class="col-sm-6" style="padding-right:0; margin:30px auto; margin-top:0">
                                <label>السجل التجاري</label>
                                <input class="form-control" name="commercial_reg" value="{{Auth::user()->institute->commercial_reg}}" required>
                                @if ($errors->has('commercial_reg'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('commercial_reg') }}</strong>
                                    </span>
                                @endif
                            </div>
                                
                            <div class="col-sm-12" style="padding:0; margin:30px auto; margin-top:0">
                                <label>نبذة عن المنشأة</label>
                                <textarea class="form-control" name="notes" rows="10"  style="font-size:19px">{{Auth::user()->institute->notes}}
                                </textarea>
                                @if ($errors->has('notes'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('notes') }}</strong>
                                    </span>
                                @endif
                            </div>
                                
                            <div class="col-sm-6" style="padding-left:0; margin:30px auto; margin-top:0">
                                <label>اسم العائله</label>
                                <input class="form-control" name="contact_fname" value="{{Auth::user()->institute->contact_fname}}" required>
                                @if ($errors->has('contact_fname'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('contact_fname') }}</strong>
                                    </span>
                                @endif
                            </div>
                                
                            <div class="col-sm-6" style="padding-right:0; margin:30px auto; margin-top:0">
                                <label>الاسم الاول</label>
                                <input class="form-control" name="contact_lname" value="{{Auth::user()->institute->contact_lname}}" required>
                                @if ($errors->has('contact_lname'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('contact_lname') }}</strong>
                                    </span>
                                @endif
                            </div>
                                
                            <div class="col-sm-6" style="padding-left:0; margin:30px auto; margin-top:0">
                                <label>مواقع التواصل الاجتماعي</label>
                                <input class="form-control" name="contact_social" value="{{Auth::user()->institute->contact_social}}" required>
                                @if ($errors->has('contact_social'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('contact_social') }}</strong>
                                    </span>
                                @endif
                            </div>
                                
                            <div class="col-sm-6" style="padding-right:0; margin:30px auto; margin-top:0">
                                <label>البريد الالكتروني</label>
                                <input class="form-control" name="email" value="{{Auth::user()->email}}" required>
                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div style="width:100%; margin:30px auto">
                                <label>الموقع الالكترونى</label>
                                <input class="form-control" name="website" value="{{Auth::user()->institute->website}}" required >
                                @if ($errors->has('website'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('website') }}</strong>
                                    </span>
                                @endif
                            </div>
                                
                            <div class="col-sm-6" style="padding-left:0; margin:0px auto; margin-top:0">
                                <label>رقم الجوال</label>
                                <input class="form-control" name="phone" value="{{Auth::user()->institute->phone}}" required>
                                @if ($errors->has('phone'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                @endif
                            </div>
                                
                            <div class="col-sm-6" style="padding-right:0; margin:30px auto; margin-top:0">
                                <label>المدينه</label>
                                <select class="form-control" name="city" required  style="font-size:19px">
                                    @foreach(ksaCities() as $key => $val)
                                    <option value="{{$key}}" {{Auth::user()->institute->city == $key ? 'selected' : ''}}>{{$val}}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('city'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('city') }}</strong>
                                    </span>
                                @endif
                            </div>
                            @endif
                            
                            <div class="form-group" style="width:100%; margin:30px auto">
                                <i class="fa fa-paperclip" aria-hidden="true" style="margin-left: 4px;"></i>
                                <label for="attachment">

                                    صوره شخصيه
                                </label>
                                <input type="file" class="form-control" name="attachment" id="attachment" placeholder="صوره شخصيه"  />
                                @if ($errors->has('attachment'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('attachment') }}</strong>
                                </span>
                                @endif
                            </div>
                                
                            <div style="width:100%; margin:30px auto">
                                <label>الرقم السري</label>
                                <input type="password" class="form-control" name="password" autocomplete="new-password"  >
                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                            
                            <div style=" margin:30px auto">
                                <label>تأكيد الرقم السري</label>
                                <input type="password" class="form-control" name="password_confirmation" autocomplete="new-password"  >
                            </div>

                            <div style="width:100%; margin:30px auto" >
                                <button type="submit" style="margin:20px 0; margin-top:10px" class="btn btn-primary pull-right" id="send-msg">
                                    تغيير بياناتى
                                </button>
                            </div>
                            </div>
                        </div>
                        @else
                        <div class="col-sm-12" style="margin-top:30px">
                            <!-- if project awarded to this company -->
                            <div style="width:90%; margin:0 auto">
                                <label>الاسم</label>
                                <input class="form-control" name="name" value="{{Auth::user()->name}}" required>
                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                            @if(Auth::user()->permission == 2 )
                            <div style="width:90%; margin:30px auto">
                                <label>اسم العائله</label>
                                <input class="form-control" name="last_name" value="{{Auth::user()->owner->last_name}}" required>
                                @if ($errors->has('last_name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('last_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                            
                            <div style="width:90%; margin:30px auto">
                                <label>رقم الجوال</label>
                                <input class="form-control" type="number" name="phone" value="{{Auth::user()->owner->phone}}" required>
                                @if ($errors->has('phone'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                @endif
                            </div>                       
                            
                            @else
                            <div style="width:90%; margin:30px auto">
                                <label>اسم العائله</label>
                                <input class="form-control" name="last_name" value="{{Auth::user()->personal->last_name}}" required>
                                @if ($errors->has('last_name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('last_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                            
                            <div style="width:90%; margin:30px auto">
                                <label>رقم الجوال</label>
                                <input class="form-control" name="phone" value="{{Auth::user()->personal->phone}}" required>
                                @if ($errors->has('phone'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                @endif
                            </div>
                                                    
                            @endif

                            <div style="width:90%; margin:30px auto">
                                <label>البريد الالكترونى</label>
                                <input class="form-control" name="email" value="{{Auth::user()->email}}" required >
                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                            @if(Auth::user()->permission == 3)
                            <div style="width:90%; margin:30px auto">
                                <label>نبذة مختصره</label>
                                <textarea class="form-control" name="notes" rows="10"  style="font-size:19px">{{Auth::user()->personal->notes}}
                                </textarea>
                                @if ($errors->has('notes'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('notes') }}</strong>
                                    </span>
                                @endif
                            </div>
                            @endif
                            
                            <div class="form-group" style="width:90%; margin:30px auto">
                                <i class="fa fa-paperclip" aria-hidden="true" style="margin-left: 4px;"></i>
                                <label for="attachment">

                                    صوره شخصيه
                                </label>
                                <input type="file" class="form-control" name="attachment" id="attachment" placeholder="صوره شخصيه"  />
                                @if ($errors->has('attachment'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('attachment') }}</strong>
                                </span>
                                @endif
                            </div>
                            
                            <div style="width:90%; margin:30px auto">
                                <label>الرقم السري</label>
                                <input type="password" class="form-control" name="password" autocomplete="new-password"  >
                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                            
                            <div style="width:90%; margin:30px auto">
                                <label>تأكيد الرقم السري</label>
                                <input type="password" class="form-control" name="password_confirmation" autocomplete="new-password"  >
                            </div>

                            <div style="width:90%; margin:30px auto" >
                                <button type="submit" style="margin:20px 0; margin-top:10px" class="btn btn-primary pull-right" id="send-msg">
                                    تغيير بياناتى
                                </button>
                            </div>
                        </div>
                        @endif

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>






<!--------------- reviews ------------->
<div class="container re-size-less" style="margin-bottom:40px">
    <div class="row">
        <div class="col-md-12">
            <div class="row ">
                <section class="data-table" >
                    <div class="row">
                        <div class="container">
                            <div class="panel panel-primary" style="margin-top:40px">
                                <div class="panel-heading" style="background:none !important; color: #000 !important">
                                    <span  class="col-sm-3" id="rateBox" style="margin-top:-47px"></span>
                                    <span class="col-sm-4 col-sm-offset-5" style="margin-top:-10px">التقييمات</span>
                                </div>
                                
                                <div class="panel-body" style="width:95%; margin:0 auto; border:none !important">
                                    <table id="example" class="table table-striped table-bordered  no-footer" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>id</th>
                                                <th>content</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                             $projects = Auth::user()->permission == 2 ? Auth::user()->projectOwners : Auth::user()->projectCompanies;
                                            
                                            $comment = Auth::user()->permission == 2 ? 'comment_to_owner' : 'comment_to_company';
                                            $rate = Auth::user()->permission == 2 ? 'rating_to_owner' : 'rating_to_company';
                                            
                                            ?>
                                            @foreach ($projects->where('evaluation_status', 1) as $key => $project)
                                            <tr class="">
                                                <td class="first-td">{{$project->rating->id}}</td>
                                                <td style="width:100%; height:100%">
                                                    <a href="#" style="text-decoration:none;color:#000" >
                                                        <div class="panel panel-default">
                                                            <div class="panel-heading"><i class="fa fa-building" style="margin-left: 12px;"></i>{{$project->title}}</div>
                                                            <div class="panel-body">
                                                                <div class="col-sm-4">

                                                                </div>
                                                                <div class="col-sm-8" style="color:#75787d;overflow-wrap: break-word; word-break: break-word; word-wrap: break-word;">
                                                                    {{$project->rating->$comment}}
                                                                </div>

                                                                <div class="col-sm-12" style="margin-top:30px">
                                                                    <span  class="project-rev" id="project-{{$project->id}}" ></span>
                                                                </div>
<!--
                                                                <div  class="col-sm-12" style="margin-top:20px">
                                                                    <div class="col-sm-12" style="padding:0">
                                                                       <b style="color:#75787d; margin-left:3px">العروض</b> <b>{{$project->offers->count()}}</b>
                                                                    </div>
                             
                                                                </div>
-->
                                                                
                                                                <div class="col-sm-4" style="margin-top:20px; direction:ltr">
                                                                    {{$project->rating->updated_at->format('h:i a')}}
                                                                </div>
                                                                <div class="col-sm-8" style="margin-top:20px">
                                                                    {{$project->rating->updated_at->format('Y-m-d')}}
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </td>

                                            </tr>
                                            @endforeach

                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>id</th>
                                                <th>content</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>

                        </div>
                    </div>
                </section>
            </div>
        </div>

    </div>
</div>

@endsection



@section('footer')
<script src="{{url('public/design/mandoby/fxss-rate/rate.js')}}"></script>

<script>
    $("#rateBox").rate({
        length: 5,
        value: "{{Auth::user()->rating}}",
        readonly: true,
        size: '48px',
        selectClass: 'fxss_rate_select',
        incompleteClass: 'fxss_rate_no_all_select',
        customClass: 'custom_class',
        callback: function(object) {
            //            console.log(object);
            $('#rate').val(object.index + 1);
        }
    });
    
    
@foreach ($projects->where('evaluation_status', 1) as $key => $project)
    var id = "{{$project->id}}";
    $("#project-"+id).rate({
        length: 5,
        value: "{{$project->rating->$rate}}",
        readonly: true,
        size: '48px',
        selectClass: 'fxss_rate_select',
        incompleteClass: 'fxss_rate_no_all_select',
        customClass: 'custom_class',
        callback: function(object) {
            //            console.log(object);
            $('#rate').val(object.index + 1);
        }
    });
@endforeach
</script>

<script>
    $(function() {
        $('#example').DataTable({
            "language": {
                "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Arabic.json",
            },
            "order": [
                [0, "desc"]
            ],
        });
    });

</script>

@endsection
