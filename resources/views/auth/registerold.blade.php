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
<div class="counters container-fluid" style="padding-bottom: 40px">

    <div class="row six flash animated infinite 2s">
        <div class="col-md-12 order">
            <p class="ordercompany">
                سجل معانا الأن
            </p>
        </div>
    </div>
</div>
<!--====================  end div of order =======================================================-->


<!--==================================================-->


<!--==========================================================-->





<main class="main" style="margin-bottom:30px">



    <div class="inner-container">
        <form method="POST" action="https://daleelalbenaa.com/register" accept-charset="UTF-8" class="ui form frm-register" id="form-id"><input name="_token" type="hidden" value="9P4ySWNIuIdX039vbzpYBg9wGW7YzRnpI0hqw2lx">
            <h1 class="form-title primary large">تسجيل جديد</h1>
        </form>

        <div class="tabs--holder">
            <p>يرجى تحديد نوع الحساب للتسجيل</p>
            <div class="ui tabular reg-types">
                <button class="btn btn-reg-type user active" data-tab="register-user">
                    <i class="fa fa-user"></i>
                    <h1>صاحب مشروع</h1>
<!--                    <span>للمهتمين بالبحث عن الشركات و تقديم طلبات العروض</span>-->
                </button>
                
                <button class="btn btn-reg-type user" data-tab="register-personal" style="margin-left:40px">
                    <i class="fa fa-user"></i>
                    <h1>شخصي</h1>
<!--                    <span>للمهتمين بالبحث عن الشركات و تقديم طلبات العروض</span>-->
                </button>
                
                <button class="btn btn-reg-type user" data-tab="register-company" style="margin-left:40px">
                    <i class="fa fa-home"></i>
                    <h1>شركة</h1>
<!--                    <span>اذا كنت مهتم لعرض شركتك ضمن دليل الشركات</span>-->
                </button>
                
                <button class="btn btn-reg-type user" data-tab="register-institute">
                    <i class="fa fa-home"></i>
                    <h1>مؤسسه</h1>
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
                            <button class="btn btn-primary" type="submit" style="background-color:#7cbb29">تسجيل</button>
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
                            <button class="btn btn-primary" type="submit" style="background-color:#7cbb29">تسجيل</button>
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
                                        <button type="submit" class="btn btn-primary" style="background-color:#7cbb29">تسجيل</button>
                                    </div>
                                </div>
                            </section>
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
                                        <button type="submit" class="btn btn-primary" style="background-color:#7cbb29">تسجيل</button>
                                    </div>
                                </div>
                            </section>
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
                    <p dir="RTL">الشروط و الاحكام&nbsp;</p>
                    <p dir="RTL"><br><strong>إخلاء المسؤولية عن الضمانات</strong><br><br>في حدود ما يسمح به القانون المعمول به، نحن نخلي مسؤوليتنا من أي كفالات و/أو تعهدات و/أو اتفاقيات و/أو ضمانات تتعلق بالمعلومات و/أو البيانات و/أو البرمجيات و/أو إمكانية التطبيق و/أو المنتجات و/أو الخدمات المتوفرة في هذا النظام. وكافة هذه المعلومات و/أو البيانات و/أو البرمجيات و/أو إمكانية التطبيق و/أو المنتجات و/أو الخدمات مقدمة في الموقع &quot;كما هي&quot; دون أي ضمانة من أي نوع، بما في ذلك أي ضمانات وشروط ضمنية خاصة بتسويقها التجاري وملاءمتها لغرض معين أو لغرض الحق القانوني أو عدم الانتهاك لحقوق تجارية أخرى، بغض النظر عن الاختصاص القضائي الذي تخضع له.<br><br><br><strong>التعديل</strong><br><br><br>يحق لنا في أي وقت تغيير هذه الأحكام والشروط وسوف يتم إشعاركم في حال التغيير. وتكون أي تغييرات في هذه الأحكام والشروط سارية المفعول لحظة نشرها على الموقع وهي تحل محلّ أي أحكام وشروط سبق نشرها.<br>تعني مواصلتك لاستخدام هذا الموقع بعد إجراء أي تغييرات عليه أنك قد قبلت بما لا يقبل النقض الأحكام والشروط المعدّلة و/أو التي تم تغييرها.<br><br><br><strong>حدود حق الاستخدام</strong><br><br><br>إن استعراض وطباعة أو تنزيل/تحميل / طلب لعرض سعر او أي محتوى أو رسم بياني أو نموذج أو مستند من الموقع، يمنحك أنت وحدك رخصة محدودة وغير حصرية لاستخدامك الشخصي فقط وليس لغايات إعادة الترخيص للغير أو البيع أو إعداد أعمال مشابهة، أو غير ذلك من الاستخدامات، أو بدمج ذلك الجزء في أي نظام لاسترجاع المعلومات، سواءً إلكترونياً أو آلياً، بشكل يتجاوز استخدامك الشخصي.<br><br><br><strong>إبراء الذمة</strong><br><br>كشرط لاستخدام هذا النظام، إنك توافق على درء الضرر عنا وتعويضنا عن أي وكافة الالتزامات والخسائر والدعاوى والنفقات (بما في ذلك الرسوم القانونية) والأضرار (سواء المباشرة أو غير المباشرة) التي تنشأ عن المطالبات الناتجة عن استخدامك لتطبيق دليل البناء، بما في ذلك ودون حصر أي مطالبات تتضمن مزاعم تثبت صحتها وتشكل انتهاكاً من جانبك لهذه الاتفاقية.<br><br><strong>حدود المسؤولية&nbsp;</strong><br>إن الخدمات أو المعلومات التي يتم الحصول عليها من الموقع أو من خلاله، هي خدمات ومعلومات يتم توفيرها &quot;كما هي&quot; و&quot;حسب توفرها&quot;، وبالتالي لن يكن تطبيق دليل البناء تحت أي ظرف من الظروف مسؤولاً عن أية أضرار بما في ذلك على سبيل الذكر لا الحصر الأضرار المباشرة أو غير المباشرة أو الخاصة أو العرضية أو الناتجة، أو الخسائر أو المصروفات المترتبة فيما يتعلق بهذا النظام أو استخدامه أو عدم إمكان استخدامه من قبل أي طرف أو فيما يتعلق بأي فشل في الأداء او عدم القدرة على استخدام الخدمة (كليا أو جزئيا) ، أو الخطأ أو السهو أو الانقطاع أو التعطل أو التأخير في التشغيل أو البث أو بسبب فيروسات الكومبيوتر او الجوال أو تعطل الخطوط أو الأنظمة او الوصول غير المصرح به إلى بياناتك أو تغييرها &nbsp;أو كان ذلك ناتجاً عن الإخلال بهذه الاتفاقية أو الضمانات أو الإهمال أو المسؤولية الخاصة بالخدمات أو المعلومات أو غير ذلك حتى ولو تم تبليغ ادارة دليل البناء أو من يمثله باحتمال حصول تلك الأضرار أو الخسائر أو المصاريف.<br>وإننا نعتبر التنبيه على الأضرار السابقة الذكر عنصراً أساسياً للتعامل بينك وبيننا.<br>كما نحن لا نضمن ما يلي: (أ) أن تفي خدمات دليل البناء بمتطلباتك المحددة؛ (ب) أن تكون خدمات دليل البناء دون انقطاع أو في الوقت المناسب أو آمنة أو خالية من الأخطاء؛ (ج) أن تكون خدمات دليل البناء دقيقة أو موثوقة؛ (د) جودة أي منتجات أو خدمات أو معلومات أو مواد أخرى تم شراؤها أو الحصول عليها من قبلك من خلال خدمة دليل البناء تلبي توقعاتك. أو (ه) تصحيح أية أخطاء في خدمة دليل البناء..<br>وفي حدود ما تتعرض له من أضرار أثناء استخدامك للنظام كنتيجة مباشرة لإهمالنا أو تقصيرنا، تنحصر مسؤوليتنا تجاه تلك الأضرار هي تعويضك الرسوم المدفوعة خلال اخر 12 شهر.<br>الرسوم<br>يتم تحديد الرسوم المفروضة على استخدام خدمات دليل البناء على موقع الويب (&quot;الرسوم&quot;) وهي قابلة للتغيير. وسنسعى لإعلامك (عن طريق البريد الإلكتروني أو عن طريق عرض رسالة عند استخدامك لخدمات الفوترة) قبل 30 يوما على الأقل من زيادة الرسوم. يتم دفع الرسوم مقدما على أساس شهري أو سنوي او حسب العرض المقدم و في الغالب يكون سنوي وغير قابلة للاسترداد، ويشمل ذلك استخدامك &nbsp;جزء من الاشتراك اما لمدة شهر أو سنة لخدمات دليل البناء.<br>إذا كنت تستخدم التجربة المجانية من خدمات دليل البناء (كما هو موضح على الموقع أو التطبيقات)، فستبدأ الفترة المجانية في اليوم الذي يتم فيه فتح حسابك وتنتهي بعد المده المصرح بها بالاتفاق. إذا رغبت في الاستمرار في نهاية الفترة المجانية، فستحتاج إلى تقديم تفاصيل بطاقة ائتمان صالحة او خيارات الدفع المتاحة في صفحة الاشتراك.<br>تغيير الباقة<br>يمكنك ترقية الباقة او الحساب / او تفعيل خاصية التميز على سبيل المثال ( ان تكون منشاتك في الصفحه الرائيسية ثابته او القسم حسب تخصصها في التطبيق او الموقع) في أي وقت باتباع التعليمات عند تسجيل الدخول إلى حسابك من خلال التطبيقات أو الموقع.<br>اي اجراءات تغيير في الباقات ستصيح فورية. وفي حالة انتهاء المده يعود الى وضعه الطبيعي دون تميزو تفقد بذالك الخصائص الخاصه بالترقيه، لن يتم استرداد مبالغ اي خدمة تفقدها نتيجة تغيير الباقة وستصبح قيمتها كرصيد يمكن استخدامه. اما إذا كان التغيير إلى باقة اعلى، فسيتم خصم المبلغ المتبقي لنهاية الاشتراك السنوي من قيمة الباقة الجديدة وعليه يتم اصدار فاتورة وسيتم اعادة تعيين تاريخ تجديد الاشتراك لليوم الذي اكتمل فيه عملية السداد.<br>قد يؤدي التغيير إلى باقة ادنى إلى فقدان المحتوى أو مميزات لحسابك. إذا اخترت التغيير إلى باقة ادنى، فلن تتحمل دليل البناء أية مسؤولية عن فقدان البيانات أو المحتوى أو الميزات الناتجة عن ذلك.<br><br><strong>الأمان</strong><br><br>سنتخذ كافة التدابير الممكنة لضمان المحافظة على سرّية كافة المعلومات التي ترسلها إلينا عبر النظام وحمايتها من أي وصول غير مصرح به. ومع ذلك، لا نقدم أي ضمانات على عدم وقوع مثل هذا الوصول غير المصرح به إلى هذه المعلومات. وبالتالي، لن نتحمل أي مسؤولية أو التزام قانوني عن هذا الوصول غير المصرح به إلا إذا كان السبب في حدوث هذا هو إهمال جسيم من جانبنا.<br>&nbsp;ولضمان أمان عملية التسديد عبر الإنترنت وكافة المعاملات الأخرى للبيانات الشخصية، يستخدم الموقع تكنولوجيا تسمى SSL (بروتوكول طبقة المنافذ الآمنة) في موقع الإنترنت. وتعمل تكنولوجيا SSL على تشفير كافة الاتصالات التي تتم بين متصفحك وبين الخوادم الخاصة بنا، وبذلك تبقى المعلومات سرية ونزيهة. وعند رؤية إشارة القفل المغلق على نافذة المتصفح، فإنّ هذا يشير إلى وجود اتصال آمن. لمزيد من المعلومات، يرجى مراجعة مواصفات أمان المتصفح الخاص بك. في حالة تجهيز المتصفح الخاص بك بتكنولوجيا SSL، فإنّ معاملتك الإلكترونية ستكون آمنة تلقائياً.<br><br><strong>الحساب وكلمات المرور</strong><br><br>عند تزويدنا لك باسم مستخدم أو رمز أو كلمة مرور أو معلومات مشابهة تشكل جزءاً من إجراءاتنا الأمنية، يجب عليك التعامل مع هذه المعلومات بسرية تامة في كافة الأوقات وبالتالي فإنك بذلك توافق على عدم إفشائها لأي طرف ثالث.<br>ونحتفظ بحق تجميد أو سحب أو تعطيل أي اسم مستخدم أو رمز أو كلمة مرور في أي وقت من الأوقات إذا ما رأينا حسب تقديرنا الخاص أنك أخفقت في التقيّد بأحكام الاتفاقية.<br>ويقع على عاتقك مسؤولية إبلاغنا إذا ما عرفت أو اشتبهت أن أي شخص آخر غيرك أصبح على دراية باسم المستخدم أو الرمز أو كلمة المرور الخاصين بك في الموقع و/أو على دراية بأي تفاصيل أخرى من المفترض أن تكون سرّية ولا يعرفها أحد غيرك.<br><br><strong>توافر النظام</strong><br><br>نسعى إلى ضمان توافر الموقع دون أي انقطاع وأن تكون الإرساليات خالية من الأخطاء. ومع ذلك، نظراً لطبيعة شبكة الإنترنت، فإننا لا نستطيع ضمان ذلك.<br>نحتفظ بحق سحب أو تعديل الخدمة أو الخدمات التي نقدمها على الموقع الإلكتروني (لأي سبب كان) في أي وقت دون سابق إنذار وحسب تقديرنا الشخصي. وعلاوة على ذلك، قد يتم إيقاف أو تقييد دخولك على الموقع الإلكتروني بين الحين والآخر حتى يتسنى لنا إجراء أعمال الإصلاح والصيانة وتقديم مزايا أو خدمات جديدة. ومع أننا سنحاول تقليل مدى تكرار ومدة هذا الإيقاف أو التقييد، لكننا لا نتحمل المسؤولية عن عدم توافر الموقع الإلكتروني في أي وقت لأي سبب من الأسباب.<br><strong><br>إلغاء الحسابات<br><br></strong>نمتلك الحق لإلغاء حسابك أو تعليقه في أي وقت في حال ارتكابك &quot;وفقا لتقديرنا&quot; خرقا ماديا أو مستمرا لهذه الشروط أو أي بنود أخرى تنطبق على استخدامك لخدمات دليل البناء.<br>كما يحق لك إلغاء حسابك مع دليل البناء في أي وقت باتباع التعليمات عند تسجيل الدخول إلى حسابك من خلال التطبيقات أو الموقع. وعليه إذا تم الغاء حسابك قبل نهاية الشهر أو السنة الحالية المدفوعة، يعتبر سريان الإلغاء فوري ولا يحق لك استرداد أي رسوم مدفوعة مقدما.<br>إذا تم إلغاء حسابك: (أ) سيتم إلغاء تنشيط حسابك أو حذفه؛ (ب) جميع حقوقك الممنوحة بموجب هذه الشروط ستنتهي على الفور؛ (ج) قد يتم حذف جميع البيانات والمحتوى من أنظمتنا على الفور. ويقع على عاتقك مسؤولية التأكد من انه قد تم اخذ نسخة احتياطية لأي محتوى أو بيانات قد تحتاج لها قبل عملية الإلغاء. مع العلم انه لا يمكن استرداد المحتوى بعد إلغاء حسابك. ونحن لسنا مسؤولين عن أي خسارة أو ضرر لك نتيجة لإلغاء حسابك،<br><br><strong>سياسة الاستخدام العادل</strong><br><br>بإنشائك حساب يعني موافقتك على استخدام خدمة دليل البناء بطريقة عادلة (بما في ذلك، إذا كان اشتراكك يحتوي على عدد &#39;غير محدود&#39; من الفروع/المستخدمين). إذا تم تحديد ان استخدامك لخدمات دليل البناء غير عادل أو أن استخدامك يتسبب في تدهور أداء خدمات دليل البناء سواء بالنسبة لك أو لمستخدمين آخرين، يجوز لنا فرض قيود على استخدامك لخدمات دليل البناء. في حال تطبيق ذلك، سوف نسعى إلى تقديم إشعار مسبق قبل 24 ساعة على الأقل ونطالبك فيه على تقليل استخدامك قبل فرض أي قيود.توافق متصفح الويب<br>لاستخدام النظام عبر متصفح الويب، ننصحك باستخدام أحد المتصفحات التالية أو متصفح مكافئ لمتصفحات &nbsp;كروم 54، أو فايرفوكس 49 أو سفاري 10. ويتعين أن يدعم المتصفح الذي تستخدمه تقنية التشفير &quot;طبقة المنافذ الآمنة&quot; و&quot;جافا سكريبت&quot;. وأي تعطيل لهذه الميزات أو استخدام متصفحات قديمة غير متوافقة قد يحدّ من فعالية وظائف الموقع.</p>
                    <p dir="RTL"><br></p>
                    <p dir="RTL"><br></p>
                    <p><strong>سياسة الإلغاء</strong></p>
                    <p><br></p>
                    <p><br>يحق للطرف الثاني الغاء العقد قبل إكمال ٤٠ يوم من تاريخ بداية العقد.<br><br><br><br><strong>سياسة الاسترجاع &nbsp;</strong></p>
                    <p><br>تترتب سياسة استرجاع المبلغ تحت سياسة إلغاء العقد في حال الغاء العقد قبل اكمال ٤٠ يوم من تاريخ بداية العقد حق للطرف الثاني استرداد المبلغ ،وفي حال تجاوز مدة ٤٠ يوم لايحق للطرف الثاني المطالبه بأسترداد المبلغ</p>
                    <p dir="RTL"><br><strong>حقوق الطبع</strong><br>&nbsp;وتشمل المحتوى، التنظيم، الرسوم البيانية، التصميم، التجميع، الترجمة الإلكترونية، التحويل الرقمي، وغير ذلك من الأمور المتعلقة بالنظام، وتخضع جميع هذه الأمور للحماية بموجب قوانين حقوق الملكية والأسماء التجارية، وغير ذلك من الحقوق بما فيها حقوق الملكية الفكرية. ويمنع منعاً مطلقاً نسخ، إعادة توزيع، استخدام، أو طبع أي من هذه المواد أو أي جزء منها من الموقع أو من أية مواقع أخرى، إلا في الحدود التي تسمح بها القوانين السارية في المملكة العربية السعودية في هذا الشأن. وذلك يعني أنك لن تستحوذ على الحق في أي محتوى أو مستند أو غير ذلك من المواد التي تراها من خلال الموقع. كذلك، فإن تدوين أية معلومات أو مواد على الموقع<br>لا ينبغي اعتبارها على أنها تشكل تنازلاً عن حقوق الملكية بالنسبة لتلك المواد.<br><br><strong>الترابط مع مواقع أخرى</strong><br><br>يضم الموقع صلات ربط مع مواقع أخرى، وهنا أيضاً نحن لسنا مسؤولين عن محتوى تلك المواقع أو دقة المعلومات أو الآراء الواردة بها، كما إن تلك المواقع لا تخضع من جانبنا للاستقصاء أو المراقبة من حيث صحة المعلومات أو شموليتها. وإن إضافة رابط على الموقع لأي موقع آخر لا يعتبر موافقة منا على الموقع ذاته، فإذا رغبت في الانتقال من موقعنا إلى أي من تلك المواقع، فإنك تقوم بذلك على مسؤوليتك بمفردك.<br><br><strong>أحكام عامة</strong><br>تشكل هذه الاتفاقية مجمل الاتفاق المبرم بينك وبين دليل البناء فيما يتعلق باستخدامك للنظام وتحلّ هذه الاتفاقية محلّ أي تفاهمات أو اتفاقيات سابقة (سواءً كانت خطية أو شفهية) وتلغي أي مطالبات أو تعهدات أو تفاهمات عُقدت بيننا فيما يتعلق بهذا الموضوع، ولا يجوز تعديل أو تنقيح هذه الاتفاقية إلا إذا تم توفير هذا التعديل أو التنقيح على هذا الموقع.<br>يتم توفير خدمات دليل البناء للاستخدام في الأعمال التجارية و الشخصي بما يعتمد عليه التطبيق من خصائص خاصة بالمؤوسسات و الشركات لنشر منتجاتهم و دليل لمحتواهم و يعد دليل للبحث عن الافضل من المنتجات اما الاستخدام الخاص للافراد بحدود البحث عن الافضل، لذلك أنت لست بمثابة مستهلك. في حدود ما يسمح به القانون المعمول به، لا تنطبق أي أحكام قانونية أو غيرها من أحكام حماية المستهلك على خدمات دليل البناء او على هذه الشروط أو علاقتنا معك.<br>إذا أصبح أي بند أو أي بند جزئي في هذه الاتفاقية غير صالح أو غير قانوني أو غير قابل للنفاذ، يجب تعديله إلى الحد الأدنى اللازم كي يصبح صالحاً وقانونياً وقابلاً للنفاذ. وإذا تعذر هذا التعديل، يتم اعتبار ذلك البند أو البند الجزئي لاغياً. وأي تعديل أو حذف من هذا القبيل لأي بند أو بند جزئي لا يؤثر على صلاحية وقانونية باقي أحكام وبنود الاتفاقية.<br>وإذا اخترنا عدم إنفاذ أي حق قانوني نتمتع به ضدك في أي وقت معين، فهذا لا يمنعنا من ممارسة أو إنفاذ ذلك الحق في وقت لاحق.<br>حررت هذه الاتفاقية باللغة العربية. وإذا تمت ترجمة الاتفاقية إلى لغة أخرى غير العربية، تكون النسخة العربية هي النسخة المُلزمة.<br>يجب إصدار أي إشعار تقتضيه أو يتعلق بهذه الاتفاقية باللغة العربية. ويجب أن تكون كافة الوثائق الأخرى المقدمة بموجب أو بما يتعلق بهذه الاتفاقية باللغة العربية، أو أن تقترن بترجمة إنجليزية معتمدة. وإذا تمت ترجمة هذه الوثائق إلى أي لغة أخرى غير العربية، تكون النسخة العربية هي النسخة المُلزمة إلا إذا كانت الوثيقة ذات طبيعة دستورية أو إلزامية أو ذات طبيعة رسمية أخرى.<br>لا يحق لأي شخص ليس طرفاً في هذه الاتفاقية إنفاذ أحكام هذه الاتفاقية، فيما عدا مجموعة شركاتنا والشركات التابعة لنا أو موظفينا أو مندوبينا.<br>ولا يجوز لك نقل أي من حقوقك وواجباتك التي تنص عليها هذه الاتفاقية لأي شخص آخر (وهذا يشمل على سبيل المثال لا الحصر، أي نقل للحقوق على سبيل التنازل أو الترخيص الفرعي).<br><br><strong>القانون المعمول به والاختصاص القضائي<br><br></strong>إنّ هذه الاتفاقية وأية نزاعات أو مطالبات ناشئة عن أو تتعلق بها أو بموضوعها أو صياغتها (بما في ذلك النزاعات أو المطالبات غير التعاقدية) تحتكم إلى وتُفسّر وفقاً لقوانين المملكة العربية السعودية.<br><br><br>يوافق طرفا هذه الاتفاقية على أن تكون محاكم المملكة العربية السعودية هي الجهة القضائية الحصرية التي تبتّ في أي نزاعات أو مطالبات ناشئة عن أو تتعلق بهذه الاتفاقية أو بموضوعها<br>أو صياغتها (بما في ذلك النزاعات أو المطالبات غير التعاقدية).<br><br><br><strong>دليل البناء</strong></p>
                    <p dir="RTL">&nbsp;</p>
                </article>
            </div>
        </div>
    </div>
</main>

@endsection



@section('footer')
<!--Javascript login assets-->
<!--<script type="text/javascript" src="https://daleelalbenaa.com/front/helpers/js/jquery-3.2.1.min.js"></script>-->
<script type="text/javascript" src="{{url('public/design/mandoby/query_files/semantic.min.js')}}"></script>
<!--<script type="text/javascript" src="https://daleelalbenaa.com/front/helpers/js/jquery.easing.1.3.js"></script>-->
<!--<script type="text/javascript" src="https://daleelalbenaa.com/front/helpers/js/moveit.js "></script>-->
<!--<script type="text/javascript" src="https://daleelalbenaa.com/front/helpers/js/jquery.sticky-kit.min.js "></script>-->
<!--<script type="text/javascript" src="https://daleelalbenaa.com/front/helpers/js/owl.carousel.min.js "></script>-->
<script type="text/javascript" src="{{url('public/design/mandoby/query_files/jquery.mCustomScrollbar.concat.min.js')}} "></script>
<script type="text/javascript" src="{{url('public/design/mandoby/query_files/scrollreveal.min.js')}} "></script>
<!--<script type="text/javascript" src="https://daleelalbenaa.com/front/helpers/js/jquery.toast.min.js "></script>-->
<script type="text/javascript" src="{{url('public/design/mandoby/query_files/main.js')}}"></script>
<script type="text/javascript" src="{{url('public/design/mandoby/query_files/front-common.js')}}"></script>
<!--<script type="text/javascript" src="https://daleelalbenaa.com/vendors/numeric/jquery.numeric.js "></script>-->
@endsection


