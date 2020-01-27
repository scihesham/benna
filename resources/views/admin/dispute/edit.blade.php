<!--<div class="panel panel-default">-->
<!--    <div class="panel-body">-->
        @include('admin.partials.update')
        <form method="post" action="{{url('admin/project/offer/disputes').'/'.$dispute->id}}" >
            {{ csrf_field() }}
            <input name="_method" type="hidden" value="PATCH" />
            <div class="panel panel-default">
                <div class="panel-body">
            <div class="form-group">
                <label>ملاحظات</label>
                <textarea class="form-control" cols="50" rows="10" name="notes">{{$dispute->notes}}</textarea>
            </div>

                </div>
            </div>
            <div class="modal-footer edit-modal">
                <button type="button" class="btn btn-default pull-right" data-dismiss="modal">غلق</button>
                <button type="submit" class="btn btn-primary pull-left">تعديل </button>
            </div>
        </form>
<!--    </div>-->
<!--</div>-->
