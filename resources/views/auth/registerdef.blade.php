@extends('front.layout.master')

@section('title')
تسجيل حساب
@endsection

@section('header')

    <!-- new -->
    <link type="text/css" rel="stylesheet" href="{{url('public/design/mandoby/css/semantic.rtl.min.css')}}"/>
<!--    <link type="text/css" rel="stylesheet" href="https://daleelalbenaa.com/front/helpers/css/animate.min.css"/>-->
<!--    <link type="text/css" rel="stylesheet" href="https://daleelalbenaa.com/front/helpers/css/hover.min.css"/>-->
<!--    <link type="text/css" rel="stylesheet" href="https://daleelalbenaa.com/front/helpers/css/font-awesome.min.css"/>-->
<!--    <link type="text/css" rel="stylesheet" href="https://daleelalbenaa.com/front/helpers/css/owl.carousel.min.css"/>-->
    <link type="text/css" rel="stylesheet" href="{{url('public/design/mandoby/css/jquery.mCustomScrollbar.min.css')}}"/>
<!--    <link type="text/css" rel="stylesheet" href="https://daleelalbenaa.com/front/helpers/css/jquery.toast.min.css"/>-->
<!--    <link type="text/css" rel="stylesheet" href="https://daleelalbenaa.com/front/helpers/css/hamburgers.min.css"/>-->
<!--
    <link type="text/css" rel="stylesheet"
          href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css"/>
-->
    <link type="text/css" rel="stylesheet" href="{{url('public/design/mandoby/css/main.min.css')}}"/>
    <link type="text/css" rel="stylesheet" href="{{url('public/design/mandoby/css/main.res.min.css')}}"/>
    <!-- Loading css -->
<!--
    <link rel="stylesheet" type="text/css" href="https://daleelalbenaa.com/dist/css/loading.css">
    <link rel="stylesheet" type="text/css" href="https://daleelalbenaa.com/dist/css/loading-btn.css">
-->


<style type="text/css">
    .field label, .field input, .field p, h1{font-family: "ara" !important}
    .disabled {
        opacity: 0.65;
        cursor: not-allowed;
    }

    .error .uploader-gallery {
        border: 2px dashed rgba(229, 95, 92, .5);
    }

    .cou-detail {
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-align: center;
        -ms-flex-align: center;
        align-items: center;
        -webkit-box-pack: justify;
        -ms-flex-pack: justify;
        justify-content: space-between;
        position: relative;
        width: 100%;
        min-height: 70px;
        background: #f1efeb;
        margin: 15px 0;
        border-radius: 5px;
    }

    .cou-detail>span:first-child {
        border-left: 2px solid rgba(255, 255, 255, .8);
    }

    .cou-detail>span {
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-align: center;
        -ms-flex-align: center;
        align-items: center;
        -webkit-box-pack: center;
        -ms-flex-pack: center;
        justify-content: center;
        -ms-flex-wrap: wrap;
        flex-wrap: wrap;
        width: 50%;
        height: 100%;
        padding: 20px;
    }

    .cou-detail>span>b {
        display: inline-block;
        margin-left: 15px;
        font-family: Changa-Semi-B;
        color: #998c70;
        font-weight: 400;
        unicode-bidi: plaintext;
    }

    .notification-txt {
        color: rgba(77, 70, 70, 0.44);
    }

    .dashboard-st>div {
        min-width: 16.5%;
    }

    .dashboard-st>div>b {
        font-size: .84rem;
    }

</style>
<!-- Inject style -->
<link type="text/css" rel="stylesheet" href="https://daleelalbenaa.com/front/helpers/css/slim.min.css" />
<style type="text/css">
    #pac-input {
        z-index: 98;
        top: 53px !important;
    }

    .menu{
        z-index: 9999;
    }
    
    label, h1, span, button, p{font-family: 'Cairo', sans-serif !important}
    

</style>
@endsection

@section('content')

<!--====================== start div of order  -==================================================-->
<!--
<div class="counters container-fluid" style="padding-bottom: 40px">

    <div class="row six flash animated infinite 2s">
        <div class="col-md-12 order">
            <p class="ordercompany">
                سجل معانا الأن
            </p>
        </div>
    </div>
</div>
-->
<!--====================  end div of order =======================================================-->


<!--==================================================-->


<!--==========================================================-->





<main class="main" style="margin-bottom:30px">



    <div class="inner-container">
        <form method="POST" action="https://daleelalbenaa.com/register" accept-charset="UTF-8" class="ui form frm-register" id="form-id"><input name="_token" type="hidden" value="9P4ySWNIuIdX039vbzpYBg9wGW7YzRnpI0hqw2lx">
            <h1 class="form-title primary large"  style="font-family:ara !important">تسجيل جديد</h1>
        </form>

        <div class="tabs--holder">
            <p  style="font-family:ara !important; font-size:19px">يرجى تحديد نوع الحساب للتسجيل</p>
            <div class="ui tabular reg-types">
                <button class="btn btn-reg-type user active" data-tab="register-user">
                    <i class="fa fa-user"></i>
                    <h1 style="font-family:ara !important">صاحب مشروع</h1>
<!--                    <span>للمهتمين بالبحث عن الشركات و تقديم طلبات العروض</span>-->
                </button>
                
                <button class="btn btn-reg-type user" data-tab="register-personal" style="margin-left:40px">
                    <i class="fa fa-user"></i>
                    <h1 style="font-family:ara !important">شخصي</h1>
<!--                    <span>للمهتمين بالبحث عن الشركات و تقديم طلبات العروض</span>-->
                </button>
                
                <button class="btn btn-reg-type user" data-tab="register-company" style="margin-left:40px">
                    <i class="fa fa-home"></i>
                    <h1 style="font-family:ara !important">شركة</h1>
<!--                    <span>اذا كنت مهتم لعرض شركتك ضمن دليل الشركات</span>-->
                </button>
                
                <button class="btn btn-reg-type user" data-tab="register-institute">
                    <i class="fa fa-home"></i>
                    <h1 style="font-family:ara !important">مؤسسه</h1>
<!--                    <span>اذا كنت مهتم لعرض شركتك ضمن دليل الشركات</span>-->
                </button>
            </div>
            <div class="reg-tabs--holder">
                <div class="message-box" id="message-box"></div>

                <div class="ui transition fade in tab register-user active" data-tab="register-user">
                    <form method="POST" action="{{route('register')}}" accept-charset="UTF-8" class="ui form frm-register frm-register-user " >
                        {{ csrf_field() }}
                        <input name="user_type" type="hidden" value="owner">
                        <div class="two inline fields">
                            <div class="field ">
                                <label for="first_name">الاسم الأول</label>
                                <input  name="name" type="text" required>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif

                                <!-- For array -->
                            </div>
                            <div class="field ">
                                <label for="last_name">اسم العائلة</label>



                                <input name="last_name" type="text" required>

                                @if ($errors->has('last_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('last_name') }}</strong>
                                    </span>
                                @endif

                                <!-- For array -->
                            </div>
                        </div>
                        <div class="two inline fields">
                            <div class="field ">
                                <label for="email">البريد الالكترونى</label>
                                <input class=" " id="" placeholder="" name="email" type="email" autocomplete="off" required>
                                <!-- For array -->
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="field phone-list">
                                <label> رقم الجوال</label>
                                <div class="field-container">
                                    <div class="ui floating dropdown country-code disabled">
                                        <input name="country-code" type="hidden">
                                        <i class="dropdown icon"></i>
                                        <div class="text"><i class="sa flag"></i> +966</div>
                                    </div>
                                    <input class="input-field" name="phone" type="text" required>
                                @if ($errors->has('phone'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                @endif
                                </div>
                            </div>
                        </div>
                        <div class="two inline fields">
                            <div class=" field">

                            </div>

                        </div>
                        <div class="two inline fields">
                            <div class="field ">
                                <label for="password">كلمه المرور</label>
                                <input name="password" type="password" autocomplete="new-password" required>
                                <!-- For array -->
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="field ">
                                <label for="password_confirmation">تاكيد كلمه المرور</label>


                                <input class=" " id="" placeholder="" name="password_confirmation" type="password" required>



                                <!-- For array -->
                            </div>
                        </div>
                        <div class="flexed submit field">
                            <p>
                                عند التسجيل بالموقع، فإنك توافق على
                                <a href="#" class="terms-trigger">الشروط والاحكام</a>
                                الخاصة بمنصة بناء كويك
                            </p>
                           
                            
                        </div>           

                        <div class="two inline fields">
                            <div class="field">
                                
                                <input type="checkbox" name="t_and_c" style="min-height: 15px !important; height: 15px !important;width:15px" required>
                                <label style="color: #333 !important;">اوافق على الشروط والاحكام</label>
                            </div>
                            <div class="field text-left" >
                                <button class="btn btn-primary" type="submit" style="background-color:#7cbb29; float:left">تسجيل</button>
                            </div>
                        </div>
                                                
                    </form>
                </div>
                
                
                <!----------------------------------- personal -------------------------------------------------------------------->
                <div class="ui transition fade in tab register-personal " data-tab="register-personal">
                    <form method="POST" action="{{route('register')}}" accept-charset="UTF-8" class="ui form frm-register frm-register-user" >
                        {{ csrf_field() }}
                        <input name="user_type" type="hidden" value="personal">
                        <div class="two inline fields">
                            <div class="field ">
                                <label for="first_name">الاسم الأول</label>
                                <input  name="name" type="text" required >

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif

                                <!-- For array -->
                            </div>
                            <div class="field ">
                                <label for="last_name">اسم العائلة</label>



                                <input name="last_name" type="text" required>

                                @if ($errors->has('last_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('last_name') }}</strong>
                                    </span>
                                @endif

                                <!-- For array -->
                            </div>
                        </div>
                        <div class="two inline fields">
                            <div class="field ">
                                <label for="email">البريد الاكترونى</label>
                                <input class=" " id="" placeholder="" name="email" type="email" autocomplete="off" required>
                                <!-- For array -->
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="field phone-list">
                                <label> رقم الجوال</label>
                                <div class="field-container">
                                    <div class="ui floating dropdown country-code disabled">
                                        <input name="country-code" type="hidden">
                                        <i class="dropdown icon"></i>
                                        <div class="text"><i class="sa flag"></i> +966</div>
                                    </div>
                                    <input class="input-field" name="phone" type="text" required>
                                @if ($errors->has('phone'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                @endif
                                </div>
                            </div>
                        </div>
                        
                                    <div class="field ">
                                        <label for="notes">نبذة مختصره</label>



                                        <textarea class=" " id="" placeholder="" name="notes" cols="50" rows="10" required></textarea>

                                        @if ($errors->has('notes'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('notes') }}</strong>
                                            </span>
                                        @endif

                                        <!-- For array -->
                                    </div>
                        <div class="two inline fields">
                            <div class=" field">

                            </div>

                        </div>
                        <div class="two inline fields">
                            <div class="field ">
                                <label for="password">كلمه المرور</label>
                                <input name="password" type="password" autocomplete="new-password" required>
                                <!-- For array -->
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="field ">
                                <label for="password_confirmation">تاكيد كلمه المرور</label>


                                <input class=" " id="" placeholder="" name="password_confirmation" type="password" required>



                                <!-- For array -->
                            </div>
                        </div>
                        <div class="flexed submit field">
                            <p>
                                عند التسجيل بالموقع، فإنك توافق على
                                <a href="#" class="terms-trigger">الشروط والاحكام</a>
                                الخاصة بمنصة بناء كويك
                            </p>
                            
                        </div>
                        
                        <div class="two inline fields" style="margin-bottom:0">
                            <div class="field">
                                
                                <input type="checkbox" name="t_and_c" style="min-height: 15px !important; height: 15px !important;width:15px" required>
                                <label style="color: #333 !important;">اوافق على الشروط والاحكام</label>
                            </div>
                            <div class="field text-left" >
                               
                            </div>
                        </div>
                        
                        <div class="two inline fields">
                            <div class="field" style="width:90vw">
                                
                                <input type="checkbox" name="t_and_c" style="min-height: 15px !important; height: 15px !important;width:15px" required>
                                <label style="color: #333 !important;">عمولة الموقع 1% من القيمة الإجمالية للمشروع هي دين في ذمة كل شركة أو مؤسسة أو فرد أو من تبنى تنفيذ المشروع</label>
                            </div>

                        </div>
                        <div class="two inline fields">
                            <div class="field" >
                                
                               <button class="btn btn-primary" type="submit" style="background-color:#7cbb29;">تسجيل</button>
                            </div>

                        </div>
                    </form>
                </div>
                <!-- end personal -->
            
                

                <!--------------------------------- company ------------------------------------------>
                <div class="ui transition fade in tab register-company" data-tab="register-company">
                    <form method="POST" action="{{ route('register') }}"  class="ui form frm-register  frm-register-company " >
                        {{ csrf_field() }}
                        <input name="user_type" type="hidden" value="company">

                        <div class="ui accordion company-reg">
                            <!-- first registration step -->
                            <div class="active title">
                                <h1>الخطوة الأولى<b>(بيانات الشركة)</b></h1>
                                <button class="btn btn-round reg-step-edit">تعديل</button>
                            </div>
                            <section class="active content first">
                                <div>

                                    <div class="two inline fields">
                                        <div class="field">
                                            <label>اسم الشركة <small>(بالعربي)</small></label>
                                            <input placeholder="اسم الشركة" name="name" type="text" required >
                                            @if ($errors->has('name'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('name') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                        <div class="field">
                                            <label>اسم الشركة <small>(بالإنجليزي)</small></label>
                                            <input placeholder="Company Name" name="en_name" type="text" required>
                                            @if ($errors->has('en_name'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('en_name') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>



                                    <div class="two inline fields">
                                        <div class="field ">
                                            <label for="commercial_reg">السجل التجاري</label>



                                            <input class=" " id="" placeholder="" name="commercial_reg" type="text" required>

                                            @if ($errors->has('commercial_reg'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('commercial_reg') }}</strong>
                                                </span>
                                            @endif

                                            <!-- For array -->
                                        </div>
                                        <div class="field ">
                                            <label for="representative">ممثل الجهة</label>



                                            <input class=" " id="" placeholder="" name="representative" type="text" required>

                                            @if ($errors->has('representative'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('representative') }}</strong>
                                                </span>
                                            @endif

                                            <!-- For array -->
                                        </div>
                                    </div>



                                    <div class="field ">
                                        <label for="notes">نبذة عن المنشأة</label>



                                        <textarea class=" " id="" placeholder="" name="notes" cols="50" rows="10" required></textarea>

                                        @if ($errors->has('notes'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('notes') }}</strong>
                                            </span>
                                        @endif

                                        <!-- For array -->
                                    </div>
                                </div>
                            </section>

                            <!-- second registration step -->
                            <div class="title">
                                <h1>الخطوة الثانية<b>(بيانات التواصل)</b></h1>
                                <button class="btn btn-round reg-step-edit">التالي</button>
                            </div>
                            <section class="content second">
                                <div>
                                    <div class="two inline fields">
                                        <div class="field ">
                                            <label for="contact_fname">الاسم الأول</label>



                                            <input class=" " id="" placeholder="" name="contact_fname" type="text" required>

                                            @if ($errors->has('contact_fname'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('contact_fname') }}</strong>
                                                </span>
                                            @endif

                                            <!-- For array -->
                                        </div>
                                        <div class="field ">
                                            <label for="contact_lname">اسم العائلة</label>



                                            <input class=" " id="" placeholder="" name="contact_lname" type="text"  required>

                                            @if ($errors->has('contact_lname'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('contact_lname') }}</strong>
                                                </span>
                                            @endif

                                            <!-- For array -->
                                        </div>
                                    </div>
                                    <div class="two inline fields">
                                        <div class="field ">
                                            <label for="email">البريد الإلكتروني</label>



                                            <input name="email" type="email" autocomplete="off" required>
                                            @if ($errors->has('email'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('email') }}</strong>
                                                </span>
                                            @endif


                                            <!-- For array -->
                                        </div>
                                        
                                        <div class="field">
                                            <label> مواقع التواصل الاجتماعي</label>
                                            <div class="field-container" >
<!--
                                                <button class="btn btn-add-cn animated fadeOut" data-type="social">أضف</button>
                                                <div class="ui floating dropdown">
                                                    <i class="dropdown icon"></i>
                                                    <div class="text">اختر شبكة</div>
                                                    <input name="socail_type" type="hidden" value="facebook-f">
                                                    <div class="menu" style="z-index:9999;">
                                                        <div class="item" data-value="facebook-f">فيسبوك</div>
                                                        <div class="item" data-value="twitter">تويتر</div>
                                                        <div class="item" data-value="instagram">انستغرام</div>
                                                        <div class="item" data-value="youtube">يوتيوب</div>
                                                    </div>
                                                </div>
-->
                                                <input type="text" class="" name="contact_social" style="text-align:left" required/>
                                                @if ($errors->has('contact_social'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('contact_social') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                            <ul class="flexed block-list en-list">
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </section>
                            <!-- third registration step -->
                            <div class="title">
                                <h1>الخطوة الثالثة<b>(بيانات الحساب)</b></h1>
                                <button class="btn btn-round reg-step-edit">التالي</button>
                            </div>
                            <section class="content third">
                                <div>

                                    <div class="two inline fields">

              
                                        <div class="field" style="width:100%">
                                            <label for="website">الموقع الإلكتروني</label>



                                            <input class=" " id="" placeholder="" name="website" type="text" required>
                                            @if ($errors->has('website'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('website') }}</strong>
                                                </span>
                                            @endif


                                            <!-- For array -->
                                        </div>
                                    </div>

                                    <div class="two inline fields">

                                        <div class="field">
                                            <label>المدينه</label>
                                             <select class="form-control" name="city" style="width:100%" required>
                                                <option>...</option>
                                                @foreach(ksaCities() as $key => $city)
                                                 <option value="{{$key}}">{{$city}}</option>
                                                @endforeach
                                             </select>
                                        </div>

                                        <div class="field phone-list">
                                            <label> رقم الجوال</label>
                                            <div class="field-container">
                                                <div class="ui floating dropdown country-code disabled">
                                                    <input name="country-code" type="hidden" >
                                                    <i class="dropdown icon"></i>
                                                    <div class="text"><i class="sa flag"></i> +966</div>
                                                </div>
                                                <input class="input-field" name="phone" type="number" required>
                                                @if ($errors->has('phone'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('phone') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>

                                    </div>
                                    <div class="two inline fields">
                                        <div class="field ">
                                            <label for="password">كلمة المرور</label>


                                            <input name="password" type="password" autocomplete="new-password" required>


                                            @if ($errors->has('password'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('password') }}</strong>
                                                </span>
                                            @endif
                                            <!-- For array -->
                                        </div>
                                        <div class="field ">
                                            <label for="password_confirmation">تأكيد كلمة المرور</label>


                                            <input class=" " id="" placeholder="" name="password_confirmation" type="password" required>



                                            <!-- For array -->
                                        </div>
                                    </div>
                                    <div class="flexed submit field">
                                        <p>
                                            عند التسجيل بالموقع، فإنك توافق على
                                            <a href="#" class="terms-trigger">الشروط والاحكام</a>
                                            الخاصة بمنصة دليل البناء
                                        </p>
<!--                                        <button type="submit" class="btn btn-primary" style="background-color:#7cbb29" onclick='return policyAr()'>تسجيل</button>-->
                                    </div>
                                </div>
                            </section>
                        </div>
                        <div class="two inline fields" style="margin-bottom:0">
                            <div class="field">
                                
                                <input type="checkbox" name="t_and_c" style="min-height: 15px !important; height: 15px !important;width:15px" required>
                                <label style="color: #333 !important;">اوافق على الشروط والاحكام</label>
                            </div>
                            <div class="field text-left" >
                               
                            </div>
                        </div>
                        
                        <div class="two inline fields">
                            <div class="field" style="width:90vw">
                                
                                <input type="checkbox" name="t_and_c" style="min-height: 15px !important; height: 15px !important;width:15px" required>
                                <label style="color: #333 !important;">عمولة الموقع 1% من القيمة الإجمالية للمشروع هي دين في ذمة كل شركة أو مؤسسة أو فرد أو من تبنى تنفيذ المشروع</label>
                            </div>

                        </div>
                        <div class="two inline fields">
                            <div class="field" >
                                
                               <button class="btn btn-primary" type="submit" style="background-color:#7cbb29;">تسجيل</button>
                            </div>

                        </div>
                    </form>
                </div>

                <!----------------------------- institute --------------------------------->
                <div class="ui transition fade in tab register-company" data-tab="register-institute">
                    <form method="POST" action="{{ route('register') }}"  class="ui form frm-register  frm-register-company " >
                        {{ csrf_field() }}
                        <input name="user_type" type="hidden" value="institute">

                        <div class="ui accordion company-reg">
                            <!-- first registration step -->
                            <div class="active title">
                                <h1>الخطوة الأولى<b>(بيانات الشركة)</b></h1>
                                <button class="btn btn-round reg-step-edit">تعديل</button>
                            </div>
                            <section class="active content first">
                                <div>

                                    <div class="two inline fields">
                                        <div class="field">
                                            <label>اسم المؤسسه <small>(بالعربي)</small></label>
                                            <input placeholder="اسم المؤسسه" name="name" type="text" required >
                                            @if ($errors->has('name'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('name') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                        <div class="field">
                                            <label>اسم المؤسسه <small>(بالإنجليزي)</small></label>
                                            <input placeholder="Institute Name" name="en_name" type="text" required>
                                            @if ($errors->has('en_name'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('en_name') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>



                                    <div class="two inline fields">
                                        <div class="field ">
                                            <label for="commercial_reg">السجل التجاري</label>



                                            <input class=" " id="" placeholder="" name="commercial_reg" type="text" required>

                                            @if ($errors->has('commercial_reg'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('commercial_reg') }}</strong>
                                                </span>
                                            @endif

                                            <!-- For array -->
                                        </div>
                                        <div class="field ">
                                            <label for="representative">ممثل الجهة</label>



                                            <input class=" " id="" placeholder="" name="representative" type="text" required>

                                            @if ($errors->has('representative'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('representative') }}</strong>
                                                </span>
                                            @endif

                                            <!-- For array -->
                                        </div>
                                    </div>



                                    <div class="field ">
                                        <label for="notes">نبذة عن المنشأة</label>



                                        <textarea class=" " id="" placeholder="" name="notes" cols="50" rows="10" required></textarea>

                                        @if ($errors->has('notes'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('notes') }}</strong>
                                            </span>
                                        @endif

                                        <!-- For array -->
                                    </div>
                                </div>
                            </section>

                            <!-- second registration step -->
                            <div class="title">
                                <h1>الخطوة الثانية<b>(بيانات التواصل)</b></h1>
                                <button class="btn btn-round reg-step-edit">التالي</button>
                            </div>
                            <section class="content second">
                                <div>
                                    <div class="two inline fields">
                                        <div class="field ">
                                            <label for="contact_fname">الاسم الأول</label>



                                            <input class=" " id="" placeholder="" name="contact_fname" type="text" required>

                                            @if ($errors->has('contact_fname'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('contact_fname') }}</strong>
                                                </span>
                                            @endif

                                            <!-- For array -->
                                        </div>
                                        <div class="field ">
                                            <label for="contact_lname">اسم العائلة</label>



                                            <input class=" " id="" placeholder="" name="contact_lname" type="text"  required>

                                            @if ($errors->has('contact_lname'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('contact_lname') }}</strong>
                                                </span>
                                            @endif

                                            <!-- For array -->
                                        </div>
                                    </div>
                                    <div class="two inline fields">
                                        <div class="field ">
                                            <label for="email">البريد الإلكتروني</label>



                                            <input name="email" type="email" autocomplete="off" required>
                                            @if ($errors->has('email'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('email') }}</strong>
                                                </span>
                                            @endif


                                            <!-- For array -->
                                        </div>
                                        
                                        <div class="field">
                                            <label> مواقع التواصل الاجتماعي</label>
                                            <div class="field-container" >
<!--
                                                <button class="btn btn-add-cn animated fadeOut" data-type="social">أضف</button>
                                                <div class="ui floating dropdown">
                                                    <i class="dropdown icon"></i>
                                                    <div class="text">اختر شبكة</div>
                                                    <input name="socail_type" type="hidden" value="facebook-f">
                                                    <div class="menu" style="z-index:9999;">
                                                        <div class="item" data-value="facebook-f">فيسبوك</div>
                                                        <div class="item" data-value="twitter">تويتر</div>
                                                        <div class="item" data-value="instagram">انستغرام</div>
                                                        <div class="item" data-value="youtube">يوتيوب</div>
                                                    </div>
                                                </div>
-->
                                                <input type="text" class="" name="contact_social" style="text-align:left" required/>
                                                @if ($errors->has('contact_social'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('contact_social') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                            <ul class="flexed block-list en-list">
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </section>
                            <!-- third registration step -->
                            <div class="title">
                                <h1>الخطوة الثالثة<b>(بيانات الحساب)</b></h1>
                                <button class="btn btn-round reg-step-edit">التالي</button>
                            </div>
                            <section class="content third">
                                <div>

                                    <div class="two inline fields">

              
                                        <div class="field" style="width:100%">
                                            <label for="website">الموقع الإلكتروني</label>



                                            <input class=" " id="" placeholder="" name="website" type="text" required>
                                            @if ($errors->has('website'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('website') }}</strong>
                                                </span>
                                            @endif


                                            <!-- For array -->
                                        </div>
                                    </div>

                                    <div class="two inline fields">

                                        <div class="field">
                                            <label>المدينه</label>
                                             <select class="form-control" name="city" style="width:100%" required>
                                                <option>...</option>
                                                @foreach(ksaCities() as $key => $city)
                                                 <option value="{{$key}}">{{$city}}</option>
                                                @endforeach
                                             </select>
                                        </div>

                                        <div class="field phone-list">
                                            <label> رقم الجوال</label>
                                            <div class="field-container">
                                                <div class="ui floating dropdown country-code disabled">
                                                    <input name="country-code" type="hidden" >
                                                    <i class="dropdown icon"></i>
                                                    <div class="text"><i class="sa flag"></i> +966</div>
                                                </div>
                                                <input class="input-field" name="phone" type="number" required>
                                                @if ($errors->has('phone'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('phone') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>

                                    </div>
                                    <div class="two inline fields">
                                        <div class="field ">
                                            <label for="password">كلمة المرور</label>


                                            <input name="password" type="password" autocomplete="new-password" required>


                                            @if ($errors->has('password'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('password') }}</strong>
                                                </span>
                                            @endif
                                            <!-- For array -->
                                        </div>
                                        <div class="field ">
                                            <label for="password_confirmation">تأكيد كلمة المرور</label>


                                            <input class=" " id="" placeholder="" name="password_confirmation" type="password" required>



                                            <!-- For array -->
                                        </div>
                                    </div>
                                    <div class="flexed submit field">
                                        <p>
                                            عند التسجيل بالموقع، فإنك توافق على
                                            <a href="#" class="terms-trigger">الشروط والاحكام</a>
                                            الخاصة بمنصة دليل البناء
                                        </p>
                                        
                                    </div>
                                </div>
                            </section>
                        </div>

                        <div class="two inline fields" style="margin-bottom:0">
                            <div class="field">
                                
                                <input type="checkbox" name="t_and_c" style="min-height: 15px !important; height: 15px !important;width:15px" required>
                                <label style="color: #333 !important;">اوافق على الشروط والاحكام</label>
                            </div>
                            <div class="field text-left" >
                               
                            </div>
                        </div>
                        
                        <div class="two inline fields">
                            <div class="field" style="width:90vw">
                                
                                <input type="checkbox" name="t_and_c" style="min-height: 15px !important; height: 15px !important;width:15px" required>
                                <label style="color: #333 !important;">عمولة الموقع 1% من القيمة الإجمالية للمشروع هي دين في ذمة كل شركة أو مؤسسة أو فرد أو من تبنى تنفيذ المشروع</label>
                            </div>

                        </div>
                        <div class="two inline fields">
                            <div class="field" >
                                
                               <button class="btn btn-primary" type="submit" style="background-color:#7cbb29;">تسجيل</button>
                            </div>

                        </div>
                        
                        
                    </form>
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
</main>

@endsection



@section('footer')
<!--Javascript login assets-->
<script type="text/javascript" src="https://daleelalbenaa.com/front/helpers/js/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="{{url('public/design/mandoby/query_files/semantic.min.js')}}"></script>


<script type="text/javascript" src="{{url('public/design/mandoby/query_files/jquery.mCustomScrollbar.concat.min.js')}} "></script>

<script type="text/javascript" src="{{url('public/design/mandoby/query_files/scrollreveal.min.js')}} "></script>

<script type="text/javascript" src="{{url('public/design/mandoby/query_files/main.js')}}"></script>
<script type="text/javascript" src="{{url('public/design/mandoby/query_files/front-common.js')}}"></script>

<script>
    function policyAr(){
        return confirm('عمولة الموقع 1% من قيمة المشروع في ذمة كل شركة أو مؤسسة أو فرد أو من تبنى المشروع'); 
    }
</script>
@endsection


