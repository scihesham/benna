@extends('front.layout.master')

@section('title')
@endsection

@section('header')
<style>
.help-block {
    margin-top: -25px !important;
    font-size: 20px;
    }
    textarea{
        resize: none
    }
    select.form-cotrol{
        font-size: 21px !important;
    }
    
    
@media only screen and (max-width: 767px) {
    .cont-nav.panel-heading{
         height: 281px;;
    }
}
    
</style>
@endsection

@section('content')

<?php
    if(isset($_GET['action'])){
       $action = $_GET['action'];
    }
    else{
        header("Location: ".url('/'));
        exit;
    }
?>


<div class="re-size fields" style=" margin-top:320px; margin-bottom:120px">
    <div class="container" style="">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">

                    <div class="panel-heading cont-nav">
                        @include('auth.contnav-reg')
                    </div>
                    @if($action == 'owner')
                    <div class="panel-body" style="padding-top:0">
                        <div class="">
                            <div class="non">
                                <div class="row">
                                    <form method="POST" action="{{url('register')}}?action=owner">
                                        {{ csrf_field() }}
                                        <input name="user_type" type="hidden" value="owner">
                                        <div class="col-sm-6">
                                            <label for="last_name">اسم العائلة</label>
                                            <input name="last_name" value="{{old('last_name')}}" type="text" required>

                                            @if ($errors->has('last_name'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('last_name') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                        <div class="col-sm-6">
                                            <label for="first_name">الاسم الأول</label>
                                            <input name="name" type="text" value="{{old('name')}}" required>
                                            @if ($errors->has('name'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('name') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                        <div class="col-sm-6">
                                            <label> رقم الجوال</label>
                                            <div class="field-container">

                                                <input class="input-field" name="phone" value="{{old('phone')}}" type="text" required>
                                                @if ($errors->has('phone'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('phone') }}</strong>
                                                </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <label for="email">البريد الالكترونى</label>
                                            <input class=" " id="" placeholder="" name="email" value="{{old('email')}}" type="email" autocomplete="off" required>
                                            <!-- For array -->
                                            @if ($errors->has('email'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                        <div class="col-sm-6">
                                            <label for="password_confirmation">تاكيد كلمه المرور</label>
                                            <input class=" " id="" placeholder="" name="password_confirmation" type="password" required>
                                        </div>
                                        <div class="col-sm-6">
                                            <label for="password">كلمه المرور</label>
                                            <input name="password" type="password" minlength="6" autocomplete="new-password" required>
                                            <!-- For array -->
                                            @if ($errors->has('password'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                        <div class="col-sm-12">
                                            <p style="font-family:ara">
                                                عند التسجيل بالموقع، فإنك توافق على
                                                <a href="#" class="" data-toggle="modal" data-target="#myModal">الشروط والاحكام</a>
                                                الخاصة بمنصة بناء كويك
                                            </p>

                                        </div>
                                        <div class="col-xs-6 text-left" style="padding-left:50px">
                                            <button class="btn btn-primary" type="submit" style="background-color:#7cbb29;padding-left:20px;padding-right:20px">تسجيل</button>
                                        </div>
                                        <div class="col-xs-6">
                                            <input type="checkbox" name="t_and_c" style="min-height: 15px !important; height: 15px !important;width:15px" required>
                                            <label style="color: #333 !important;position:relative;top:-4px;right:10px;">اوافق على الشروط والاحكام</label>
                                        </div>
                                    </form>
                                </div>
                                <!-- /.col -->
                            </div>
                        </div>

                    </div> <!-- end of def -->
                    
                    @elseif($action == 'personal')
                    <div class="">
                        <div class="">
                            <div class="row">
                                <div class="col-xs-12">
                                    <form method="POST" action="{{url('register?action=personal')}}">
                                        {{ csrf_field() }}
                                        <input name="user_type" type="hidden" value="personal">
                                        <div class="col-sm-6">
                                            <label for="last_name">اسم العائلة</label>
                                            <input name="last_name" type="text" value="{{old('last_name')}}" required>

                                            @if ($errors->has('last_name'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('last_name') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                        <div class="col-sm-6">
                                            <label for="first_name">الاسم الأول</label>
                                            <input name="name" type="text" value="{{old('first_name')}}" required>
                                            @if ($errors->has('name'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('name') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                        <div class="col-sm-6">
                                            <label> رقم الجوال</label>
                                            <div class="field-container">

                                                <input class="input-field" name="phone" type="text" value="{{old('phone')}}" required>
                                                @if ($errors->has('phone'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('phone') }}</strong>
                                                </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="col-sm-6">
                                            <label for="email">البريد الالكترونى</label>
                                            <input class=" " id="" placeholder="" name="email" type="email" value="{{old('email')}}" autocomplete="off" required>
                                            <!-- For array -->
                                            @if ($errors->has('email'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                        <div class="col-sm-12" style="margin-bottom:20px">
                                            <label for="notes">نبذة مختصره</label>

                                            <textarea class=" " id="" placeholder="" style="width:100%;font-size:24px" name="notes" cols="50" rows="7" required>{{old('notes')}}</textarea>

                                            @if ($errors->has('notes'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('notes') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                        <div class="col-sm-6">
                                            <label for="password_confirmation">تاكيد كلمه المرور</label>
                                            <input class=" " id="" placeholder="" name="password_confirmation" type="password" required>
                                        </div>
                                        <div class="col-sm-6">
                                            <label for="password">كلمه المرور</label>
                                            <input name="password" type="password" minlength="6" autocomplete="new-password" required>
                                            <!-- For array -->
                                            @if ($errors->has('password'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                        <div class="col-sm-12">
                                            <p style="font-family:ara">
                                                عند التسجيل بالموقع، فإنك توافق على
                                                <a href="#" class="" data-toggle="modal" data-target="#myModal">الشروط والاحكام</a>
                                                الخاصة بمنصة بناء كويك
                                            </p>

                                        </div>
                                        <div class="col-sm-12 policy-small">
                                            <input type="checkbox" name="comission" style="min-height: 15px !important; height: 15px !important;width:15px" required>
                                            <label style="color: #333 !important;position:relative;top:-4px;right:10px">عمولة الموقع 1% من القيمة الإجمالية للمشروع هي دين في ذمة كل شركة أو مؤسسة أو فرد أو من تبنى تنفيذ المشروع</label>
                                        </div>
                                        <div class="col-xs-6 text-left" style="padding-left:50px">
                                            <button class="btn btn-primary" type="submit" style="background-color:#7cbb29;padding-left:20px;padding-right:20px">تسجيل</button>
                                        </div>
                                        <div class="col-xs-6">
                                            <input type="checkbox" name="t_and_c" style="min-height: 15px !important; height: 15px !important;width:15px" required>
                                            <label style="color: #333 !important;position:relative;top:-4px;right:10px">اوافق على الشروط والاحكام</label>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    @elseif($action == 'company')
                    <div class="">
                        <div class="">
                            <div class="row">
                                <div class="col-xs-12">
                                    <form method="POST" action="{{url('register?action=company')}}">
                                        {{ csrf_field() }}
                                        <input name="user_type" type="hidden" value="company">
                                        <div class="col-sm-12">
                                            <h3 style="margin-top:0; margin-bottom:20px">الخطوة الأولى<b>(بيانات الشركة)</b></h3>
                                        </div>
                                        <div class="col-sm-6">
                                            <label>اسم الشركة <small>(بالإنجليزي)</small></label>
                                            <input name="en_name" type="text" value="{{old('en_name')}}" required>
                                            @if ($errors->has('en_name'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('en_name') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                        <div class="col-sm-6">
                                            <label>اسم الشركة <small>(بالعربي)</small></label>
                                            <input name="name" type="text" value="{{old('name')}}" required>
                                            @if ($errors->has('name'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('name') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                        <div class="col-sm-6">
                                            <label for="representative">ممثل الجهة</label>

                                            <input class=" " id="" placeholder="" value="{{old('representative')}}" name="representative" type="text" required>

                                            @if ($errors->has('representative'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('representative') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                        <div class="col-sm-6">
                                            <label for="commercial_reg">السجل التجاري</label>

                                            <input class=" " id="" placeholder="" value="{{old('commercial_reg')}}" name="commercial_reg" type="text" required>

                                            @if ($errors->has('commercial_reg'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('commercial_reg') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                        <div class="col-sm-12" style="margin-bottom:20px">
                                            <label for="notes">نبذة عن المنشأه</label>

                                            <textarea class=" " id="" placeholder="" style="width:100%;font-size:24px" name="notes" cols="50" rows="7" required>{{old('notes')}}</textarea>

                                            @if ($errors->has('notes'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('notes') }}</strong>
                                            </span>
                                            @endif
                                        </div>

                                        <div class="col-sm-12">
                                            <h3 style="margin-bottom:20px">الخطوة الثانية<b>(بيانات التواصل)</b></h3>
                                        </div>
                                        <div class="col-sm-6">
                                            <label for="contact_lname">اسم العائلة</label>



                                            <input class=" " id="" placeholder="" value="{{old('contact_lname')}}" name="contact_lname" type="text" required>

                                            @if ($errors->has('contact_lname'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('contact_lname') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                        <div class="col-sm-6">
                                            <label for="contact_fname">الاسم الأول</label>

                                            <input class=" " id="" placeholder="" value="{{old('contact_fname')}}" name="contact_fname" type="text" required>

                                            @if ($errors->has('contact_fname'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('contact_fname') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                        <div class="col-sm-6">
                                            <label> مواقع التواصل الاجتماعي</label>

                                            <input type="text" class="" value="{{old('contact_social')}}" name="contact_social" style="text-align:left" required />
                                            @if ($errors->has('contact_social'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('contact_social') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                        <div class="col-sm-6">
                                            <label for="email">البريد الإلكتروني</label>

                                            <input name="email" type="email" value="{{old('email')}}" autocomplete="off" required>
                                            @if ($errors->has('email'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                            @endif
                                        </div>

                                        <div class="col-sm-12">
                                            <h3 tyle="margin-bottom:20px">الخطوة الثالثة<b>(بيانات الحساب)</b></h3>
                                        </div>

                                        <div class="col-sm-12">
                                            <label for="website">الموقع الإلكتروني</label>



                                            <input class=" " id="" placeholder="" value="{{old('website')}}" name="website" type="text" required>
                                            @if ($errors->has('website'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('website') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                        <div class="col-sm-6">
                                            <label> رقم الجوال</label>

                                            <input class="input-field" name="phone" value="{{old('phone')}}" type="number" required>
                                            @if ($errors->has('phone'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('phone') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                        <div class="col-sm-6" style="height:105px">
                                            <label>المدينه</label>
                                            <select class="form-control" name="city" style="width:100%;height:40px;font-size:19px" required>
                                                <option>...</option>
                                                @foreach(ksaCities() as $key => $city)
                                                <option value="{{$key}}">{{$city}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-sm-6">
                                            <label for="password_confirmation">تاكيد كلمه المرور</label>
                                            <input class=" " id="" placeholder="" name="password_confirmation" type="password" required>
                                        </div>

                                        <div class="col-sm-6">
                                            <label for="password">كلمه المرور</label>
                                            <input name="password" type="password" minlength="6" autocomplete="new-password" required>
                                            <!-- For array -->
                                            @if ($errors->has('password'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                        <div class="col-sm-12">
                                            <p style="font-family:ara">
                                                عند التسجيل بالموقع، فإنك توافق على
                                                <a href="#" class="" data-toggle="modal" data-target="#myModal">الشروط والاحكام</a>
                                                الخاصة بمنصة بناء كويك
                                            </p>

                                        </div>
                                        <div class="col-sm-12 policy-small">
                                            <input type="checkbox" name="comission" style="min-height: 15px !important; height: 15px !important;width:15px" required>
                                            <label style="color: #333 !important;position:relative;top:-4px;right:10px">عمولة الموقع 1% من القيمة الإجمالية للمشروع هي دين في ذمة كل شركة أو مؤسسة أو فرد أو من تبنى تنفيذ المشروع</label>
                                        </div>
                                        <div class="col-xs-6 text-left" style="padding-left:50px">
                                            <button class="btn btn-primary" type="submit" style="background-color:#7cbb29;padding-left:20px;padding-right:20px">تسجيل</button>
                                        </div>
                                        <div class="col-xs-6">
                                            <input type="checkbox" name="t_and_c" style="min-height: 15px !important; height: 15px !important;width:15px" required>
                                            <label style="color: #333 !important;position:relative;top:-4px;right:10px">اوافق على الشروط والاحكام</label>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    @elseif($action == 'institute')
                    <div class="">
                        <div class="">
                            <div class="row">
                                <div class="col-xs-12">
                                    <form method="POST" action="{{url('register?action=institute')}}">
                                        {{ csrf_field() }}
                                        <input name="user_type" type="hidden" value="institute">
                                        <div class="col-sm-12">
                                            <h3 style="margin-top:0; margin-bottom:20px">الخطوة الأولى<b>(بيانات المؤسسه)</b></h3>
                                        </div>
                                        <div class="col-sm-6">
                                            <label>اسم المؤسسه <small>(بالإنجليزي)</small></label>
                                            <input name="en_name" value="{{old('en_name')}}" type="text" required>
                                            @if ($errors->has('en_name'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('en_name') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                        <div class="col-sm-6">
                                            <label>اسم المؤسسه <small>(بالعربي)</small></label>
                                            <input name="name" value="{{old('name')}}" type="text" required>
                                            @if ($errors->has('name'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('name') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                        <div class="col-sm-6">
                                            <label for="representative">ممثل الجهة</label>

                                            <input class=" " id="" placeholder="" value="{{old('representative')}}" name="representative" type="text" required>

                                            @if ($errors->has('representative'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('representative') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                        <div class="col-sm-6">
                                            <label for="commercial_reg">السجل التجاري</label>

                                            <input class=" " id="" placeholder="" value="{{old('commercial_reg')}}" name="commercial_reg" type="text" required>

                                            @if ($errors->has('commercial_reg'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('commercial_reg') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                        <div class="col-sm-12" style="margin-bottom:20px">
                                            <label for="notes">نبذة عن المنشأه</label>

                                            <textarea class=" " id="" placeholder="" style="width:100%;font-size:24px" name="notes" cols="50" rows="7" required>{{old('notes')}}</textarea>

                                            @if ($errors->has('notes'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('notes') }}</strong>
                                            </span>
                                            @endif
                                        </div>

                                        <div class="col-sm-12">
                                            <h3 style="margin-bottom:20px">الخطوة الثانية<b>(بيانات التواصل)</b></h3>
                                        </div>
                                        <div class="col-sm-6">
                                            <label for="contact_lname">اسم العائلة</label>



                                            <input class=" " id="" placeholder="" value="{{old('contact_lname')}}" name="contact_lname" type="text" required>

                                            @if ($errors->has('contact_lname'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('contact_lname') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                        <div class="col-sm-6">
                                            <label for="contact_fname">الاسم الأول</label>

                                            <input class=" " id="" placeholder="" value="{{old('contact_fname')}}" name="contact_fname" type="text" required>

                                            @if ($errors->has('contact_fname'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('contact_fname') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                        <div class="col-sm-6">
                                            <label> مواقع التواصل الاجتماعي</label>

                                            <input type="text" class="" name="contact_social" value="{{old('contact_social')}}" style="text-align:left" required />
                                            @if ($errors->has('contact_social'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('contact_social') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                        <div class="col-sm-6">
                                            <label for="email">البريد الإلكتروني</label>

                                            <input name="email" type="email" value="{{old('email')}}" autocomplete="off" required>
                                            @if ($errors->has('email'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                            @endif
                                        </div>

                                        <div class="col-sm-12">
                                            <h3 tyle="margin-bottom:20px">الخطوة الثالثة<b>(بيانات الحساب)</b></h3>
                                        </div>

                                        <div class="col-sm-12">
                                            <label for="website">الموقع الإلكتروني</label>



                                            <input class=" " id="" placeholder="" value="{{old('website')}}" name="website" type="text" required>
                                            @if ($errors->has('website'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('website') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                        <div class="col-sm-6">
                                            <label> رقم الجوال</label>

                                            <input class="input-field" name="phone" value="{{old('phone')}}" type="number" required>
                                            @if ($errors->has('phone'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('phone') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                        <div class="col-sm-6" style="height:105px">
                                            <label>المدينه</label>
                                            <select class="form-control" name="city" style="width:100%;height:40px;font-size:19px" required>
                                                <option>...</option>
                                                @foreach(ksaCities() as $key => $city)
                                                <option value="{{$key}}">{{$city}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-sm-6">
                                            <label for="password_confirmation">تاكيد كلمه المرور</label>
                                            <input class=" " id="" placeholder="" name="password_confirmation" type="password" required>
                                        </div>

                                        <div class="col-sm-6">
                                            <label for="password">كلمه المرور</label>
                                            <input name="password" type="password" minlength="6" autocomplete="new-password" required>
                                            <!-- For array -->
                                            @if ($errors->has('password'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                        <div class="col-sm-12">
                                            <p style="font-family:ara">
                                                عند التسجيل بالموقع، فإنك توافق على
                                                <a href="#" class="" data-toggle="modal" data-target="#myModal">الشروط والاحكام</a>
                                                الخاصة بمنصة بناء كويك
                                            </p>

                                        </div>
                                        <div class="col-sm-12 policy-small">
                                            <input type="checkbox" name="comission" style="min-height: 15px !important; height: 15px !important;width:15px" required>
                                            <label style="color: #333 !important;position:relative;top:-4px;right:10px">عمولة الموقع 1% من القيمة الإجمالية للمشروع هي دين في ذمة كل شركة أو مؤسسة أو فرد أو من تبنى تنفيذ المشروع</label>
                                        </div>
                                        <div class="col-xs-6 text-left" style="padding-left:50px">
                                            <button class="btn btn-primary" type="submit" style="background-color:#7cbb29;padding-left:20px;padding-right:20px">تسجيل</button>
                                        </div>
                                        <div class="col-xs-6">
                                            <input type="checkbox" name="t_and_c" style="min-height: 15px !important; height: 15px !important;width:15px" required>
                                            <label style="color: #333 !important;position:relative;top:-4px;right:10px">اوافق على الشروط والاحكام</label>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>




<div id="terms-conditions" class="ui tiny modal terms-conditions">
    <i class="close icon"></i>
    <div class="header">الشروط و الأحكام</div>
    <div class="content">
        <div class="terms-container">
            <article>
                @include('auth.policy')
            </article>
        </div>
    </div>
</div>

<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content" style="height: 90vh; overflow-y: auto;">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">x</button>
                <h4 class="modal-title" style="color:red">الشروط و الأحكام</h4>
            </div>
            <div class="modal-body">
                <p>
 <!--               <embed src="{{url('/')}}/public/upload/terms.pdf" width="570" height="500" -->
 <!--type="application/pdf">-->
 @include('auth.policy')
                </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">اغلاق</button>
            </div>
        </div>

    </div>
</div>
@endsection



@section('footer')

@endsection
