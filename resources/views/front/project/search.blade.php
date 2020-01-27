@extends('front.layout.master')

@section('title')
المشروعات
@endsection

@section('header')
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
        color: #FFF !important;
        padding-bottom: 22px
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

</style>
@endsection

@section('content')
<!--====================== start div of select  -==================================================-->

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="row search-cities">
                <section class="data-table" style="margin-top:220px;margin-bottom:40px">
                    <div class="row">
                        <div class="container">
                            <div class="panel panel-primary" style="margin-top:0px">

                                <div class="panel-heading" style="background:none !important; color: #000 !important">
                                    <span class="col-sm-8 filter" style="">
                                        <select class="form-control" id="city-filter" style="font-size:17px">
                                            <option value="all">جميع المدن</option>
                                            @foreach(ksaCities() as $key => $val)
                                            @if(!empty($city_num) || $city_num=='0')
                                            <option value="{{$key}}" {{$city_num == $key ? 'selected' : ''}}  >{{$val}}</option>
                                            @else
                                            <option value="{{$key}}">{{$val}}</option>
                                            @endif
                                            @endforeach
                                        </select>
                                    </span>
                                    <span class="col-sm-4" style="margin-top:-10px">{{$title}}</span>
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
                                            @foreach ($projects as $key => $project)
                                            <tr class="">
                                                <td class="first-td">{{$project->id}}</td>
                                                <td style="width:100%; height:100%">
                                                    <a href="{{url('offer/project').'/'.$project->id}}" style="text-decoration:none;color:#000" target="_blank">
                                                        <div class="panel panel-default">
                                                            <div class="panel-heading">
                                                                <i class="fa fa-building" style="margin-left: 12px;"></i>{{$project->title}}
                                                                <span style="float:left">{{$project->id}}</span>
                                                            </div>
                                                            <div class="panel-body">
                                                                <div class="col-sm-4">

                                                                </div>
                                                                <div class="col-sm-8" style="color:#75787d;overflow-wrap: break-word; word-break: break-word; word-wrap: break-word;">
                                                                    {{$project->desc}}
                                                                </div>

                                                                <div class="col-sm-12" style="color:#75787d;overflow-wrap: break-word; word-break: break-word; word-wrap: break-word;margin-top:20px; font-weight:bold">
                                                                    <i class="fa fa-map-marker" style="margin-left: 2px;"></i>
                                                                    {{ksaCities()[$project->city]}}
                                                                </div>
                                                                <div  class="col-sm-12" style="margin-top:20px">
                                                                    <div class="col-sm-12" style="padding:0">
                                                                       <b style="color:#75787d; margin-left:3px">العروض</b> <b>{{$project->offers->count()}}</b>
                                                                    </div>
                             
                                                                </div>
                                                                
                                                                <div class="col-sm-4" style="margin-top:20px; direction:ltr">
                                                                    {{$project->created_at->format('h:i a')}}
                                                                </div>
                                                                <div class="col-sm-8" style="margin-top:20px">
                                                                    {{$project->created_at->format('Y-m-d')}}
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
<?php
    if(count($_GET) > 0){
        $query_param = '?';
        foreach($_GET as $key => $val){
            $query_param .=  $key.'='. $val.'&';
        }
    }

?>

<?php
//    if(isset($_GET['keyword'])){
//        
//    }
?>
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
        var keyword = '';
        @if(isset($_GET['keyword']))
        var keyword = "{{$_GET['keyword']}}";
        @endif
        // bind change event to select
        $('#city-filter').on('change', function() {
            var val = $(this).val(); // get selected value
            if (val) { // require a URL
                window.location = "{{url('search/projects')}}?city=" + val + "&keyword=" + keyword; // redirect
            }
            //          window.location = "{{url('search/projects')}};
            return false;
        });
    });

</script>
<script>
    
</script>
@endsection
