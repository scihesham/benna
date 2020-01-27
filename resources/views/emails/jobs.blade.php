<!DOCTYPE html>
<html>

<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <style>
        table{margin-top: 50px}
        table, td, th{border: 1px solid #EEE;}
        td, th{padding: 20px}
        
        
        
.help-block {
    margin-top: -25px !important;
}

.fields .nav>li{line-height: 48px;}
.fields .icon-bar{background: #EEE; }
.sub-content{margin-top: 15px; margin-bottom: 14px; display: none}
.fields .panel{border: 1px solid #EEE; border-radius: 15px;}
.fields .panel-heading {background: #f5f5f5 !important; padding:0; cursor: pointer; height:60px; border-top-right-radius: 15px !important; border-top-left-radius: 15px !important;}
.fields .panel-heading div{height: 70px; line-height: 65px !important; color: #3333}

  
        
.fields .panel-heading {
    border-color: #EEE !important;
    border-top-left-radius: 0;
    border-top-right-radius: 0;
    padding: 0px 17px;
    background: #0067ab !important;
    color: #FFF !important;
    line-height: 60px;
    font-size: 24px;
    font-family:  'Cairo', sans-serif;
}
    label{display: block; font-size: 18px; color: #0067ab !important; margin-bottom: 5px; margin-right: 5px;
    font-family:  'Cairo', sans-serif;}
    textarea.form-control{font-size:18px !important;width: 98%; border-radius: 15px;  text-align: right; padding: 5px;}
    .fields .panel-body {
       padding: 40px; padding-top: 10px; text-align: right
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
        <h2>  <span style="color:#22a1ff !important; font-size:28px">بناء كويك</span> </h2>
    </center>
    <div style="width:90%; margin:0 auto; text-align:right;margin-top:40px">
        <h3>
        مرحيا بك عميلنا العزيز هذه هي قائمه باحدث المشاريع المضافه الى منصتنا
        </h3>
    </div>
    
    
<div class="re-size fields contact-us" style="margin-top:40px">
    <div class="container" style="">
        <div class="row">
            <div class="" style='width:90%; margin:0 auto'>
                <div class="panel panel-default">

                    <div class="panel-heading" style="text-align:right"> المشاريع</div>
                    <div class="panel-body">
                        <div class="data-1 no-show def">
                            @foreach(\App\Project::where([['status', 0]])->orderBy('id', 'desc')->limit(5)->get() as $project)
                           <a href="https://bennaquick.com/offer/project/{{$project->id}}" style="text-decoration:none;color: #348eda;" target="_blank">
                                <div class="row" style="font-size:24px; color: #348eda;margin-top:20px">
                                    <b>
                                         
                                      {{$project->title}} 
                                    </b>
                                    <div style="color: #000; font-size:18px;margin-top:30px">
                                        {{$project->desc}}
                                    </div>
                                    <hr style=" color: #EEE;">
                                </div>
                            </a>
                           
                            
                            @endforeach
                            <div style="color: #000; font-size:18px;margin-top:30px">
                            قدم عرضك الان
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
