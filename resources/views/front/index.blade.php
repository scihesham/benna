@extends('front.layout.master')

@section('title')
الصفحه الرئيسيه
@endsection

@section('header')
<link rel="stylesheet" type="text/css" href="{{url('public/design/mandoby')}}/slick/slick.css">
<link rel="stylesheet" type="text/css" href="{{url('public/design/mandoby')}}/slick/slick-theme.css">
<style type="text/css">
    html,
    body {
        margin: 0;
        padding: 0;
    }

    * {
        box-sizing: border-box;
    }

    .slider {
        width: 80%;
        margin: 100px auto;
        margin-top: 55px
    }

    .slick-slide {
        margin: 0px 20px;
    }

    .slick-slide img {
        width: 100%;
    }

    .slick-prev:before,
    .slick-next:before {
        color: black;
    }


    .slick-slide {
        transition: all ease-in-out .3s;
        opacity: .8;
    }

    .slick-active {
        opacity: 1;
    }

    .slick-current {
        opacity: 1;
    }

    .slick-prev:before,
    .slick-next:before {
        color: #00adff
    }

</style>
@endsection

@section('content')

<!--
<div id='coin-slider' style="position: relative">
    <div class="slid">
        <h3 class="slid_word animated fadeInDown">

            اضف مشروعك هنا

        </h3>

        <span class="slid_word1 animated fadeInUp">
            اشترك الان
        </span>
    </div>

    <img src="{{url('public/design/mandoby')}}/images/slider1.jpg">
        <img src="{{url('public/design/mandoby')}}/images/slider2.png" >
</div>
-->

<div style="width:100%; position:relative">
<img src="{{url('public/design/mandoby')}}/images/slider1.jpg" style="width:100%;">
    <div id="photo-title" style="position:absolute">
    <p>اضف مشروعك هنا</p>
    <a href="{{url('register')}}" style='text-decoration:none'><span>اشترك الان</span></a>
    </div>
</div>


<div class="container-fluid stat" style="background:#0067ab !important; border-bottom-left-radius: 20px; color:#FFF">
    <div class="row">
        <div class="text-center" style="width:60%; margin:0 auto;padding:5px; padding-bottom:15px">

            <div class="" style="display:inline-block;  width:30%">
                <img src="{{url('public/design/mandoby')}}/images/icon1.png" style="max-width:40%"><br>
                <b>{{\App\User::all()->count()}}</b>
                <div>عدد الاعضاء</div>
            </div>

            <div class="pipe"></div>
            <a href="{{url('freelancers')}}" style="color:#FFF;text-decoration: none;">
            <div class="" style="display:inline-block; width:30%">
                <img src="{{url('public/design/mandoby')}}/images/icon2.png" style="max-width:40%"><br>
                <b>{{\App\User::where('permission', 3)->count()}}</b>
                <div>عدد المستقلين</div>
            </div>
            </a>

            <div class="pipe"></div>
            <a href="{{url('search/projects')}}" style="color:#FFF">
                <div class="" style="display:inline-block;  width:30%">
                    <img src="{{url('public/design/mandoby')}}/images/icon3.png" style="max-width:40%"><br>
                    <b>{{\App\Project::all()->count()}}</b>
                    <div>عدد المشاريع</div>

                </div>
            </a>
        </div>
    </div>
</div>

<!--===================start div of data =================================================-->


<!--======start div of spicial background ==========-->
<div class="container" style="margin-top:20px; ">
    <div style="width:100%; text-align:center; margin-top:40px">
        <b style="font-size:28px">احدث المشاريع</b>
    </div>
        <div class="text-center request-cont" style="width:90%; margin:0 auto;padding:5px; padding-bottom:35px; margin-top:40px">
            @foreach(\App\Project::where('status', '0')->orderBy('id', 'desc')->limit(4)->get() as $project)
            <div class="request" style="display:inline-block;  width:24.5%">
                <a href="{{url('offer/project').'/'.$project->id}}" style="text-decoration: none; color:#000; font-weight:bold">
                <img src="{{url('public/design/mandoby')}}/images/akar.png" style="max-width:40%"><br>
                <div class="request-info" style="font-size:20px">{{$project->title}}</div>
                </a>
            </div>
            @endforeach
            
</div>
</div>


<!--===================end div of data =================================================-->


<!--======start div of spicial background ==========-->
<div class="container" style="margin-top:20px; ">
    <div style="width:100%; text-align:center; margin-top:40px">
        <b style="font-size:28px">احصل على الخدمه المطلوبه</b>
    </div>
<!--
    <section class="regular slider">
        <div>
            <img src="http://placehold.it/350x300?text=1">
        </div>
        <div>
            <img src="http://placehold.it/350x300?text=2">
        </div>
        <div>
            <img src="http://placehold.it/350x300?text=3">
        </div>
        <div>
            <img src="http://placehold.it/350x300?text=4">
        </div>
        <div>
            <img src="http://placehold.it/350x300?text=5">
        </div>
        <div>
            <img src="http://placehold.it/350x300?text=6">
        </div>
    </section>
-->
    
        <div class="text-center request-cont" style="width:90%; margin:0 auto;padding:5px; padding-bottom:15px; margin-top:40px">

            <div class="request" style="display:inline-block;  width:24.5%">
                <a href="{{url('register?action=owner')}}" style="text-decoration: none; color:#000; font-weight:bold">
                <img src="{{url('public/design/mandoby')}}/images/icon4.png" style="max-width:40%"><br>
                <div class="request-info" style="font-size:20px">اطلب تنفيذ المشروع</div>
                </a>
            </div>
            
            <div class="request" style="display:inline-block;  width:24.5%">
                <a href="{{url('register?action=personal')}}" style="text-decoration: none; color:#000; font-weight:bold">
                <img src="{{url('public/design/mandoby')}}/images/icon4.png" style="max-width:40%"><br>
                <div class="request-info" style="font-size:20px">نفذ المشروع كمستقل</div>
                </a>
            </div>
            
            <div class="request" style="display:inline-block; width:24.5%">
                <a href="{{url('register?action=company')}}" style="text-decoration: none; color:#000; font-weight:bold">
                <img src="{{url('public/design/mandoby')}}/images/icon4.png" style="max-width:40%"><br>
                <div class="request-info" style="font-size:20px">نفذ المشروع كشركه</div>
                </a>
            </div>
            
            
            <div class="request" style="display:inline-block;  width:24.5%">
                <a href="{{url('register?action=institute')}}" style="text-decoration: none; color:#000; font-weight:bold">
                <img src="{{url('public/design/mandoby')}}/images/icon4.png" style="max-width:40%"><br>
                <div class="request-info" style="font-size:20px">
                    نفذ المشروع كمؤسسه
                </div>
                </a>
            </div>
            
        </div>

</div>



<!--======end div of special backgroung =============-->

<!--=================== start titles ================-->


<!--================== end of titles ================-->

<!--================== start info  ================-->

<div class="container-fluid" style="margin-bottom: 70px; padding:0; margin-top:50px; background: #1c2937 !important;">
    <div class="col-md-6" style="padding:0">
        <img src="{{url('public/design/mandoby')}}/images/slider2.png" style="width:100%">
    </div>

    <div class="col-md-6" style="padding:0">
        <div class="panel panel-default" style="border:0 !important">
            <div class="panel-heading text-right" style="background:#0067ab !important; color:#FFF !important;border-top-left-radius: 32px; border-top-right-radius: 0;">
                احصل على ما تريد بسهوله ويسر
            </div>
            <div class="panel-body" style="text-align:justify; direction:rtl; background: #1c2937 !important; color:#FFF;
                                           min-height:247px">
                
                نسعى أن تكون "بناء كويك" منصة متكاملة لكل ما يتعلق بالمقاولات العامة وخدمات البناء والإنشاءات والاستشارات الهندسية المختلفة من التخطيط الى التنفيذ، ليتم توفير خدمات التخطيط المعماري والتصميم والتشطيب والرسم الهندسي والبناء باحترافية عالية وبخبرات كبيرة تُلبي طموحات وتطلعات أصحاب المشاريع.

            </div>
        </div>
    </div>


</div>

<div class="container marof" style="">
<div class="col-sm-6 text-center">
    <img src="{{url('public/design/mandoby')}}/images/commercial.jpeg" style="width:20%; min-width: 105px;">    
</div>
    
<div class="col-sm-6 text-center second-content">
 <iframe src="https://maroof.sa/Business/GetStamp?bid=89375" style=" width: 194px; height: 250px; overflow-y:hidden;  "  frameborder="0" seamless='seamless' scrollable="no">
</iframe>   
</div>
    

</div>

<!--================== end info  ================-->

@endsection

@section('footer')
<!-- carousel slider -->
<script src="{{url('public/design/mandoby')}}/slick/slick.js" type="text/javascript" charset="utf-8"></script>
<script type="text/javascript">
    $(document).on('ready', function() {

        $(".regular").slick({
            dots: true,
            autoplay: true,
            autoplaySpeed: 4000,
            infinite: true,
            slidesToShow: 4,
            slidesToScroll: 4


        });

    });

</script>

@endsection
