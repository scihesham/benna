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
                
                <div class="col-sm-12 text-right social-full-cont" style="direction:rtl; color:#FFF">
                    <!--<div class="">-->
                    <!--    <span id="bin" style="font-size: 20px ">Binrasheddecore</span>-->
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
            </div>

        </div>



    </div>



</div>

<div class="logo-footer" style="position:relative; height:0px; background:#EEE">
    <div class="col-sm-12 footer-logo" style="position:absolute; bottom:0; width:120px; left:calc(50% - 60px)">
        <div style="position:relative">
            <p class="copyright">جميع الحقوق محفوظه لموقع</p>
            <img style="width:120px" src="{{url('public/design/mandoby')}}/images/logo2_part_1.png">
            <p class="year">2020</p>
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
