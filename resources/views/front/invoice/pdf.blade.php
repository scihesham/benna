<!DOCTYPE html>
<html>

<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    
    <style>
    @font-face {
        font-family: "ara";
        src: url("https://bennaquick.com/public/design/mandoby/css/AraHamahKilania");
           
      }
        body {
            font-family: DejaVu Sans, sans-serif;
            /*font-family: ara;*/
            direction: rtl;
            text-align: right
        }

        #title {
            width: 100%;
            text-align: center;
        }

        #title h4 {
            color: red
        }

        .row {
            clear: both;
        }

        .col {
            float: right;
        }

        .col-left {
            float: left;
        }

        .col-6 {
            width: 50%;
        }

        .col-12 {
            width: 100%;
        }

        .col-1 {
            width: 8.33%;
        }

        .col-2 {
            width: 16.66%;
        }

        .col-3 {
            width: 25%;
        }

        .col-4 {
            width: 33.33%;
        }

        .col-8 {
            width: 66.66%;
        }

        span {
            font-family: tahoma !important;
            font-size: 16px;
            color: darkgreen;
            font-weight: normal
        }

        /*    .company-detail span{color: blue}*/
        th,
        td {
            border: 1px solid black;
        }

        td {
            padding-top: 8px;
            padding-bottom: 8px
        }

        th {
            font-size: 14px !important;
            padding-top: 8px;
            padding-bottom: 8px
        }

    </style>

    <title>invoice</title>

</head>

<body>

    <div id="title">
        <img src="{{url('public/design/mandoby')}}/images/logosm.png" alt=" logo" style="width: 90px">
    </div>
    <hr style="margin-bottom:0">
    <hr style="margin-top:2px">

    <div class="row" style="padding-top:20px; padding-bottom:20px">
        <div class="col col-1">
            العميل :
        </div>

        <div class="col col-6">
            <span>{{$invoice->offer->project->company->name}}</span><br>
        </div>
        <div class="col col-3">
            &nbsp;
        </div>
        <div class="col col-2 company-detail">
            <span>بناء كويك</span><br>
            <span>السعوديه الرياض</span><br>
            <p style="margin-bottom:-12px"></p><span>0102200220</span>
        </div>
    </div>


    <div class="row" style="padding-top:20px; padding-bottom:20px">
        <div class="col col-8">
            &nbsp;
        </div>
        <div class="col col-2">
            رقم المشروع :
            <br>
            التاريخ :
        </div>

        <div class="col col-2">
            <span>{{$invoice->offer->project->id}}</span><br>
            <span>{{$invoice->created_at->format('Y-m-d')}}</span><br>
        </div>
    </div>

    <table style="width:100%; padding-top:20px">

        <tr style="background: #EEE;">
            <th>عنوان المشروع</th>
            <th>قيمه المشروع</th>
            <th>قيمه الفاتورة</th>
        </tr>

        <tr>
            <td style="text-align:center">{{$invoice->offer->project->title}}</td>
            <td style="text-align:center">
                {{$invoice->offer->milestones->sum('value')}}
                ريال سعودي
            </td>
            <td style="text-align:center">
                {{$invoice->offer->milestones->sum('value') *  0.01}}
                ريال سعودي
            </td>
        </tr>

    </table>

    <p style="margin-top:70px; font-size:16px; text-align:justify">
        - من المعلوم للمستخدم قيام الموقع باقتطاع عمولته من ("المستقل") وليس ("صاحب المشروع")؛ ولذا يجب على المستقل – سواء كان فرد أو منشأة أو من تبنى تنفيذ المشروع مهما كان - الأخذ بعين الاعتبار عمولة الموقع التي سيتم اقتطاعها من المبلغ الذي وضعه في العرض، علمًا بان تلك العمولة محددة بنسبة قدرها (1 %) من القيمة الإجمالية للمشروع وغير قابلة للاسترداد.
        
    </p>
    
 <p style="margin-top:17px; font-size:16px; text-align:justify">
     -
     يلتزم المستقل بسداد العمولة خلال سبعة أيام عمل على الحسابات البنكية للموقع وفقًا للبيانات الموضحة في الفاتورة، 

ويقر بأن تلك العمولة هي دين في ذمته حتى السداد.

     
 </p>
    
    <p style="margin-top:17px; font-size:16px; text-align:justify">
        -
        بعد إتمام عملية دفع عمولة الموقع يتم إشعار إدارة الموقع بالذهاب إلى أيقونة فواتيري ثم الضغط على إيصال الدفع وتعبئة 

البيانات المطلوبة وسيتم إشعاركم بإتمام العملية.


    </p>
    
    <div class="row" style="padding-top:20px; padding-bottom:20px">
        <div class="col col-8">
            <p style="margin-top:50px; font-size:16px; text-align:justify">
            <img src="{{url('public/invoice')}}/image--000.jpg" alt=" logo" style="width: 40px">
            <b>مصرف الراجحي :</b>
            </p>
            <p>
                مؤسسة بناء سريع للتجارة والتسويق
            </p>
            <p>SA2480000329608010512113</p>
        </div>
        
        <div class="col col-4">
            <p style="margin-top:50px; font-size:16px; text-align:justify">
            <img src="{{url('public/invoice')}}/image--001.jpg" alt=" logo" style="width: 40px">
            <b>بنك البلاد :</b>
            </p>
            <p>
                مؤسسة بناء سريع للتجارة والتسويق
            </p>
            <p>SA3115000866130502170007</p>
        </div>
    </div>



</body>

</html>
