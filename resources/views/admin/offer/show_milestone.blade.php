<!--<div class="panel panel-default">-->
<!--    <div class="panel-body">-->
@include('admin.partials.update')
<form method="" action="#">
    <!--            @csrf-->
    <!--            <input name="_method" type="hidden" value="PATCH" />-->
    <div class="panel panel-default">
        <div class="panel-body">
            <div class="form-group">
                <label>تكلفيه المشروع الكليه</label>
                <input type="text" class="form-control" value="{{$offer->milestones->sum('value')}}" >
            </div><hr class="yea">
            @foreach($offer->milestones as $key => $milestone)
            <div class="form-group">
                <label>مرحله رقم {{$key+1}}</label>
                <textarea class="form-control" cols="50" rows="5">{{$milestone->desc}}</textarea>            
            </div>
            <div class="form-group">
                <label>السعر</label>
                <input type="text" class="form-control" value="{{$milestone->value}}" >
            </div><hr class="yea">
            @endforeach

        </div>
    </div>
    <div class="modal-footer edit-modal">
        <button type="button" class="btn btn-default pull-right" data-dismiss="modal">غلق</button>
    </div>
</form>
<!--    </div>-->
<!--</div>-->
