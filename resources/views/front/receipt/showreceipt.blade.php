@extends('front.layout.master')

@section('title')
ايصال دفع
@endsection

@section('header')
<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
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
    
    .ui-widget.ui-widget-content{width: 400px}
    
    textarea.form-control, select.form-control{font-size:22px;}
    select.form-control{height:40px;}

</style>
@endsection

@section('content')

<!--==================================================-->

<div class="container re-size" style="margin-top: 240px; margin-bottom:80px">
    <div class="row animatee color">
        <div class="col-md-12">
            <div class="well well-sm">
                <form method="post" action="{{url('storereceipt').'/'.$invoice_id}}" enctype="multipart/form-data" >
                    {{ csrf_field() }}
                    <h2>
                        ايصال دفع
                    </h2>
                    <hr class="">
                    <div class="row">

                        <div class="cont-center">

                            <div class="form-group" style="margin-top:10px">
                                <label for="content">
                                    مبلغ العموله
                                </label>
                                <input name="money" type="number" id="money" class="form-control"  placeholder="مبلغ العموله" step=".01" required>
                                @if ($errors->has('money'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('money') }}</strong>
                                </span>
                                @endif
                            </div>
                            
                            <div class="form-group" style="margin-top:10px">
                                <label for="content">
                                    اسم المحول
                                </label>
                                <input name="transfer_name" type="text" id="transfer_name" class="form-control" placeholder="اسم المحول" required>
                                @if ($errors->has('transfer_name'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('transfer_name') }}</strong>
                                </span>
                                @endif
                            </div>

                            <div class="form-group" style="margin-top:10px">
                                <label for="content">
                                    البنك المحول اليه
                                </label>
                                <select name="bank" class="form-control" required>
                                    <option value="">...</option>
                                    @foreach(banks() as $key => $bank)
                                    <option value="{{$bank}}">{{$bank}}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('money'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('money') }}</strong>
                                </span>
                                @endif
                            </div>
                            
                            <div class="form-group" style="margin-top:10px">
                                <label for="content">
                                     البنك المحول منه
                                </label>
                                <input name="bank_from" type="text" id="bank_from" class="form-control" placeholder="البنك المحول منه" required>
                                @if ($errors->has('bank_from'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('bank_from') }}</strong>
                                </span>
                                @endif
                            </div>

                        <div class="form-group" style="margin-top:10px">
                            <label for="content">
                                وقت التحويل
                            </label>
                            <input name="transfer_time" type="text" id="" class="form-control datepicker" placeholder="وقت التحويل" required autocomplete="off">
                            @if ($errors->has('transfer_time'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('transfer_time') }}</strong>
                            </span>
                            @endif
                        </div>
                            
                        <div class="form-group">
                            <i class="fa fa-paperclip" aria-hidden="true" style="margin-left: 4px;"></i>
                            <label for="attachment">

                                صوره الايصال
                            </label>
                            <input type="file" class="form-control" name="attachment" id="attachment" placeholder="صوره الايصال" required />
                            @if ($errors->has('attachment'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('attachment') }}</strong>
                            </span>
                            @endif
                        </div>

                        <div class="form-group" style="margin-top:10px">
                            <label for="content">

                                ملاحظات
                            </label>
                            <textarea name="notes" id="content" class="form-control" rows="9" cols="25" placeholder="ملاحظات"></textarea>
                            @if ($errors->has('notes'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('notes') }}</strong>
                            </span>
                            @endif
                        </div>
                        <br>

                        <div class="">
                            <button type="submit" style="margin:10px 0;" class="btn btn-primary pull-right" id="btnContactUs">

                                موافق
                            </button>
                        </div>
                            
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
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
    $(function() {
//        $("#datepicker").datepicker({
//            dayNames: ["Dimanche", "Lundi", "Mardi", "Mercredi", "Jeudi", "Vendredi", "Samedi"],
//            dayNamesMin: ["الاحد", "الاثنين", "الثلاثاء", "Me", "Je", "Ve", "Sa"]
//        });
        
     $( ".datepicker" ).datepicker({
          dayNamesMin: [ "الاحد",
                         "الاثنين",
                         "الثلاثاء",
                         "الاربعاء",
                         "الخميس",
                         "الجمعه",
                         "السبت"],
         isRTL: true,
         dateFormat: "yy-mm-dd",
     });
    });

</script>
@endsection
