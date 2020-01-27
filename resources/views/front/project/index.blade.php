@extends('front.layout.master')

@section('title')
المشروعات
@endsection

@section('header')
<style>
    .search {
        background: #FFF !important
    }

    @media (min-width: 768px) {
        .search {
            background-color: #FFF;
            margin-left: 135px;
            width: 100%;

        }
    }
    
    th{
        text-align: center; vertical-align: middle !important
    }
    
    .mile hr:last-child {display: none}

</style>
@endsection

@section('content')
<!--====================== start div of select  -==================================================-->

<div class="container re-size" style="margin-bottom:40px; margin-top:230px" >
    <div class="row">
        <div class="col-md-12">

            <div class="row">
                <section class="data-table" >
                    <div class="row">
                        <div class="container">
                            @if(Auth::user()->permission == 2)
                            <a href="{{url('projects/create')}}" class="btn btn-success btn-add" style="background: #0067ab !important; font-size: 20px !important;">
                                <i class="fa fa-plus"></i>
                                اضافه مشروع
                            </a>
                            @endif
                            @if(Auth::user()->permission == 2)
                            <div class="panel panel-primary">
                            @else
                            <div class="panel panel-primary" style="margin-top:40px">
                            @endif
                                <div class="panel-heading">{{$title}}</div>
                                <div class="panel-body" style="width:95%; margin:0 auto; overflow-x:auto">
                                    <table id="example" class="table table-striped table-bordered  no-footer" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>عنوان المشروع</th>
                                                <th>المدينه</th>
                                                <th>تفاصيل المشروع</th>
                                                <th>صاحب المشروع</th>
                                                <th>الشركه المنفذه للمشروع</th>
                                                <th>المرفقات</th>
                                                <th>عدد العروض</th>
                                                @if(isset($projects[0]->status) && $projects[0]->status > 0)
                                                <th>التكلفه الاجماليه</th>
                                                @endif
                                                <th class="text-center">عرض</th>
                                                <!-- check if the user is owner && project is not started -->
                                                @if(Auth::user()->permission == 2 &&(isset($projects[0]->status) && $projects[0]->status == 0))
                                                <th class="text-center">حذف</th>
                                                @endif
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($projects as $key => $project)
                                            <tr class="">
                                                <td>{{$key+1}}</td>
                                                <td class="text-center center-vc">{{$project->title}}</td>
                                                
                                                <td class="text-center center-vc">{{ksaCities()[$project->city]}}</td>
                                                
                                                <td style="width:300px;" class="text-center"><textarea style="height:115px; width:95%; min-width: 120px;">{{$project->desc}}</textarea></td>
                                                                                                
                                                                                                
                                                @if(isset($project->owner->id))
                                                <td class="text-center center-vc"><a class="update_user_link" data-toggle="modal"  href="{{url('reviews').'/'.$project->owner->id}}"  style="cursor:pointer">{{$project->owner->name}}</a></td>
                                                @else
                                                <td>بيانات العضو لم تعد مسجله لدينا</td>
                                                @endif

                                                @if(isset($project->company->id))
                                                <td class="text-center center-vc"><a class="update_user_link" data-toggle="modal" href="{{url('reviews').'/'.$project->company->id}}" style="cursor:pointer">{{$project->company->name}}</a></td>
                                                @elseif(!empty($project->company_id))
                                                <td>بيانات العضو لم تعد مسجله لدينا</td>
                                                @else
                                                <td class="text-center center-vc">لا يوجد حتى الان</td>
                                                @endif

                                                <td class="text-center center-vc">
                                                    @if(isset($project->attachment_id))
                                                    @foreach(json_decode($project->attachment_id) as $val)
                                                    @if(isset(\App\Attachment::find($val)->path))
                                                    <a href="{{url('public/upload')}}/{{\App\Attachment::find($val)->path}}" target="_blank">
                                                        {{\App\Attachment::find($val)->name}} <br>
                                                    </a>
                                                    @endif
                                                    @endforeach
                                                    @endif
                                                </td>
                                                <td class="text-center center-vc">( {{$project->offers->count()}} )</td>
                                                @if(isset($projects[0]->status) && $projects[0]->status > 0)
                                                <td class="text-center center-vc mile" style="width:200px;">
                                                    <a href="{{url('messages').'/'.$project->awardOffer->id}}#milestone" target="_blank">
                                                        {{$project->awardOffer->milestones->sum('value')}}&nbsp; <span>ريال سعودى</span>
                                                    </a>
<!--                                                
                                                    @foreach($project->awardOffer->milestones as $key => $milestone)
                                                    <span>{{$milestone->desc}}</span> &nbsp;
                                                    <a href="#">{{$milestone->value}}</a>&nbsp; <span>ريال سعودى</span>
                                                   <hr>
                                                    @endforeach
-->
                                                </td>
                                                @endif
                                                
                                                @if($project->offers->count() > 0)
                                                <td class="text-center" style="vertical-align: middle;"> 
                                                    @if(Auth::user()->permission == 2)
                                                    <a class="btn btn-success btn-sm " href="{{url('projects').'/'.$project->id}}" target="_blank"><i class="fa fa-eye"></i></a>
                                                    @elseif(Auth::user()->permission == 3)
                                                    <a class="btn btn-success btn-sm " href="{{url('messages').'/'.$project->awardOffer->id}}" target="_blank"><i class="fa fa-eye"></i></a>
                                                    @endif
                                                </td>
                                                @else
                                                <td></td>
                                                @endif
                                                
                                                @if(Auth::user()->permission == 2 &&(isset($projects[0]->status) && $projects[0]->status == 0))
                                                <td class="text-center" style="vertical-align: middle;">
                                                    <a class="btn btn-danger btn-sm" href="{{url('projects').'/'.$project->id.'/delete'}}" onclick='return myfuncAr()'><i class="fa fa-trash-o"></i></a>
                                                </td>
                                                @endif
                                            </tr>
                                            @endforeach

                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>#</th>
                                                <th>عنوان المشروع</th>
                                                <th>المدينه</th>
                                                <th>تفاصيل المشروع</th>
                                                <th>صاحب المشروع</th>
                                                <th>الشركه المنفذه للمشروع</th>
                                                <th>المرفقات</th>
                                                @if(isset($projects[0]->status) && $projects[0]->status > 0)
                                                <th>التكلفه الاجماليه</th>
                                                @endif
                                                <th class="text-center">عرض</th>
                                                @if(Auth::user()->permission == 2 &&(isset($projects[0]->status) && $projects[0]->status == 0))
                                                <th class="text-center">حذف</th>
                                                @endif
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>

                        </div>
                    </div>
                </section>
            </div>

        </div>
    </div>
</div>

<!--====================  end div of select =======================================================-->
@endsection


@section('footer')


<script>
    $(function() {
        $('#example').DataTable({
            "language": {
                "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Arabic.json"
            }
        });
    });

</script>
@endsection
