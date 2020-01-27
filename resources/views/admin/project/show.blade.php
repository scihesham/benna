<!--<div class="panel panel-default">-->
<!--    <div class="panel-body">-->
@include('admin.partials.update')
<form method="" action="#">
    <!--            @csrf-->
    <!--            <input name="_method" type="hidden" value="PATCH" />-->
    <div class="panel panel-default">
        <div class="panel-body">
            <div class="form-group">
                <label>عنوان المشروع</label>
                <input type="text" name="name" class="form-control" value="{{$project->title}}">
            </div>
            <div class="form-group">
                <label>تفاصيل المشروع</label>
                <textarea class="form-control" cols="50" rows="10">{{$project->desc}}</textarea>
            </div>
            <div class="form-group">
                <label>المرفقات</label><br>
                @if(isset($project->attachment_id))
                    @foreach(json_decode($project->attachment_id) as $val)
                    @if(isset(\App\Attachment::find($val)->path))
                    <a href="{{url('public/upload')}}/{{\App\Attachment::find($val)->path}}" target="_blank">
                        {{\App\Attachment::find($val)->name}} <br>
                    </a>
                    @endif
                    @endforeach
                @endif
            </div>
        </div>
    </div>
    <div class="modal-footer edit-modal">
        <button type="button" class="btn btn-default pull-right" data-dismiss="modal">غلق</button>
    </div>
</form>
<!--    </div>-->
<!--</div>-->
