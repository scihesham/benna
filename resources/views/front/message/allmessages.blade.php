@extends('front.layout.master')

@section('title')
كافه الرسائل
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

</style>
@endsection

@section('content')
<!--====================== start div of select  -==================================================-->

<div class="container re-size-less" style="margin-top:180px;margin-bottom:40px">
    <div class="row">
            <div class="row">
                <section class="data-table" >
                    <div class="row">
                        <div class="container">
                            <div class="panel panel-primary" style="margin-top:20px">


                                <div class="panel-body" style="width:95%; margin:0 auto; border:none !important">
                                    <table id="example" class="table table-striped table-bordered  no-footer" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>id</th>
                                                <th>content</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach(messagesNotification() as $msg)
                                            @if(isset($msg->offer->project->title))
                                            <tr class="">
                                                <td class="first-td">{{$msg->id}}</td>
                                                <td style="width:100%; height:100%">
                                                    <a href="{{url('messages').'/'.$msg->offer->id}}#last-msg" style="text-decoration:none;color:#000" target="_blank">
                                                        <div class="panel panel-default">
                                                            <div class="panel-heading">
                                                                <i class="fa fa-envelope" style="margin-left: 12px;"></i>{{$msg->offer->project->title}}
                                                                @if($msg->messageNotifications->to_user == Auth::user()->id && $msg->messageNotifications->to_status == '0')
                                                                <span style="float:left; color:#f53b3b">لم تتم القراءه</span>
                                                                @endif
                                                            </div>
                                                            <div class="panel-body">
                                                                <div class="col-sm-4">

                                                                </div>
                                                                <div class="col-sm-8" style="color:#75787d;overflow-wrap: break-word; word-break: break-word; word-wrap: break-word;">
                                                                    {{$msg->content}}
                                                                </div>
                                                                
                                                                <div class="col-sm-4" style="margin-top:20px; direction:ltr">
                                                                    {{$msg->created_at->format('h:i a')}}
                                                                </div>
                                                                <div class="col-sm-8" style="margin-top:20px">
                                                                    {{$msg->created_at->format('Y-m-d')}}
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </td>

                                            </tr>
                                            @endif
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

<!--====================  end div of select =======================================================-->
@endsection


@section('footer')


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
