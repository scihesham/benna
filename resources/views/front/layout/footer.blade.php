<div style="width: 100%;position: relative; background: #1c2937; padding-top: 28px;border-top-left-radius:32px" style="background:#0067ab !important">
    <img src="{{url('public/design/mandoby')}}/images/footer-dark.png" style="width:100%;">
    <div style="position:absolute;top:20px; width:96%; left:calc(2%)" class="footer-sec">
        <!--
        <div class="col-sm-12" style="position:absolute; width:285px; left:calc(50% - 142.5px)">
                    <img style="width:285px" src="{{url('public/design/mandoby')}}/images/logo2.png">
                </div>
-->
        <div class="col-sm-12" style="padding:0; ">
            <div class="panel panel-default foot" style="border:0 !important; margin-bottom:0 !important">

                <div class="col-sm-4 text-left" style="direction:rtl; color:#FFF">
                    <!--<div class="social-cont">-->
                    <!--    <span style="font-size: 20px !important">Binrasheddecore</span>-->
                    <!--    <a class="social" href="#">-->
                    <!--        <i class="fa fa-instagram"></i>-->
                    <!--    </a>-->
                    <!--    <a class="social" href="#">-->
                    <!--        <i class="fa fa-facebook"></i>-->
                    <!--    </a>-->
                    <!--    <a class="social" href="#">-->
                    <!--        <i class="fa fa-twitter"></i>-->
                    <!--    </a>-->
                    <!--</div>-->
                </div>
                <div class="col-sm-8 text-right list">
                    <ul>
                        <li>
                            <a href="{{url('/')}}">الرئيسيه</a>
                        </li>
                        <li>
                            <a href="{{url('about-us')}}">من نحن</a>
                        </li>

                        <!--
                            <li>
                                <a href="#">خدماتنا</a>
                            </li>
-->
                        <li>
                            <a href="{{url('contact-us')}}">اتصل بنا</a>
                        </li>

                        @if(Auth::user())
                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">

                                {{Auth::user()->name}}
                                <span class="caret"></span>

                            </a>
                            <ul class="dropdown-menu" style=" width:200px; padding: 0 1px">

                                <li>
                                    <a href="{{url('myprofile')}}" style="font-size:16px; font-weight:bold; color:green; padding:0px 20px">بياناتي</a>
                                </li>
                                <hr style="margin:0">
                                @if(Auth::user()->permission == 3)
                                <li>
                                    <a href="{{url('invoice')}}" style="font-size:16px; font-weight:bold; color:green; padding:0px 20px">فواتيري</a>
                                </li>
                                <hr style="margin:0">
                                @endif
                                <li>
                                    <a style="font-size:16px; font-weight:bold; color:#ff1818; padding:0px 20px" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                        خروج
                                    </a>
                                </li>
                            </ul>
                        </li>
                        @else
                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">


                                اشترك معنا الان

                                <span class="caret"></span></a>
                            <ul class="dropdown-menu ">
                                <li><a href="{{url('register?action=owner')}}" style="color:#000 !important; font-size:20px !important">
                                        تسجيل حساب جديد
                                    </a></li>

                                <li><a href="{{route('login')}}" style="color:#000 !important;font-size:20px !important">
                                        تسجيل الدخول
                                    </a></li>

                            </ul>
                        </li>
                        @endif
                    </ul>

                </div>

                <div class="col-sm-12 text-right " style="direction:rtl; color:#FFF">
                    <div class="">
                        <!--    <span id="bin" style="font-size: 20px ">Binrasheddecore</span>-->
                        <a class="social" href="https://instagram.com/bennaquick?igshid=u0dr3in3h17h" target="_blank">
                            <i class="fa fa-instagram"></i>
                        </a>
                        <!--    <a class="social" href="#">-->
                        <!--        <i class="fa fa-facebook"></i>-->
                        <!--    </a>-->
                        <a class="social" href="https://twitter.com/bennaquick?s=09" target="_blank">
                            <i class="fa fa-twitter"></i>
                        </a>
                    </div>
                </div>
            </div>

        </div>



    </div>



</div>

<span style="position: fixed;  bottom: 30%; left:0;  z-index: 999;">
    <a href="https://wa.me/966501087182" target="_blank">
        <div class="whats-wrap" style="background: green;padding-right: 10px;  padding-top: 4px;border-bottom-right-radius: 10px;border-top-right-radius: 10px;">
            <svg aria-hidden="true" focusable="false" data-prefix="fab" data-icon="whatsapp" class="svg-inline--fa fa-whatsapp fa-w-14 fa-2x " role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" style="width:40px; margin-left: 5px;">
                <path fill="#FFF" d="M380.9 97.1C339 55.1 283.2 32 223.9 32c-122.4 0-222 99.6-222 222 0 39.1 10.2 77.3 29.6 111L0 480l117.7-30.9c32.4 17.7 68.9 27 106.1 27h.1c122.3 0 224.1-99.6 224.1-222 0-59.3-25.2-115-67.1-157zm-157 341.6c-33.2 0-65.7-8.9-94-25.7l-6.7-4-69.8 18.3L72 359.2l-4.4-7c-18.5-29.4-28.2-63.3-28.2-98.2 0-101.7 82.8-184.5 184.6-184.5 49.3 0 95.6 19.2 130.4 54.1 34.8 34.9 56.2 81.2 56.1 130.5 0 101.8-84.9 184.6-186.6 184.6zm101.2-138.2c-5.5-2.8-32.8-16.2-37.9-18-5.1-1.9-8.8-2.8-12.5 2.8-3.7 5.6-14.3 18-17.6 21.8-3.2 3.7-6.5 4.2-12 1.4-32.6-16.3-54-29.1-75.5-66-5.7-9.8 5.7-9.1 16.3-30.3 1.8-3.7.9-6.9-.5-9.7-1.4-2.8-12.5-30.1-17.1-41.2-4.5-10.8-9.1-9.3-12.5-9.5-3.2-.2-6.9-.2-10.6-.2-3.7 0-9.7 1.4-14.8 6.9-5.1 5.6-19.4 19-19.4 46.3 0 27.3 19.9 53.7 22.6 57.4 2.8 3.7 39.1 59.7 94.8 83.8 35.2 15.2 49 16.5 66.6 13.9 10.7-1.6 32.8-13.4 37.4-26.4 4.6-13 4.6-24.1 3.2-26.4-1.3-2.5-5-3.9-10.5-6.6z"></path>
            </svg>
        </div>
    </a>
</span>

<div class="logo-footer" style="position:relative; height:0px; background:#EEE">
    <div class="col-sm-12 footer-logo" style="position:absolute; bottom:0; width:120px; left:calc(50% - 60px)">
        <div style="position:relative">
            <p class="copyright">جميع الحقوق محفوظه لموقع</p>
            <img style="width:120px" src="{{url('public/design/mandoby')}}/images/logo2_part_1.png">
            <p class="year" style="">2020</p>
        </div>
    </div>
</div>

<!--==================== copyright =========-->


<!--============== end div of footer ======================-->





<!--==========================end of body ==========================================================-->
<script charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
<script src="{{url('public/design/mandoby')}}/query_files/swiper.min.js"></script>
<script src="{{url('public/design/mandoby')}}/query_files/custom.js"></script>
<!--<script src="{{url('public/design/adminlte')}}/dist/js/backend.js"></script>-->


@yield('footer')
<script src="{{url('public/design/adminlte')}}/dist/js/ajax.js"></script>





</body>

</html>
