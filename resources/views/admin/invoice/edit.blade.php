<!--<div class="panel panel-default">-->
<!--    <div class="panel-body">-->
        @include('admin.partials.update')
        <form method="post" action="{{url('admin/invoice').'/'.$invoice->id}}" >
            {{ csrf_field() }}
            <input name="_method" type="hidden" value="PATCH" />
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="form-group">
                        <label>الحاله *</label>
                        <select name="status" class="select form-control" id='art_name' required>
                            <option value="0" {{$invoice->status == '0' ? 'selected' : ''}}>لم يتم الدفع</option>
                            <option value="1" {{$invoice->status == '1' ? 'selected' : ''}}>تم الدفع</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="modal-footer edit-modal">
                <button type="button" class="btn btn-default pull-right" data-dismiss="modal">غلق</button>
                <button type="submit" class="btn btn-primary pull-left">تعديل الفاتورة</button>
            </div>
        </form>
<!--    </div>-->
<!--</div>-->
