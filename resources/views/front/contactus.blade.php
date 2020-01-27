@extends('front.layout.master')

@section('title')
اتصل بنا
@endsection

@section('header')
<style>
    .help-block {
        margin-top: -25px !important;
    }
    .fields .panel-heading {
        border-color: #EEE !important;
        border-top-left-radius: 0;
        border-top-right-radius: 0;
        padding: 16px 15px;
        background: #0067ab !important;
        color: #FFF !important
    }
    textarea.form-control{font-size:21px !important}
    .fields .panel-body {
        padding-top: 28px;
    }
</style>
@endsection

@section('content')
<div class="re-size fields contact-us" style=" margin-top:320px; margin-bottom:120px">
    <div class="container" style="">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">

                    <div class="panel-heading">اتصل بنا</div>
                    <div class="panel-body">
                        <div class="data-1 no-show def">
                            <div class="non">
                                <div class="row">
                                    <form method="POST" action="{{url('contact-us')}}">
                                        {{ csrf_field() }}
                                        <div class="col-sm-6">
                                            <label for="company_name">
                                                اسم الشركة
                                            (اختياري)
                                            </label>
                                            <input name="company_name" type="text" placeholder="اسم الشركة" id="company_name" >

                                            @if ($errors->has('company_name'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('company_name') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                        <div class="col-sm-6">
                                            <label for="name">الاسم </label>
                                            <input name="name" type="text" id="name" placeholder="الاسم" required>
                                            @if ($errors->has('name'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('name') }}</strong>
                                            </span>
                                            @endif
                                        </div>

                                        <div class="col-sm-12">
                                            <label for="email">البريد الالكتروني</label>
                                            <input class=" " id="email" placeholder="البريد الالكتروني" name="email" type="email" autocomplete="off" required>
                                            <!-- For array -->
                                            @if ($errors->has('email'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                        <div class="col-sm-12">
                                            <label for="message">الرسالة</label>
                                            <textarea name="message" id="message" class="form-control" rows="9" cols="25" placeholder="الرسالة" required minlength="10"></textarea>
                                        </div>
                                        @if ($errors->has('message'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('message') }}</strong>
                                        </span>
                                        @endif

                                        <div class="col-xs-6 col-xs-offset-6 text-right" style="padding-left:50px;margin-top: 30px;">
                                            <button class="btn btn-primary" type="submit" style="background-color:#7cbb29;padding-left:20px;padding-right:20px">ارسال</button>
                                        </div>
                                        
                                    </form>
                                </div>
                                <!-- /.col -->
                            </div>
                        </div>

                    </div> <!-- end of def -->

                </div>
            </div>
        </div>
    </div>
</div>


@endsection



@section('footer')

@endsection
