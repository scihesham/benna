@extends('front.layout.master')

@section('title')
{{$user->name}}
@endsection

@section('header')
<link rel="stylesheet" href="{{url('public/design/mandoby/fxss-rate/rate.css')}}">
<style>
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





    th {
        display: none
    }

    .first-td {
        display: none
    }

    .table>tbody>tr>td {
        padding: 0
    }

    .panel-default {
        border: none !important
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
        margin-bottom: 30px;
        box-shadow: none !important
    }

    .panel-body {
        padding-top: 30px
    }

    td {
        background: none !important;
        border-top: none !important;
        border-bottom: none !important;
        border-right: none !important;
    }

    .table-bordered>tbody>tr>td {
        border-left: none
    }

    .table-striped>tbody>tr:nth-of-type(odd) {
        background: none !important
    }

    table.dataTable.no-footer {
        border-left: none
    }

    .dataTables_length {
        display: none
    }

    #example_filter {
        display: none
    }


    .rate_text {
        margin-bottom: 30px;
        margin-top: 10px;
        /*        color: #1b78b3 !important;*/
        font-size: 20px !important;
        line-height: 0 !important;
        display: block !important;
    }

    svg.icon {
        font-size: 34px !important
    }

    .project-rev svg.icon {
        font-size: 32px !important
    }
    
    
@media(max-width:768px){
    .margin-sm{
        margin-top: 20px;
    }
}

</style>
@endsection

@section('content')

<div class="container re-size" style="margin-top: 250px; margin-bottom:0px; font-size:17px">
    <div class="row animatee" style="margin-top:30px">
        <?php
            $user_type = $user->permission == 2 ? 'projectOwners' : 'projectCompanies';
        ?>

        <div class="col-md-3">
            <div class="panel panel-default user-info">
                <div class="panel-heading"><i class="fa fa-user" style="margin-left: 12px;"></i>{{$user->name}}</div>
                <div class="panel-body" style="text-align:center; height:124px; padding-top:19px">
                    <div class="col-md-12">
                        @if(empty($user->attachment_id))
                        <img src="{{url('public/design/adminlte/dist/img/avatar.png')}}" style="max-width:37%; " class='img-circle'>
                        @else
                        <img src="{{url('public/upload')}}/{{$user->attachment->path}}" style="max-width:45%; border-radius:9%;max-height:85px" class='img-circle'>
                        @endif
                    </div>

                </div>
            </div>
        </div>

        <div class="col-md-9">
            <div class="panel panel-default">
                <div class="panel-heading"><i class="fa fa-bar-chart" style="margin-left: 12px;"></i>احصائيات</div>
                <div class="panel-body" style="text-align:center">
                    <div class="col-xs-4" style="font-size:32px; color:green">
                        <b>{{$user->$user_type->where('status', '0')->count()}}</b>
                    </div>
                    <div class="col-xs-4" style="font-size:32px; color:green">
                        <b>{{$user->$user_type->where('status', '1')->count()}}</b>
                    </div>
                    <div class="col-xs-4" style="font-size:32px">
                        <b>{{$user->$user_type->where('status', '2')->count()}}</b>
                    </div>

                    <div class="col-xs-12" style="padding:0">
                        <div class="col-xs-4" style="font-size:16px; color:#999999">مشاريع مفتوحه</div>
                        <div class="col-xs-4" style="font-size:16px; padding:0; color:#999999">مشاريع قيد التنفيذ</div>
                        <div class="col-xs-4" style="font-size:16px; color:#999999">مشاريع مكتمله</div>
                    </div>
                </div>
            </div>
        </div>
        
        @if($user->permission == 3)
        
        <?php
            if($user->type == 0){
                $company_type = 'personal';
            }
            else if($user->type == 1){
                $company_type = 'company';
            }
            else if($user->type == 2){
                $company_type = 'institute';
            }
        ?>
        

        @if($company_type == 'company' || $company_type == 'institute')
        <div class="col-md-12" style="margin-top:50px">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="fa fa-address-card" aria-hidden="true" style="margin-left: 12px;"></i>
                    بيانات التواصل</div>
                <div class="panel-body" style="text-align:center">
                    <div class="col-sm-6" style="font-size:28px; color:green">
                        <b>{{$user->$company_type->website}}</b>
                        <div class="text-center" style="font-size:16px; padding:0; color:#999999">الموقع الالكتروني</div>
                    </div>
                    <div class="col-sm-6 margin-sm" style="font-size:28px;">
                        <b>{{$user->$company_type->contact_social}}</b>
                        <div class="" style="font-size:16px; color:#999999">موقع التواصل الاجتماعي</div>
                    </div>


                        
                        
                </div>
            </div>
        </div>
                
        @endif
        
        @endif
        
    </div>
</div>
@if($user->permission == 3)

        <div class="container" style="margin-top: 50px; margin-bottom:80px; font-size:17px">
            <div class="row animatee" style="margin-top:0px">

                <div class="col-sm-12" style="padding:11px; margin:30px auto; margin-top:0">
                    <label>نبذة عن المنشأة</label>
                    <textarea class="form-control" name="notes" rows="8" disabled style="font-size:22px; resize:none">{{$user->$company_type->notes}}
                    </textarea>

                </div>

            </div>
        </div>

@endif
<!--------------- reviews ------------->
<div class="container" style="margin-top:-20px">
    <div class="row">
        <div class="col-md-12">
            <div class="row ">
                <section class="data-table" style="margin-bottom:40px">
                    <div class="row">
                        <div class="container">
                            <div class="panel panel-primary" style="margin-top:40px">
                                <div class="panel-heading" style="background:none !important; color: #000 !important">
                                    <span class="col-sm-3" id="rateBox" style="margin-top:-47px"></span>
                                    <span class="col-sm-4 col-sm-offset-5" style="margin-top:-10px">التقييمات</span>
                                </div>

                                <div class="panel-body" style="width:95%; margin:0 auto; border:none !important">
                                    <table id="example" class="table table-striped table-bordered  no-footer" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>id</th>
                                                <th>content</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            
                                            $comment = $user->permission == 2 ? 'comment_to_owner' : 'comment_to_company';
                                            $rate = $user->permission == 2 ? 'rating_to_owner' : 'rating_to_company';
                                            
                                            ?>
                                            @foreach ($projects->where('evaluation_status', 1) as $key => $project)
                                            <tr class="">
                                                <td class="first-td">{{$project->id}}</td>
                                                <td style="width:100%; height:100%">
                                                    <a href="#" style="text-decoration:none;color:#000">
                                                        <div class="panel panel-default">
                                                            <div class="panel-heading"><i class="fa fa-building" style="margin-left: 12px;"></i>{{$project->title}}</div>
                                                            <div class="panel-body">
                                                                <div class="col-sm-4">

                                                                </div>
                                                                <div class="col-sm-8" style="color:#75787d;overflow-wrap: break-word; word-break: break-word; word-wrap: break-word;">
                                                                    {{$project->rating->$comment}}
                                                                </div>

                                                                <div class="col-sm-12" style="margin-top:30px">
                                                                    <span class="project-rev" id="project-{{$project->id}}"></span>
                                                                </div>
                                                                <!--
                                                                <div  class="col-sm-12" style="margin-top:20px">
                                                                    <div class="col-sm-12" style="padding:0">
                                                                       <b style="color:#75787d; margin-left:3px">العروض</b> <b>{{$project->offers->count()}}</b>
                                                                    </div>
                             
                                                                </div>
-->

                                                                <div class="col-sm-4" style="margin-top:20px; direction:ltr">
                                                                    {{$project->rating->updated_at->format('h:i a')}}
                                                                </div>
                                                                <div class="col-sm-8" style="margin-top:20px">
                                                                    {{$project->rating->updated_at->format('Y-m-d')}}
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </td>

                                            </tr>
                                            @endforeach

                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>id</th>
                                                <th>content</th>
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

@endsection



@section('footer')
<script src="{{url('public/design/mandoby/fxss-rate/rate.js')}}"></script>

<script>
    $("#rateBox").rate({
        length: 5,
        value: "{{$user->rating}}",
        readonly: true,
        size: '48px',
        selectClass: 'fxss_rate_select',
        incompleteClass: 'fxss_rate_no_all_select',
        customClass: 'custom_class',
        callback: function(object) {
            //            console.log(object);
            $('#rate').val(object.index + 1);
        }
    });


    @foreach($projects as $key => $project)
    var id = "{{$project->id}}";
    $("#project-" + id).rate({
        length: 5,
        value: "{{$project->rating->$rate}}",
        readonly: true,
        size: '48px',
        selectClass: 'fxss_rate_select',
        incompleteClass: 'fxss_rate_no_all_select',
        customClass: 'custom_class',
        callback: function(object) {
            //            console.log(object);
            $('#rate').val(object.index + 1);
        }
    });
    @endforeach

</script>

<script>
    $(function() {
        $('#example').DataTable({
            "language": {
                "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Arabic.json",
            },
            "order": [
                [0, "desc"]
            ],
        });
    });

</script>

@endsection
