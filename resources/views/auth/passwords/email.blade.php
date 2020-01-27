@extends('front.layout.master')

@section('title')
استعاده كلمه السر
@endsection

@section('header')

@endsection

@section('content')
<div class="container re-size" style="margin-top: 180px; margin-bottom:80px">
    <div class="row">

        <div class="col-md-12">

            <div class="">

                <div class="row animate">
                    <div class="col-xs-12 col-sm-8 col-md-12 col-sm-offset-2 col-md-offset-2">
                        <form role="form" method="post" action="{{ url('reset_password_without_token') }}" style="width: 90%; margin: 0 auto;">
                            {{ csrf_field() }}
                            <h3 style="overflow-x:unset !important">
                                استعاده
                                <small>
                                    كلمه السر
                                </small></h3>
                            <hr class="">
                            
                            <div class="row">
                                    @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                
                                    <div class="form-group">
                                    <input type="email" name="email" id="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }} input-lg" placeholder="البريد الالكتروني " tabindex="4" value="{{ old('email') }}" required style="width:60%; margin: 0 auto">
                                </div>
                                
                            <hr class="">    
                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    ارسال
                                </button>
                            </div>
                        </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection