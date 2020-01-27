<!DOCTYPE html>
<html>

<head>

</head>

<body>
<?php
//    $invoice_num = 10;
//    $project_title = 'انشاء';
//    $invoice_val = 50;
//    $invoice_link = 'google.com';
 ?>
    <center>
        <h2><span style="color:#22a1ff !important">بناء كويك</span> </h2>
    </center>
    <div style="width:90%; margin:0 auto; text-align:right">
        <h3 style="font-size:18px">
            تهانينا تم قبول الفاتورة  
            <a href="{{$invoice_link}}" style=" font-size: 19px; text-decoration: none;"> رقم {{$invoice_num}} </a>
            الخاصه بمشروع 
            {{$project_title}}
            وكانت قيمه الفاتورة
            {{$invoice_val}}
            ريال سعودي
        </h3>
        <h3>شكرا لكم</h3>
    </div>
</body>

</html>
