<!DOCTYPE html>
<html>

<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    
<link href="https://fonts.googleapis.com/css?family=Cairo&display=swap" rel="stylesheet">
<style>
.help-block {
    margin-top: -25px !important;
}

.fields .nav>li{line-height: 48px;}
.fields .icon-bar{background: #EEE; }
.sub-content{margin-top: 15px; margin-bottom: 14px; display: none}
.fields .panel{border: 1px solid #EEE; border-radius: 15px;}
.fields .panel-heading {background: #f5f5f5 !important; padding:0; cursor: pointer; height:70px; border-top-right-radius: 15px !important; border-top-left-radius: 15px !important;}
.fields .panel-heading div{height: 70px; line-height: 65px !important; color: #3333}

  
        
.fields .panel-heading {
    border-color: #EEE !important;
    border-top-left-radius: 0;
    border-top-right-radius: 0;
    padding: 0px 17px;
    background: #0067ab !important;
    color: #FFF !important;
    line-height: 65px;
    font-size: 26px;
    font-family:  'Cairo', sans-serif;
}
    label{display: block; font-size: 18px; color: #0067ab !important; margin-bottom: 5px; margin-right: 5px;
    font-family:  'Cairo', sans-serif;}
    textarea.form-control{font-size:18px !important;width: 98%; border-radius: 15px;  text-align: right; padding: 5px;}
    .fields .panel-body {
       padding: 40px; padding-top: 28px; text-align: right
    }
        input{padding: 10px 20px; width: 90%;  border-radius: 10px;  border: 1px solid #EEE; margin-bottom: 30px}
    </style>
</head>

<body>
    <?php
//    $name = 'cc';
//    $email = 'dd';
//    $message = 'dds';
//    $company_name = 'sds';
//    $content = 'cf';
    ?>
        <center>
        <h2 style="margin-top:30px"> <span style="color:#22a1ff !important">بناء كويك</span> </h2>
    </center>
<div class="re-size fields contact-us" style="margin-top:40px">
    <div class="container" style="">
        <div class="row">
            <div class="" style='width:90%; margin:0 auto'>
                <div class="panel panel-default">

                    <div class="panel-heading" style="text-align:right">اتصل بنا</div>
                    <div class="panel-body">
                        <div class="data-1 no-show def">
                            <div class="non">
                                <div class="row">
                                    <form>
                                        <div class="" style="width:49%; float:left; ">
                                            <label for="company_name">
                                                اسم الشركة
                                            (اختياري)
                                            </label>
                                            <input type="text" placeholder="اسم الشركة" id="company_name" value="{{$company_name}}" style="text-align:right">
                                        </div>
                                        <div class="" style="width:49%; float:right; text-align:right">
                                            <label for="name">الاسم </label>
                                            <input type="text" id="name" placeholder="الاسم" value="{{$name}}" style="text-align:right">
                                        </div>

                                        <div class="" >
                                            <label for="email">البريد الالكتروني</label>
                                            <input class="" id="email" placeholder="البريد الالكتروني"  type="email" value="{{$email}}" style="width: 95% !important;">
                                        </div>
                                        <div class="col-sm-12">
                                            <label for="message">الرسالة</label>
                                            <textarea id="message" class="form-control" rows="9" cols="25" placeholder="الرسالة" >{{$content}}</textarea>
                                        </div>
                                    </form>
                                </div>
                                <!-- .col -->
                            </div>
                        </div>

                    </div> <!-- end of def -->

                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>