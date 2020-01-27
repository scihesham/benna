@extends('front.layout.master')

@section('title')
الفواتير
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
        text-align: center;
        vertical-align: middle !important
    }

    .mile hr:last-child {
        display: none
    }

</style>
@endsection

@section('content')
<!--====================== start div of select  -==================================================-->

<div class="container re-size" style="margin-top:240px;margin-bottom:40px">
    <div class="row">
        <div class="col-md-12">

            <div class="row">
                <section class="data-table">
                    <div class="row">
                        <div class="container">
                            <div class="panel panel-primary" style="margin-top:40px">
                                <div class="panel-heading">{{$title}}</div>
                                <div class="panel-body" style="width:95%; margin:0 auto;overflow-x:auto">
                                    <table id="example" class="table table-striped table-bordered  no-footer" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>رقم المشروع</th>
                                                <th>عنوان المشروع</th>
                                                <th>الحاله</th>
                                                <th>الايام المتبقيه</th>
                                                <th class="text-center">عرض الفاتورة</th>
                                                <th class="text-center">تحميل الفاتورة</th>
                                                <th class="text-center">ايصال دفع</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($invoices as $key => $invoice)
                                            
                                                @if($invoice->status == '0')
                                                <?php
                                                $now = strval(date('y-m-d', time())); // or your date as well
                                                $now = strtotime($now);
                                                $your_date = strtotime($invoice->created_at->format('Y-m-d'). ' + 8 days');
                                                $datediff = $your_date - $now;
                                                $days_num = round($datediff / (60 * 60 * 24));
                                                ?>
                                                @endif
                                            
                                            <tr class="">
                                                <td class="text-center center-vc">{{$key+1}}</td>
                                                <td class="text-center center-vc">{{$invoice->offer->project->id}}</td>
                                                <td class="text-center center-vc">
                                                    <a href="{{url('messages'.'/'.$invoice->offer->id)}}" target="_blank">
                                                        {{$invoice->offer->project->title}}
                                                    </a>
                                                </td>
                                                <td class="text-center center-vc">
                                                @if($invoice->status == '0')
                                                    
                                                    @if($days_num < 0)
                                                        <span style="color:red">لم يتم الدفع</span>
                                                    @else
                                                    <span>لم يتم الدفع</span>
                                                    @endif
                                                @else
                                                    <span>تم الدفع</span>
                                                @endif
                                                </td>
                                                <td class="text-center center-vc" style="direction:ltr">
                                                    @if($invoice->status == '0')
<!--
                                                    {{date('Y-m-d', strtotime($invoice->created_at. ' + 8 days'))}}<br>
                                                    {{date('Y-m-d', time())}}<br>
-->
                                                    {{$days_num}}
                                                    @endif                                                   
                                                </td>
                                                <td class="text-center center-vc">
                                                    <a class="btn btn-success btn-sm " href="{{url('invoice').'/'.$invoice->id}}" target="_blank"><i class="fa fa-eye"></i></a> </td>
                                                
                                               <td class="text-center center-vc"><a class="btn btn-success btn-sm " href="{{url('invoice').'/'.$invoice->id}}?action=download" target="_blank"><i class="fa fa-download"></i></a> </td>
                                                
                                                    <td class="text-center center-vc">
                                                    @if(isset($invoice->receipt->id))
                                                    <a class="btn btn-success btn-sm " href="{{url('receipt/edit').'/'.$invoice->id}}" ><i class="fa fa-edit"></i></a> 
                                                    @else
                                                    <a class="btn btn-success btn-sm " href="{{url('receipt').'/'.$invoice->id}}" ><i class="fa fa-plus"></i></a> 
                                                    @endif
                                                    </td>
                                            </tr>
                                            @endforeach

                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>#</th>
                                                <th>رقم المشروع</th>
                                                <th>عنوان المشروع</th>
                                                <th>الحاله</th>
                                                <th>الايام المتبقيه</th>
                                                <th class="text-center">عرض الفاتورة</th>
                                                <th class="text-center">تحميل الفاتورة</th>
                                                <th class="text-center">ايصال دفع</th>
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
