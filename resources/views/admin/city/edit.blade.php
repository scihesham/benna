@section('footer')


<!--<div class="panel panel-default">-->
<!--    <div class="panel-body">-->
        @include('admin.partials.update')
        <form method="post" action="{{url('admin/cities').'/'.$city->id}}" >
            {{ csrf_field() }}
            <input name="_method" type="hidden" value="PATCH" />
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="form-group">
                        <label>المدينه</label>
                        <input type="text" name="name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" value="{{ $city->name }}" required>
                    </div>
                    
                    <div class="form-group">
                        <label>الترتيب</label>
                        <input type="text" name="ordering" class="form-control{{ $errors->has('ordering') ? ' is-invalid' : '' }}" value="{{ $city->ordering }}" required>
                    </div>
                    
                </div>
            </div>
            <div class="modal-footer edit-modal">
                <button type="button" class="btn btn-default pull-right" data-dismiss="modal">غلق</button>
                <button type="submit" class="btn btn-primary pull-left">تعديل المدينه</button>
            </div>
        </form>
<!--    </div>-->
<!--</div>-->
