@extends('front.layout.master')

@section('title')
المستقلين
@endsection

@section('header')
<link rel="stylesheet" href="{{url('public/design/mandoby/fxss-rate/rate.css')}}">
<style>
    .search-cities {
        background: #FFF !important
    }

    @media (min-width: 768px) {
        .search-cities {
            background-color: #FFF;
            margin-left: 135px;
            width: 100%;

        }
    }
    
    
    @media (max-width: 1199px){
        .re-size {
            margin-top: 15px !important;
        }
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

    /*    *{border: none !important}*/
    #city-filter {
        width: 130px;
        position: absolute;
        left: 0;
        top: -24px;
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

    .re_size{margin-top: 140px}
    
    table.dataTable tbody td {
        border: none !important
    }
</style>
@endsection

@section('content')
<!--====================== start div of select  -==================================================-->

<div class="col-sm-12 re-size" style="margin-top: 240px">
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="row search-cities">
                <section class="data-table" style="margin-bottom:40px">
                    <div class="row">
                        <div class="container">
                            <div class="panel panel-primary" style="">

                                <div class="panel-heading" style="background:none !important; color: #000 !important">
                                    <span class="col-sm-8" style="">
                                    </span>
                                    <span class="col-sm-4" style="margin-top:-17px">المستقلين</span>
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
                                            @foreach (\App\User::where('permission', 3)->get() as $key => $user)
                                            <?php
                                                $user_type = $user->permission == 2 ? 'projectOwners' : 'projectCompanies';
                                            ?>
                                            <tr class="">
                                                <td class="first-td">{{$user->id}}</td>
                                                <td style="width:100%; height:100%">
                                                    <a href="{{url('reviews'.'/'.$user->id)}}" style="text-decoration:none;color:#000" target="_blank">
                                                        <div class="panel panel-default hide-991">
                                                            <div class="panel-heading">
                                                                    @if(empty($user->attachment_id))
                                                                    <i class="fa fa-user" style="margin-left: 12px;"></i>
                                                                    @else
                                                                    <img src="{{url('public/upload')}}/{{$user->attachment->path}}" style="max-width:45%; border-radius:50%;max-height:85px;margin-left: 12px;" class='img-circle'>
                                                                    @endif
                                                                
                                                                {{$user->name}}</div>
                                                            <div class="panel-body">

                                                                <div class="col-md-4" style="font-size:32px; color:green">
                                                                    <b>{{$user->$user_type->where('status', '0')->count()}}</b>
                                                                </div>
                                                                <div class="col-md-4" style="font-size:32px; color:green">
                                                                    <b>{{$user->$user_type->where('status', '1')->count()}}</b>
                                                                </div>
                                                                <div class="col-md-4" style="font-size:32px">
                                                                    <b>{{$user->$user_type->where('status', '2')->count()}}</b>
                                                                </div>

                                                                <div class="col-md-12" style="padding:0">
                                                                    <div class="col-md-4" style="font-size:16px; color:#999999">مشاريع مفتوحه</div>
                                                                    <div class="col-md-4" style="font-size:16px; padding:0; color:#999999;padding-right:15px">مشاريع قيد التنفيذ</div>
                                                                    <div class="col-md-4" style="font-size:16px; color:#999999">مشاريع مكتمله</div>
                                                                </div>

                                                                <div class="col-sm-12" style="margin-top:30px">
                                                                    <span class="user-rev" id="user-{{$user->id}}"></span>
                                                                </div>

                                                            </div>
                                                        </div>
                                                        <!------------------------------------->
                                                        <div class="panel panel-default hide-def">
                                                            <div class="panel-heading">
                                                                    @if(empty($user->attachment_id))
                                                                    <i class="fa fa-user" style="margin-left: 12px;"></i>
                                                                    @else
                                                                    <img src="{{url('public/upload')}}/{{$user->attachment->path}}" style="max-width:45%; border-radius:50%;max-height:85px;margin-left: 12px;" class='img-circle'>
                                                                    @endif
                                                                
                                                                {{$user->name}}</div>
                                                            <div class="panel-body">

                                                                <div class="col-xs-4" style="font-size:22px; color:green">
                                                                    <b>{{$user->$user_type->where('status', '0')->count()}}</b>
                                                                </div>
                                                                <div class="col-xs-4" style="font-size:22px; color:green">
                                                                    <b>{{$user->$user_type->where('status', '1')->count()}}</b>
                                                                </div>
                                                                <div class="col-xs-4" style="font-size:22px; color:green">
                                                                    <b>{{$user->$user_type->where('status', '2')->count()}}</b>
                                                                </div>

                                                                <div class="col-xs-12" style="padding:0">
                                                                    <div class="col-xs-4" style="font-size:14px; color:#999999">مشاريع مفتوحه</div>
                                                                    <div class="col-xs-4" style="font-size:14px; padding:0; color:#999999">مشاريع قيد التنفيذ</div>
                                                                    <div class="col-xs-4" style="font-size:14px; color:#999999">مشاريع مكتمله</div>
                                                                </div>

                                                                <div class="col-sm-12" style="margin-top:30px">
                                                                    <span class="user-rev" id="user-{{$user->id}}"></span>
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

<!--====================  end div of select =======================================================-->
@endsection


@section('footer')
<script src="{{url('public/design/mandoby/fxss-rate/rate.js')}}"></script>

<script>
    $(".rateBox").rate({
        length: 5,
        value: 3,
        readonly: true,
        size: '48px',
        selectClass: 'fxss_rate_select',
        incompleteClass: 'fxss_rate_no_all_select',
        customClass: 'custom_class',
        callback: function(object) {
                        console.log(object);
//            $('#rate').val(object.index + 1);
        }
    });
    
    
    @foreach (\App\User::where('permission', 3)->get() as $key => $user)
    var id = "{{$user->id}}";
    $("#user-" + id).rate({
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


<script>
    $(function() {
        // bind change event to select
        $('#city-filter').on('change', function() {
            var val = $(this).val(); // get selected value
            if (val) { // require a URL
                window.location = "{{url('search/projects')}}?city=" + val; // redirect
            }
            //          window.location = "{{url('search/projects')}};
            return false;
        });
    });

</script>
@endsection



