@extends('front.layout.master')

@section('title')
اضافه مشروع
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

    .color h2 {
        margin-top: 10px;
        margin-bottom: 10px;
        font-size: 22px;
    }

    select.form-control {
        font-size: 20px !important;
        height: 37px
    }

    textarea {
        resize: none
    }

    textarea.form-control {
        font-size: 22px !important
    }

</style>
@endsection

@section('content')

<!--==================================================-->
<div class="container re-size" style="margin-top:240px; margin-bottom:80px">
    <div class="row animatee color">
        <div class="col-md-12">
            <div class="well well-sm">
                <form method="post" action="{{url('projects')}}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <h2>

                        انشاء مشروع جديد
                    </h2>
                    <hr class="">
                    <div class="row">

                        <div class="cont-center">
                            <div class="form-group">
                                <label for="title">
                                    عنوان المشروع *
                                </label>
                                <input type="text" class="form-control" name="title" id="title" placeholder="العنوان" required="required" />
                                @if ($errors->has('title'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('title') }}</strong>
                                </span>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="city">

                                    المدينه *
                                </label>
                                <select type="text" class="form-control" name="city" id="city" required="required">
                                    <option value="">...</option>
                                    @foreach(\App\City::orderBy('ordering', 'asc')->get() as $key => $city)
                                    <option value="{{$city->id}}">{{$city->name}}</option>
                                    @endforeach

                                </select>
                                @if ($errors->has('city'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('city') }}</strong>
                                </span>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="city">

                                    تصنيف المشروع *
                                </label>
                                <select type="text" class="form-control" name="category" id="category" required="required">
                                    <option value="">...</option>
                                    @foreach(projectCategories() as $key => $cat)
                                    <option value="{{$key}}">{{$cat}}</option>
                                    @endforeach

                                </select>
                                @if ($errors->has('category'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('category') }}</strong>
                                </span>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="title">

                                    ميزانية المشروع المتوقعة (ر.س.)

                                </label>
                                <input type="number" class="form-control" max="9999999999" name="expectbudget" id="expectbudget" placeholder="غير محدده 
" />
                                @if ($errors->has('expectbudget'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('expectbudget') }}</strong>
                                </span>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="expecttime">

                                    مدة التنفيذ المتوقعة

                                </label>
                                <input type="text" class="form-control" name="expecttime" id="expecttime" placeholder="غير محدده 

" />
                                @if ($errors->has('expecttime'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('expecttime') }}</strong>
                                </span>
                                @endif
                            </div>


                            <div class="form-group">
                                <label for="desc">

                                    وصف المشروع *
                                </label>
                                <textarea name="desc" id="desc" class="form-control" rows="9" cols="25" placeholder="وصف المشروع " required></textarea>
                                @if ($errors->has('desc'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('desc') }}</strong>
                                </span>
                                @endif
                            </div>

                            <div class="form-group">
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
                            <div class="">
                                <button type="submit" style="margin:10px 0" class="btn btn-primary pull-right" id="btnContactUs" onclick='return confirmAr()'>

                                    انشاء
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


@endsection
