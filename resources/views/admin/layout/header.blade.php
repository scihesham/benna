<header class="main-header">
    <!-- Logo -->
    <a href="{{url('login')}}" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>بناء</b></span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>بناء كويك</b></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </a>

        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <!-- User Account: style can be found in dropdown.less -->
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="{{asset('public/design/adminlte/dist/img/user2-160x160.jpg')}}" class="user-image" alt="User Image">
                        <span class="hidden-xs">{{auth()->user()->name}}</span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header">
                            <img src="{{asset('public/design/adminlte/dist/img/user2-160x160.jpg')}}" class="img-circle" alt="User Image">

                            <p>
                                {{auth()->user()->name}}
                                <small>مدير التطبيق</small>
                            </p>
                        </li>
                        <li class="user-footer">
                            <div class="pull-left">
                                <a data-toggle="modal" data-target="#admin_modal" href="#" class="btn btn-default btn-flat"><i class="fa fa-lock"></i> تغيير بياناتى</a>
                            </div>
                            <div class="pull-right">
                                <a  class="btn btn-primary logout" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" style="font-weight:unset;">
                                    Logout
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </div>
                        </li>
                    </ul>
                </li>

                
                <span id="last-seen-invoice" class="hide">{{Auth::user()->last_seen_invoice}}</span>
                <span id="last-invoice" class="hide">
                    @if(isset(\App\Invoice::where('status', '0')->latest()->first()->id))
                    {{\App\Invoice::where('status', '0')->latest()->first()->id}}
                    @else
                    0
                    @endif
                </span>
                
                <span id="last-seen-receipt" class="hide">{{Auth::user()->last_seen_receipt}}</span>
                <span id="last-receipt" class="hide">
                    {{last_receipt_notconfirmed()}}
                </span>
                
                <span id="last-seen-overdateInvoices" class="hide">{{Auth::user()->last_seen_overdate_invoice}}</span>
                <span id="last-overdateInvoices" class="hide">
                    {{last_overdateInvoices_general()}}
                </span>
                
                <!-- invoices and receipts -->
                <li class="dropdown user user-menu">    
                    <a href="#" class="dropdown-toggle notification" data-toggle="dropdown" id="invoice-bill">


                            <div class="invoice-circle hide">
                            </div>
                            <i class="fa fa-bell" style=""></i>
                      </a>
                    <ul class="dropdown-menu  notification-menu" style="width:350px">
                        @foreach(invoicesNotification() as $notification)
                        <!-- for receipt -->
                        @if(isset($notification->transfer_time) && isset($notification->invoice_id))
                            @if($notification->invoice->status == '0')
                                <li class="receipt-content">
                                    <a href="{{url('admin/invoice?action=not-paid&invoice_id='.$notification->invoice_id)}}"
                                       style="color:#000">
                                    <h3 class="text-center title">ايصال </h3>
                                    <h4 class="text-center">
                                        ({{$notification->invoice->offer->project->title}})
                                    </h4>
                                    <div class="notification-content">
                                        <div class="col-xs-6 text-right" style="padding-left:0">
                                            <h4>رقم المشروع :</h4>
                                            <span>{{$notification->invoice->offer->project->id}}</span>
                                        </div>
                                        <div class="col-xs-6 text-right">
                                            <h4>البنك :</h4>
                                            <span>{{$notification->bank}}</span>
                                        </div>

                                        <div class="col-xs-6 text-right" style="padding-left:0">
                                            <h4>المحول :</h4>
                                            <span>{{$notification->transfer_name}}</span>
                                        </div>
                                        <div class="col-xs-6 text-right">
                                            <h4>المبلغ :</h4>
                                            <span>{{$notification->money}}</span>
                                        </div>
                                    </div>
                                    </a>
                                </li>
                            @endif
                        <!-- overdate invoices -->
                        @elseif((isset($notification->days_num)) && (isset($notification->invoice_type) && $notification->invoice_type == 'overdate_invoices' ))
                        <li id="" class="msg overdate-invoice" style="position:relative">
                            <a href="{{url('admin/invoice?action=not-paid&invoice_id='.$notification->id)}}" style="font-size:16px; font-weight:bold; color:green; padding:0 20px">
                                <center style="padding-top:10px">
                                    <span style="color:red">فاتورة </span><br>
                                    ({{$notification->offer->project->title}})
                                </center><br>
                                <span style="color:#75787d;display:inline-block;text-align:right;margin-top: 11px;">
                                    برجاء العلم ان هذه الفاتورة قد انتهى
                                    <br>
                                    
                                    ميعاد استحقاقها منذ
                                  <span style="color:#f70c0c"> ({{-1 * $notification->days_num}}) </span> 
                                    ايام
                                </span>
                                <div class="overdate-invoice-content">
                                    <div class="col-xs-6 text-left" style="padding-left:0;">
                                        <h4>رقم المشروع :</h4>
                                        <span>{{$notification->offer->project->id}}</span>
                                    </div>
                                    <div class="col-xs-6 text-right" style="padding-right:0">
                                        <h4>المبلغ :</h4>
                                        <span>{{$notification->offer->milestones->sum('value') *  0.01}}</span>
                                    </div>
                                </div>
                                <hr style="margin-bottom:0; margin-top:10px;">
                            </a>
                        </li>
                        @else
                        <!-- for invoice -->
                        <li class="invoice-content">
                            <a href="{{url('admin/invoice?action=not-paid&invoice_id='.$notification->id)}}" style="color:#000">
                            <h3 class="text-center title">فاتورة </h3>
                            <h4 class="text-center">
                                ({{$notification->offer->project->title}})
                            </h4>
                            <div class="notification-content">
                                <div class="col-xs-6 text-right" style="padding-left:0">
                                    <h4>رقم المشروع :</h4>
                                    <span>{{$notification->offer->project->id}}</span>
                                </div>
                                <div class="col-xs-6 text-right">
                                    <h4>المبلغ :</h4>
                                    <span>{{$notification->offer->milestones->sum('value') *  0.01}}</span>
                                </div>
                            </div>
                            </a>
                        </li>
                        
                        @endif
                        <hr>
                        @endforeach
                    </ul>
                </li>
                <!-- end invoices and receipts -->
                
                <!-- overdate invoices -->
                <li class="dropdown user user-menu">    
                    <a href="#" class="dropdown-toggle notification" data-toggle="dropdown" id="overdate-invoice-bill">


                            <div class="overdate-invoice-circle hide">
                            </div>
                            <i class="fa fa-bell" style=""></i>
                      </a>
                    <ul class="dropdown-menu  notification-menu" style="width:350px">
                        @foreach(admin_overdateInvoices() as $notification)
                        <li id="" class="msg overdate-invoice" style="position:relative">
                            <a href="{{url('admin/invoice?action=not-paid&invoice_id='.$notification->id)}}" style="font-size:16px; font-weight:bold; color:green; padding:0 20px">
                                <center style="padding-top:10px">
                                    <span style="color:red">فاتورة </span><br>
                                    ({{$notification->offer->project->title}})
                                </center><br>
                                <span style="color:#75787d;display:inline-block;text-align:right;margin-top: 11px;">
                                    برجاء العلم ان هذه الفاتورة قد انتهى
                                    <br>
                                    
                                    ميعاد استحقاقها منذ
                                  <span style="color:#f70c0c"> ({{-1 * $notification->days_num}}) </span> 
                                    ايام
                                </span>
                                <div class="overdate-invoice-content">
                                    <div class="col-xs-6 text-left" style="padding-left:0;">
                                        <h4>رقم المشروع :</h4>
                                        <span>{{$notification->offer->project->id}}</span>
                                    </div>
                                    <div class="col-xs-6 text-right" style="padding-right:0">
                                        <h4>المبلغ :</h4>
                                        <span>{{$notification->offer->milestones->sum('value') *  0.01}}</span>
                                    </div>
                                </div>
                                <hr style="margin-bottom:0; margin-top:10px;">
                            </a>
                        </li>
                        @endforeach
                    </ul>
                </li>
                <!-- end overdate invoices -->
                <!-- Control Sidebar Toggle Button -->
                {{--<li>--}}
                {{--<a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>--}}
                {{--</li>--}}
            </ul>
        </div>
    </nav>
</header>

<div class="modal fade admin_modal" id="admin_modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="post" action="{{url('admin/users').'/'.Auth::user()->id}}">
             {{ csrf_field() }}
             <input name="_method" type="hidden" value="PATCH" />
            <div class="modal-header">
                <button type="button" class="close pull-right" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">تغيير كلمة المرور</h4>
            </div>
            <div class="modal-body">
                <div class="alert alert-success hidden admin_success text-center"></div>
                <div class="alert alert-danger hidden admin_error text-center"></div>
                <input type="hidden" name="permission" value="{{Auth::user()->permission}}">
                <div class="form-group">
                    <input type="text" name="name" class="form-control" placeholder="الاسم" value="{{Auth::user()->name}}">
                </div>
                <div class="form-group">
                    <input type="email" name="email" class="form-control" placeholder="البريد الالكترونى" value="{{Auth::user()->email}}">
                </div>
                <div class="form-group">
                    <input type="password" name="password" class="form-control" placeholder="كلمة المرور">
                </div>
                <div class="form-group">
                    <input type="password" name="password_confirmation" class="form-control" placeholder="تأكيد كلمة المرور">
                </div>
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-right" data-dismiss="modal">غلق</button>
                <button type="submit" class="btn btn-primary change_password_button pull-left">حفظ التغييرات</button>
            </div>
             </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->