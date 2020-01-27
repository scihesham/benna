@extends('front.layout.master')

@section('title')
انشاء تذكره نزاع
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

</style>
@endsection

@section('content')

<!--==================================================-->

<div class="container" style="margin-top: 80px; margin-bottom:80px">
    <div class="row animatee">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading"><i class="fa fa-building" style="margin-left: 12px;"></i>{{$milestone->offer->project->title}}</div>
                <div class="panel-body">
                     <div class="col-sm-2 col-sm-offset-3">
                        <input  type="number" class="form-control" value="{{$milestone->value}}" disabled>
                    </div>
                    <div class="col-sm-7" style="padding-right:0 !important; margin-bottom:10px">
                        <input class="form-control" value="{{$milestone->desc}}" disabled>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<div class="container" style="margin-top: -55px; margin-bottom:80px">
    <div class="row animatee color">
        <div class="col-md-12">
            <div class="well well-sm">
                <form method="post" action="{{url('milestone/dispute').'/'.$milestone->id}}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <h2>
                        انشاء تذكره لفض النزاع
                    </h2>
                    <hr class="colorgraph">
                    <div class="row">

                        <div class="cont-center">
                            <div class="form-group" style="margin-top:10px">
                                <label for="content">

                                     التفاصيل
                                </label>
                                <textarea name="content" id="content" class="form-control" rows="9" cols="25" placeholder="التفاصيل" required></textarea>
                                @if ($errors->has('content'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('content') }}</strong>
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

                            <div class="" >
                                <button type="submit" style="margin:10px 0;" class="btn btn-primary pull-right" id="btnContactUs">

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

<!--==========================================================-->
@endsection


@section('footer')

@endsection
