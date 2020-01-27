<!--<div class="panel panel-default">-->
<!--    <div class="panel-body">-->
@include('admin.partials.update')
<form method="" action="#">
    <!--            @csrf-->
    <!--            <input name="_method" type="hidden" value="PATCH" />-->
    <div class="panel panel-default">
        <div class="panel-body">
            <div class="form-group">
                <label>تفاصيل العرض</label>
                <textarea class="form-control" cols="50" rows="10">{{$offer->offer->desc}}</textarea>            
            </div>
            <div class="form-group">
                <label>حاله الاتصال</label>
                @if($offer->communication_status == 0)
                <input class="form-control" value="لم يتم الرد بعد">
                @elseif($offer->communication_status == 1)
                <input class="form-control" value="تم التواصل">
                @elseif($offer->communication_status == 2)
                <input class="form-control" value="تم عمل حجب للاتصال من قبل {{$offer->user->name}}">
                @endif            
            </div>
            <div class="form-group">
                <label>المرفقات</label><br>
                @foreach(json_decode($offer->offer->attachment_id) as $val)
                @if(isset(\App\Attachment::find($val)->path))
                <a href="{{url('public/upload')}}/{{\App\Attachment::find($val)->path}}" target="_blank">
                    {{\App\Attachment::find($val)->name}} <br>
                </a>
                @endif
                @endforeach
            </div>
        </div>
    </div>
    <div class="modal-footer edit-modal">
        <button type="button" class="btn btn-default pull-right" data-dismiss="modal">غلق</button>
    </div>
</form>
<!--    </div>-->
<!--</div>-->
