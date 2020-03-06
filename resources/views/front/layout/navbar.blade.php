<body>
    <!--=============================================================-->
    <!--
<div class="navbar navbar-default" role="navigation" id="slide-nav">
    <div class="container">
-->
    
                                
    <nav class="navbar navbar-default ">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-toggle" data-toggle="collapse" data-target="#navbar-brand-centered">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>

            </div>
@if(Auth::user())
            
     <?php
        $unseen_count = 0;
        foreach(messagesNotification() as $msg){
            if(isset($msg->offer->project->title)){
                if($msg->messageNotifications->to_user == Auth::user()->id && $msg->messageNotifications->to_status == '0'){
                    $unseen_count += 1; 
                }
            }
        }
      ?>
            

            
    @if(Auth::user()->permission == '3' || Auth::user()->permission == '0' || Auth::user()->permission == '1')

        <li class="dropdown show-small bill-notification award-project text-left" style="display:none;">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#" >

                <span id="last-seen-project-sm" class="hide">{{Auth::user()->last_seen_project}}</span>
                <span id="last-project-sm" class="hide">
                    @if(isset(\App\Project::latest()->first()->id))
                    {{\App\Project::latest()->first()->id}}
                    @else
                    0
                    @endif
                </span>


                <div class="pro-circle hide">

                </div>
                <i class="fa fa-bell" style=""></i>

            </a>
            
            @include('front.notification.awardproject')
        </li>

        <li class="dropdown show-small bill-notification user-invoice text-left" style="display:none;">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#" id="user-invoice-bill-sm">


                            <span id="last-seen-invoice-sm" class="hide">{{Auth::user()->last_seen_invoice}}</span>

                            <span id="last-invoice-sm" class="hide">
                                @if(isset(\App\Invoice::where('status', 1)
                                ->whereHas('offer', function ($query) {
                                $query->where('company_id', Auth::user()->id);
                                })->latest()->first()->id))
                                {{
                               \App\Invoice::where('status', 1)
                                ->whereHas('offer', function ($query) {
                                    $query->where('company_id',  Auth::user()->id);
                               })->latest()->first()->id
                            }}
                                @else
                                0
                                @endif
                            </span>

                            <span id="last-seen-notpaid-invoice-sm" class="hide">{{Auth::user()->last_seen_notpaid_invoice}}</span>

                            <span id="last-notpaid-invoice-sm" class="hide">
                                @if(isset(\App\Invoice::where('status', 0)
                                ->whereHas('offer', function ($query) {
                                $query->where('company_id', Auth::user()->id);
                                })->latest()->first()->id))
                                {{
                               \App\Invoice::where('status', 0)
                                ->whereHas('offer', function ($query) {
                                    $query->where('company_id',  Auth::user()->id);
                               })->latest()->first()->id
                            }}
                                @else
                                0
                                @endif
                            </span>

                            <div class="user-invoice-circle hide">

                            </div>
                            <i class="fa fa-bell" style=""></i>

                        </a>
            @include('front.notification.userinvoice')
        </li>
            
       

    @endif
            
    @if(Auth::user()->permission == '2' )
        <li class="dropdown show-small text-left" style="display:none;">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#" id="offer-bill-sm">

                <span id="last-seen-offer-sm" class="hide">{{Auth::user()->last_seen_offer}}</span>
                <span id="last-offer-sm" class="hide">
                    @if(isset(\App\OfferStatus::where('owner_id', Auth::user()->id)->latest()->first()->id))
                    {{\App\OfferStatus::where('owner_id', Auth::user()->id)->latest()->first()->id}}
                    @else
                    0
                    @endif
                </span>
                <div class="offer-circle hide">

                </div>
                <i class="fa fa-bell" style=""></i>

            </a>
            @include('front.notification.offer')
        </li>
    @endif
            
            
    <li class="dropdown show-small msg-sm" style="display:none; {{Auth::user()->permission == '3' ? 'left:120px;' : ''}}">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
            <div class="msg-circle hide">
                <span id="unseen-count-sm">{{$unseen_count}}</span>
            </div>
            <i class="fa fa-envelope" style=""></i>

        </a>
        @include('front.notification.message')
    </li>

@endif
            
            <div class="collapse navbar-collapse" id="navbar-brand-centered" style="float: right;">
                <ul class="nav navbar-nav" id="sec" style="background:#0067ab !important">
                    <li class=" active" id=""><a href="{{url('/')}}">
                            الرئيسية

                        </a>
                    </li>

                    @if(Auth::user() && (Auth::user()->permission == 3 || Auth::user()->permission == 0))
                    <li class="new-pro" id="">
                        <a href="{{url('search/projects')}}">
                            المشروعات الجديده<i class="fa fa-search" style="margin-right:5px; margin-left:5px"></i>
                        </a>
                    </li>
                    @endif

                    @if(Auth::user() && (Auth::user()->permission == 2 || Auth::user()->permission == 3) )
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">


                            مشروعاتي

                            <span class="caret"></span></a>
                        <ul class="dropdown-menu ">
                            @if(Auth::user()->permission == 2 )
                            <li>
                                <a href="{{url('projects')}}?project=non">
                                    غير منفذه
                                </a>
                            </li>
                            @endif
                            <li>
                                <a href="{{url('projects')}}?project=under">
                                    تحت التنفيذ
                                </a>
                            </li>

                            <li>
                                <a href="{{url('projects')}}?project=done">
                                    منفذه
                                </a>
                            </li>
                            @if(Auth::user()->permission == 3 )
                            <li>
                                <a href="{{url('myoffers')}}">
                                    عروضي
                                </a>
                            </li>
                            @endif

                        </ul>
                    </li>
                    @endif
                    @if(Auth::user() && Auth::user()->permission == 2 )
                    <li>
                        <a href="{{url('projects/create')}}">

                            اضافه مشروع
                            <i class="fa fa-plus" style=" font-size: 17px;"></i>
                        </a>
                    </li>
                    @endif

                    <li class=""><a href="{{url('about-us')}}">


                            من نحن
                        </a>


                    </li>






                    </li>

                    @if(Auth::user())


                    <li class="dropdown hide-small">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <div class="msg-circle hide">
                                <span id="unseen-count">{{$unseen_count}}</span>
                            </div>
                            <i class="fa fa-envelope" style=""></i>

                        </a>
                        @include('front.notification.message')
                    </li>
                    <!-- projects notification -->
                    <!-- if user is company or admin or support -->
                    @if(Auth::user()->permission == '3' || Auth::user()->permission == '0' || Auth::user()->permission == '1')


                    <!---------------------------------------------------------------------->
                    <!---------------------------------------------------------------------->
                    
                    <li class="dropdown hide-small award-project bill-notification ">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#" >

                            <span id="last-seen-project" class="hide">{{Auth::user()->last_seen_project}}</span>
                            <span id="last-project" class="hide">
                                @if(isset(\App\Project::latest()->first()->id))
                                {{\App\Project::latest()->first()->id}}
                                @else
                                0
                                @endif
                            </span>


                            <div class="pro-circle hide">

                            </div>
                            <i class="fa fa-bell" style=""></i>

                        </a>
                        
                        @include('front.notification.awardproject')
                    </li>
                    <!----------------------------------------------------------------------------------------->
                    <!----------------------------------------------------------------------------------------->
                    <!----------------------------------------------------------------------------------------->



                    <li class="dropdown hide-small bill-notification user-invoice">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#" id="user-invoice-bill">


                            <span id="last-seen-invoice" class="hide">{{Auth::user()->last_seen_invoice}}</span>

                            <span id="last-invoice" class="hide">
                                @if(isset(\App\Invoice::where('status', 1)
                                ->whereHas('offer', function ($query) {
                                $query->where('company_id', Auth::user()->id);
                                })->latest()->first()->id))
                                {{
                               \App\Invoice::where('status', 1)
                                ->whereHas('offer', function ($query) {
                                    $query->where('company_id',  Auth::user()->id);
                               })->latest()->first()->id
                            }}
                                @else
                                0
                                @endif
                            </span>

                            <span id="last-seen-notpaid-invoice" class="hide">{{Auth::user()->last_seen_notpaid_invoice}}</span>

                            <span id="last-notpaid-invoice" class="hide">
                                @if(isset(\App\Invoice::where('status', 0)
                                ->whereHas('offer', function ($query) {
                                $query->where('company_id', Auth::user()->id);
                                })->latest()->first()->id))
                                {{
                               \App\Invoice::where('status', 0)
                                ->whereHas('offer', function ($query) {
                                    $query->where('company_id',  Auth::user()->id);
                               })->latest()->first()->id
                            }}
                                @else
                                0
                                @endif
                            </span>

                            <div class="user-invoice-circle hide">

                            </div>
                            <i class="fa fa-bell" style=""></i>

                        </a>
                        @include('front.notification.userinvoice')
                    </li>
                    <!-------------------------------------------------------------------------->
                    <!-------------------------------------------------------------------------->
                    @endif



                    <!-- offer notification -->
                    <!-- if user is owner -->
                    @if(Auth::user()->permission == '2')


                <!------------------------------------------------------------------>                
                <!------------------------------------------------------------------>        
                
                    <li class="dropdown hide-small">
                       <a class="dropdown-toggle" data-toggle="dropdown" href="#" id="offer-bill">

                            <span id="last-seen-offer" class="hide">{{Auth::user()->last_seen_offer}}</span>
                            <span id="last-offer" class="hide">
                                @if(isset(\App\OfferStatus::where('owner_id', Auth::user()->id)->latest()->first()->id))
                                {{\App\OfferStatus::where('owner_id', Auth::user()->id)->latest()->first()->id}}
                                @else
                                0
                                @endif
                            </span>
                            <div class="offer-circle hide">

                            </div>
                            <i class="fa fa-bell" style=""></i>

                        </a>
                        @include('front.notification.offer')
                    </li>
                    @endif

                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">

                            {{Auth::user()->name}}
                            <span class="caret"></span>

                        </a>
                        <ul class="dropdown-menu" style=" min-width:200px; padding: 0 1px">

                            <li>
                                @if(Auth::user()->permission != 0 && Auth::user()->permission != 1)
                                <a href="{{url('myprofile')}}" style="font-size:16px; font-weight:bold; color:green; padding:15px 20px">بياناتي</a>
                                @else
                                <a href="{{url(target())}}" style="font-size:16px; font-weight:bold; color:green; padding:15px 20px">لوحه التحكم</a>
                                @endif

                            </li>
                            <hr style="margin:0">
                            @if(Auth::user()->permission == 3)
                            <li>
                                <a href="{{url('invoices')}}" style="font-size:16px; font-weight:bold; color:green; padding:15px 20px">فواتيري</a>
                            </li>
                            <hr style="margin:0">
                            @endif
                            <li>
                                <a style="font-size:16px; font-weight:bold; color:#ff1818; padding:10px 20px" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
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


                            اشترك معنا
                            <span style="padding-right:2px">
                                الان
                            </span>


                            <span class="caret"></span></a>
                        <ul class="dropdown-menu ">
                            <li><a href="{{route('register')}}?action=owner">
                                    تسجيل حساب جديد
                                </a></li>

                            <li><a href="{{route('login')}}">
                                    تسجيل الدخول
                                </a></li>

                        </ul>
                    </li>
                    @endif

                </ul>

            </div>



            @if(Auth::user() || url()->current() != url('/'))
            <a class="navbar-brand hidden-xs hidden-sm after-login" href="{{url('/')}}" style="position:absolute; left: calc(50vw - 68px); z-index:99; top:86px">
                <div style="background: #FFF; width: 225px; text-align: center;border-bottom-right-radius: 12px;
    border-bottom-left-radius: 12px;">
                    <img src="{{url('public/design/mandoby')}}/images/logo.png" alt=" logo" style="width: 168px; margin-top:-9px; margin-left:4px">
                </div>
            </a>
            @else
            <a class="navbar-brand hidden-xs hidden-sm" href="{{url('/')}}" style="position:absolute; left: calc(50vw - 99px); z-index:99">
                <div style="background: #FFF; width: 270px; text-align: center;border-bottom-right-radius: 12px;
    border-bottom-left-radius: 12px;">
                    <img src="{{url('public/design/mandoby')}}/images/logo.png" alt=" logo" style="width: 230px; margin-top:-9px; margin-left:4px">
                </div>
            </a>
            @endif

            <div id="slidemenu" style="">
                <form class="navbar-form navbar-left" action="{{url('search/projects')}}" style="direction:rtl">
                    <div class="form-group">
                        @if(isset($_GET['keyword']))
                        <input type="text" name="keyword" class="form-control" placeholder="ابحث هنا" value="{{$_GET['keyword']}}">
                        @else
                        <input type="text" name="keyword" class="form-control" placeholder="ابحث هنا">
                        @endif
                    </div>
                    <button type="submit" class="btn btn-default" style="color: #FFF; background-color: #000; border-color: #000; padding: 4px 29px; font-size: 18px !important">
                        <i class="fa fa-search" aria-hidden="true"></i>
                    </button>
                </form>
            </div>

            <div class="logso hidden-lg ">
                <a href="{{url('/')}}">
                    <div style="background: #FFF;text-align: center;border-bottom-right-radius: 12px;
        border-bottom-left-radius: 12px;">
                        <img src="{{url('public/design/mandoby')}}/images/logo.png" alt=" logo" style="width: 112px; margin-top:-9px; margin-left:4px">
                    </div>
                </a>
            </div>
    </nav>



    <div id="navbar-height-col"></div>
