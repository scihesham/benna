<!--<div class="panel panel-default">-->
<!--    <div class="panel-body">-->
@include('admin.partials.update')
<form method="" action="#">
    <!--            @csrf-->
    <!--            <input name="_method" type="hidden" value="PATCH" />-->
    <div class="panel panel-default">
        <div class="panel-body">
                            <div class="form-group" style="margin-top:10px">
                                <label for="content">
                                    مبلغ العموله
                                </label>
                                <input name="money" type="number" id="money" class="form-control" rows="9" cols="25" placeholder="مبلغ العموله" step=".01" required value="{{$invoice->receipt->money}}">
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
                                <input name="transfer_name" type="text" id="transfer_name" class="form-control" placeholder="اسم المحول" required value="{{$invoice->receipt->transfer_name}}">
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
                                    <option value="{{$bank}}" {{$invoice->receipt->bank == $bank ? 'selected' : ''}}>{{$bank}}</option>
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
                                <input name="bank_from" type="text" id="bank_from" class="form-control" value="{{$invoice->receipt->bank_from}}" required>
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
                            <input name="transfer_time" type="text" id="" class="form-control datepicker" placeholder="وقت التحويل" required value="{{$invoice->receipt->transfer_time}}">
                            @if ($errors->has('transfer_time'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('transfer_time') }}</strong>
                            </span>
                            @endif
                        </div>


                        <div class="form-group" style="margin-top:10px">
                            <label for="content">

                                ملاحظات
                            </label>
                            <textarea name="notes" id="content" class="form-control" rows="9" cols="25" placeholder="ملاحظات">{{$invoice->receipt->notes}}</textarea>
                            @if ($errors->has('notes'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('notes') }}</strong>
                            </span>
                            @endif
                        </div>
            
                        <div class="form-group" style="margin-top:10px">
                            <i class="fa fa-paperclip" aria-hidden="true" style="margin-left: 4px;"></i>
                            <label for="content">

                                الملحقات
                            </label>
                                <a href="{{url('public/upload')}}/{{$invoice->receipt->attachment->path}}" target="_blank">
                                        {{$invoice->receipt->attachment->name}}
                                </a>
                        </div>

        </div>
    </div>
    <div class="modal-footer edit-modal">
        <button type="button" class="btn btn-default pull-right" data-dismiss="modal">غلق</button>
    </div>
</form>
<!--    </div>-->
<!--</div>-->
