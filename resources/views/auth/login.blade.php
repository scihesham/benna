@extends('front.layout.master')

@section('title')
تسجيل حساب
@endsection

@section('header')

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
<div class="container re-size" style="margin-top: 180px; margin-bottom:80px">
    <div class="row">

        <div class="col-md-12">

            <div class="">

                <div class="row animate">
                    <div class="col-xs-12 col-sm-8 col-md-12 col-sm-offset-2 col-md-offset-2">
                        <form role="form" method="post" action="{{route('login')}}" style="width: 90%; margin: 0 auto;">
                            {{ csrf_field() }}
                            <h3 style="overflow-x:unset !important">
                                تسجيل الدخول
                                <small>
                                    دخول
                                </small></h3>
                            <hr class="">
                            
                            <div class="row">
                                <div class="form-group" style="text-align:center; font-size:22px">
                                    @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div> 
                                    <div class="form-group">
                                    <input type="email" name="email" id="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }} input-lg" placeholder="البريد الالكتروني " tabindex="4" value="{{ old('email') }}" required style="width:60%; margin: 0 auto">
                                </div>
                            </div>
                            <div class="row">
                                    <div class="form-group">
                                        <input type="password" name="password" id="password1" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }} input-lg" placeholder="كلمة المرور" tabindex="5" required autocomplete="new-password" style="width:60%; margin: 0 auto">
                                </div>
                            </div>
                            
                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('تذكرني') }}
                                    </label>
                            </div>
                                                            @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('هل نسيت كلمه السر ؟ ') }}
                                    </a>
                                @endif
                        </div>

                            <hr class="">
                            <div class="row">
                                <div class="col-xs-12 col-md-2"><input type="submit" value="دخول" class="btn btn-primary btn-block btn-lg" tabindex="7"></div>


                            </div>
                        </form>
                    </div>
                </div>

            </div>

        </div>
    </div>
</div>

<!--==========================================================-->

@endsection