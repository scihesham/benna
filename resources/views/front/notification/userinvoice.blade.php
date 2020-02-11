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
                        <ul class="dropdown-menu user-invoice-menu" style="left:0; right:auto; width:300px; padding: 0 1px;max-height: 500px; overflow-y: auto; overflow-x:hidden">

                            @foreach(user_invoices() as $notification)
                            <!-- for invoices -->
                            <!-- for overdate invoices-->
                            @if((isset($notification->days_num)) )
                            
                            <li id="overdate-invoice{{$notification->id}}" class="msg overdate-invoice" style="position:relative">
                                <a href="{{url('invoices?invoice_id='.$notification->id)}}" style="font-size:16px; font-weight:bold; color:green; padding:0 20px">
                                    <center style="padding-top:10px">
                                        <span style="color:red">فاتورة </span><br>
                                        ({{$notification->offer->project->title}})
                                    </center><br>
                                    <span style="color:#75787d">
                                        برجاء العلم ان هذه الفاتورة قد انتهى
                                        <br>

                                        ميعاد استحقاقها منذ
                                        <span style="color:#f70c0c"> ({{-1 * $notification->days_num}}) </span>
                                        ايام
                                    </span>
                                    <div class="overdate-invoice-content">
                                        <div class="col-md-6 text-right" style="padding-right:0">
                                            <h4>رقم المشروع :</h4>
                                            <span>{{$notification->offer->project->id}}</span>
                                        </div>
                                        <div class="col-md-6 text-left" style="padding-left:0">
                                            <h4>المبلغ :</h4>
                                            <span>{{$notification->offer->milestones->sum('value') *  0.01}}</span>
                                        </div>
                                    </div>
                                    @if($notification->seen_overdate_invoice == '0')
                                    <a class="btn btn-success seen-overdate-invoice" onclick="return seenOverdateInvoice({{$notification->id}})" style="">شكرا تمت الرؤيه</a>
                                    @endif
                                    <hr style="margin-bottom:0; margin-top:10px;">
                                </a>
                            </li>

                            <!-- not paid invoices -->
                            @elseif($notification->status == '0')
                            <li class="invoice-content">
                                <a href="{{url('invoices?invoice_id='.$notification->id)}}" style="padding:0">
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
                                <a href="{{url('invoices?invoice_id='.$notification->id)}}" style="padding:0">
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
                                </a> 
                            </li>
                            @endif
                            @endforeach

                            <li>
                                <a href="{{url('invoices')}}" style="font-size:16px; font-weight:bold; color:green; padding:20px 20px">عرض كافه الفواتير</a>
                            </li>
                        </ul>