

<a href="{{url('register?action=institute')}}">
<div class="col-sm-3 text-center {{$action == 'institute' ? 'selected' : ''}}" id="institute" data-class="data-4">
    مؤسسه
</div>
    
</a>

<a href="{{url('register?action=company')}}">
<div class="col-sm-3 text-center {{$action == 'company' ? 'selected' : ''}}" id="company" data-class="data-3">شركه </div>
</a>
<a href="{{url('register?action=personal')}}">
<div class="col-sm-3 text-center {{$action == 'personal' ? 'selected' : ''}} " id="personal" data-class="data-2">
    
    شخصي
   <p style="margin-top:5px">مثال : المهندسين والمنفذين بشكل شخصي، مصممين...</p> 
</div>
</a>
<a href="{{url('register?action=owner')}}">
<div class="col-sm-3 text-center {{$action == 'owner' ? 'selected' : ''}}" id="owner" data-class="data-1">
    صاحب مشروع
    
    <p style="margin-top:5px">مثال: طلب بناء، ترميم، إستشارة هندسية، وغيره من أعمال المقاولات....</p>
    </div>
</a>

<br>