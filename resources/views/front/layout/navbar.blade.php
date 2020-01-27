<body>
<!--=============================================================-->
<!--
<div class="navbar navbar-default" role="navigation" id="slide-nav">
    <div class="container">
-->

<nav class="navbar navbar-default ">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-toggle"  data-toggle="collapse" data-target="#navbar-brand-centered">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>
            
        </div>
            <div class="collapse navbar-collapse" id="navbar-brand-centered" style="float: right;" >
            <ul class="nav navbar-nav" id="sec" style="background:#0067ab !important" >
                <li class=" active" id=""><a href="{{url('/')}}">
                        الرئيسية

                    </a>
                </li>

                @if(Auth::user() && (Auth::user()->permission == 3 || Auth::user()->permission == 0))
                <li class="new-pro" id="">
                    <a href="{{url('search/projects')}}" >
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


<!--

                <li class=""><a href="">

                        خدماتنا


                    </a>


                </li>
-->



<!--
                <li class=""><a href="">



                        اتصل بنا

                    </a>
-->



                </li>

                @if(Auth::user())
                <!--
                <li>
                    <a href="#">
                        <i class="fa fa-envelope" style=""></i>
                    </a>
                </li>
-->
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
                
                <li class="show-small" style="display:none"><a href="">
                     <a href="{{url('allmessages')}}" style=" color:green;padding-top:0">
                        <i class="fa fa-envelope" style="margin-top:-4px"></i> &nbsp;
                   
                         عرض كافه الرسائل</a>

                </li>
                    
                <li class="dropdown hide-small">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <div class="msg-circle hide">
                            <span id="unseen-count">{{$unseen_count}}</span>
                        </div>
                        <i class="fa fa-envelope" style=""></i>

                    </a>
                    <ul class="dropdown-menu msg-menu" style="left:0; right:auto; width:300px; padding: 0 1px; max-height: 500px; overflow-y: auto;">
                        <?php $i = 0?>
                        @foreach(messagesNotification() as $msg)
                        <?php
                            if($i < 4)
                                $i++;
                            else
                                break;
                        ?>
                        <li class="msg" style="position:relative">
                            <!-- project messages -->
                            @if(isset($msg->offer->project->title))
                            <a href="{{url('messages').'/'.$msg->offer->id}}#last-msg" style="font-size:16px; font-weight:bold; color:green; padding:0 20px">
                                <center style="padding-top:10px">{{$msg->offer->project->title}}</center><br>
                                @if($msg->type == '0')
                                    <span style="color:#75787d">{{$msg->content}}</span>
                                @else
                                   <span style="color:#75787d">{{$msg->attachment->name}}</span>
                                @endif
                                @if($msg->messageNotifications->to_user == Auth::user()->id && $msg->messageNotifications->to_status == '0')
                                <small>لم تتم القراءه</small>
                                @endif
                                <hr style="margin-bottom:0">
                            </a>

                            @endif
                        </li>
                        @endforeach
                        <li>
                            <a href="{{url('allmessages')}}" style="font-size:16px; font-weight:bold; color:green; padding:20px 20px">عرض كافه الرسائل</a>
                        </li>
                    </ul>
                </li>
                <!-- projects notification -->
                <!-- if user is company or admin or support -->
                @if(Auth::user()->permission == '3' || Auth::user()->permission == '0' || Auth::user()->permission == '1')
                
                <li class="show-small" style="display:none"><a href="">
                     <a href="{{url('search/projects')}}" style=" color:green;padding-top:0">
                        <i class="fa fa-bell" style="margin-top:-4px"></i> &nbsp;
                   
                         عرض كافه المشاريع
                    </a>

                </li>
                <li class="dropdown hide-small bill-notification ">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" id="pro-bill">
<!--
                        <div class="pro-circle">
                        </div>
-->
                        <span id="last-seen-project" class="hide">{{Auth::user()->last_seen_project}}</span>
                        <span id="last-project" class="hide">
                            @if(isset(\App\Project::latest()->first()->id))
                            {{\App\Project::latest()->first()->id}}
                            @else
                            0
                            @endif
                        </span>
                        
                        <span id="last-seen-invoice" class="hide">{{Auth::user()->last_seen_invoice}}</span>
                        
                        <span id="last-invoice" class="hide">
                            @if(isset(\App\Invoice::where('status', 1)
                                ->whereHas('offer', function ($query) {
                                    $query->where('company_id',  Auth::user()->id);
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
                                    $query->where('company_id',  Auth::user()->id);
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
                        
                        <div class="pro-circle hide">
                            
                        </div>
                        <i class="fa fa-bell" style=""></i>

                    </a>
                    <ul class="dropdown-menu project-menu" style="left:0; right:auto; width:300px; padding: 0 1px;max-height: 500px; overflow-y: auto; overflow-x:hidden">
                        
                        <!-- awarded offers -->
                        @foreach(awardProjects() as $project)
                        <li id="award{{$project->id}}" class="msg awardoffer" style="position:relative">
                            <a href="{{url('offer/project').'/'.$project->id}}" style="font-size:16px; font-weight:bold; color:green; padding:0 20px">
                                <center style="padding-top:10px">
                                    <span style="color:red">تهانينا تم اختيارك لتنفيذ </span><br>
                                    ({{$project->title}})
                                </center><br>
                                <span style="color:#75787d">{{$project->desc}}</span>
                                <a class="btn btn-success seen-offer" onclick="return seenOffer({{$project->id}})">شكرا تمت الرؤيه</a>
                                <hr style="margin-bottom:0; margin-top:10px;">
                            </a>
                        </li>
                        @endforeach
                        
                        <!-- overdate invoices -->
                        @foreach(overdateInvoices() as $invoice)
                        <li id="overdate-invoice{{$invoice->id}}" class="msg overdate-invoice" style="position:relative">
                            <a href="{{url('invoice?invoice_id='.$invoice->id)}}" style="font-size:16px; font-weight:bold; color:green; padding:0 20px">
                                <center style="padding-top:10px">
                                    <span style="color:red">فاتورة </span><br>
                                    ({{$invoice->offer->project->title}})
                                </center><br>
                                <span style="color:#75787d">
                                    برجاء العلم ان هذه الفاتورة قد انتهى
                                    <br>
                                    
                                    ميعاد استحقاقها منذ
                                  <span style="color:#f70c0c"> ({{-1 * $invoice->days_num}}) </span> 
                                    ايام
                                </span>
                                <div class="overdate-invoice-content">
                                    <div class="col-md-6 text-right" style="padding-right:0">
                                        <h4>رقم المشروع :</h4>
                                        <span>{{$invoice->offer->project->id}}</span>
                                    </div>
                                    <div class="col-md-6 text-left" style="padding-left:0">
                                        <h4>المبلغ :</h4>
                                        <span>{{$invoice->offer->milestones->sum('value') *  0.01}}</span>
                                    </div>
                                </div>
                                <a class="btn btn-success seen-overdate-invoice" onclick="return seenOverdateInvoice({{$invoice->id}})" style="">شكرا تمت الرؤيه</a>
                                <hr style="margin-bottom:0; margin-top:10px;">
                            </a>
                        </li>
                        @endforeach
                        
                        @foreach(invoices_projects() as $notification)
                            <!-- for end projects -->
                            @if((isset($notification->type) && $notification->type == 'end project'))
                                <li class="msg" style="position:relative">
                                    <a href="{{url('messages').'/'.$notification->awardOffer->id}}" style="font-size:16px; font-weight:bold; color:green; padding:0 20px">
                                        <center style="padding-top:10px;color:red">
                                            <span style="color:red">تهانينا تم انهاء مشروع </span><br>
                                            ({{$notification->title}})
                                        </center><br>
                                        <span style="color:#75787d">
                                            {{$notification->desc}}
                                        </span>
                                        
                                        <div class="overdate-invoice-content">
                                            <div class="col-md-6 text-right" style="padding-right:0">
                                                <h4 style="display:inline-block">رقم المشروع :</h4>
                                                <span>{{$notification->id}}</span>
                                            </div>
                                            <div class="col-md-6 text-left" style="padding-left:0">
                                                <h4 style="display:inline-block">المبلغ :</h4>
                                                <span>{{$notification->awardOffer->milestones->sum('value')}}</span>
                                            </div>
                                        </div>
                                        
                                        <hr style="margin-bottom:0; margin-top:75px;">
                                    </a>
                                </li>
                            <!-- for evaluations -->
                            @elseif(isset($notification->rating_to_company))
                                <li class="msg" style="position:relative">
                                    <a href="{{url('messages').'/'.$notification->project->awardOffer->id}}" style="font-size:16px; font-weight:bold; color:green; padding:0 20px">
                                        <center style="padding-top:10px;color:#000">
                                            <span style="color:#000">
                                                قام 
                                                {{$notification->project->owner->name}}
                                                بتقيييمك في
                                            </span><br>
                                            ({{$notification->project->title}})
                                        </center><br>
                                        <span style="color:#75787d">
                                            {{$notification->project->desc}}
                                        </span>
                                        
                                        <div class="overdate-invoice-content">
                                            <div class="col-md-6 text-right" style="padding-right:0">
                                                <h4 style="display:inline-block">رقم المشروع :</h4>
                                                <span>{{$notification->project->id}}</span>
                                            </div>
                                            <div class="col-md-6 text-left" style="padding-left:0">
                                                <h4 style="display:inline-block">المبلغ :</h4>
                                                <span>{{$notification->project->awardOffer->milestones->sum('value')}}</span>
                                            </div>
                                        </div>
                                        
                                        <hr style="margin-bottom:0; margin-top:75px;">
                                    </a>
                                </li>
                        
                            <!-- for projects -->
                            @elseif(isset($notification->city) && isset($notification->owner_id))
                                <li class="msg" style="position:relative">
                                    <a href="{{url('offer/project').'/'.$notification->id}}" style="font-size:16px; font-weight:bold; color:green; padding:0 20px">
                                        <center style="padding-top:10px">{{$notification->title}}</center><br>
                                        <span style="color:#75787d">{{$notification->desc}}</span>
                                        <small style="color: green">{{$notification->created_at->format('Y-m-d')}}</small>
                                        <small style="color: green; direction:ltr" class="hours">{{$notification->created_at->format('h:i a')}}</small>
                                        <hr style="margin-bottom:0; margin-top:30px;">
                                    </a>
                                </li>
                            
                            @else
                                <!-- for invoices -->
                                <!-- not paid invoices -->
                                @if($notification->status == '0')
                                    <li class="invoice-content">
                                        <a href="{{url('invoice?invoice_id='.$notification->id)}}" style="padding:0">
                                        <h2 class="text-center title">فاتورة </h2>
                                        <h3 class="text-center" style="display:block; margin-top:-6px">
                                            ({{$notification->offer->project->title}})
                                        </h3>
                                        <div class="notification-content">
                                            <div class="col-md-6 text-right" style="padding-left:0">
                                                <h4>رقم المشروع :</h4>
                                                <span>{{$notification->offer->project->id}}</span>
                                            </div>
                                            <div class="col-md-6 text-left">
                                                <h4>المبلغ :</h4>
                                                <span>{{$notification->offer->milestones->sum('value') *  0.01}}</span>
                                            </div>
                                        </div>
                                            <hr style="margin-bottom:0; margin-top:68px;">
                                        </a>
                                    </li>
                                <!-- for paid invoices -->
                                @else
                                    <li class="invoice-content">
                                        <a href="{{url('invoice?invoice_id='.$notification->id)}}" style="padding:0">
                                        <h2 class="text-center title">فاتورة </h2>
                                        <h3 class="text-center" style="display:block; margin-top:-6px">
                                            ({{$notification->offer->project->title}})
                                        </h3>
                                        <div class="notification-content">
                                            <div class="col-md-12 text-right" style="padding-left:0">
                                                <span>
                                                    يسرنا ان نحيطكم علما انه تم تغيير
                                                </span>
                                                <span style="display:block; margin-top: -5px; margin-bottom: 10px;">    
                                                    حاله الفاتورة الى مدفوع
                                                </span>
                                            </div>
                                            <div class="col-md-6 text-right" style="padding-left:0">
                                                <h4>رقم المشروع :</h4>
                                                <span>{{$notification->offer->project->id}}</span>
                                            </div>
                                            <div class="col-md-6 text-left">
                                                <h4>المبلغ :</h4>
                                                <span>{{$notification->offer->milestones->sum('value') *  0.01}}</span>
                                            </div>
                                        </div>
                                            <hr style="margin-bottom:0; margin-top:145px;">
                                        </a>                                    </li>
                                @endif
                            @endif
                        @endforeach

                        <li>
                            <a href="{{url('search/projects')}}" style="font-size:16px; font-weight:bold; color:green; padding:20px 20px">عرض كافه المشاريع</a>
                        </li>
                    </ul>
                </li>
                @endif

                
                
                <!-- offer notification -->
                <!-- if user is owner -->
                @if(Auth::user()->permission == '2')
                
                <li class="show-small" style="display:none"><a href="">
                     <a href="{{url('projects')}}?project=non" style=" color:green;padding-top:0">
                        <i class="fa fa-bell" style="margin-top:-4px"></i> &nbsp;
                   
                          كافه العروض
                    </a>

                </li>
                <li class="dropdown hide-small">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" id="offer-bill">
<!--
                        <div class="pro-circle">
                        </div>
-->
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
                    <ul class="dropdown-menu offer-menu" style="left:0; right:auto; width:300px; padding: 0 1px; max-height: 500px; overflow-y: auto;">
                        @foreach(offerNotification() as $notification)
                            <!-- for evaluations -->
                            @if(isset($notification->rating_to_owner))
                                <li class="msg" style="position:relative">
                                    <a href="{{url('messages').'/'.$notification->project->awardOffer->id}}" style="font-size:16px; font-weight:bold; color:green; padding:0 20px">
                                        <center style="padding-top:10px;color:#000">
                                            <span style="color:#000">
                                                قام 
                                                {{$notification->project->company->name}}
                                                بتقيييمك في
                                            </span><br>
                                            ({{$notification->project->title}})
                                        </center><br>
                                        <span style="color:#75787d">
                                            {{$notification->project->desc}}
                                        </span>
                                        
                                        <div class="overdate-invoice-content">
                                            <div class="col-md-6 text-right" style="padding-right:0">
                                                <h4 style="display:inline-block">رقم المشروع :</h4>
                                                <span>{{$notification->project->id}}</span>
                                            </div>
                                            <div class="col-md-6 text-left" style="padding-left:0">
                                                <h4 style="display:inline-block">المبلغ :</h4>
                                                <span>{{$notification->project->awardOffer->milestones->sum('value')}}</span>
                                            </div>
                                        </div>
                                        
                                        <hr style="margin-bottom:0; margin-top:75px;">
                                    </a>
                                </li>
                        <!-- for offers -->
                        @else
                        <li class="msg" style="position:relative">
                            <a href="{{url('projects').'/'.$notification->project->id.'/#offer'.$notification->id}}" style="font-size:16px; font-weight:bold; color:green; padding:0 20px">
                                <center style="padding-top:10px">{{$notification->company->name}}</center><br>
                                <span style="color:#75787d"> عرض جديد على مشروع ({{$notification->project->title}})</span>
                                <small style="color: green">{{$notification->created_at->format('Y-m-d')}}</small>
                                <small style="color: green; direction:ltr" class="hours">{{$notification->created_at->format('h:i a')}}</small>
                                <hr style="margin-bottom:0; margin-top:30px;">
                            </a>
                        </li>
                        @endif
                        
                        @endforeach

                        <li>
                            <a href="{{url('projects')}}?project=non" style="font-size:16px; font-weight:bold; color:green; padding:20px 20px">كافه العروض</a>
                        </li>
                    </ul>
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
                            <a href="{{url('invoice')}}" style="font-size:16px; font-weight:bold; color:green; padding:15px 20px">فواتيري</a>
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
                        <li><a href="{{route('register')}}">
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
                    <input type="text" name="keyword" class="form-control" placeholder="ابحث هنا" >
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
    
    
    