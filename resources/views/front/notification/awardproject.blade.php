                    <!---------------------------------------------------------------------->
                    <!---------------------------------------------------------------------->
                    
                    


                        <ul class="dropdown-menu project-menu" style="left:0; right:auto; width:300px; padding: 0 1px;max-height: 500px; overflow-y: auto; overflow-x:hidden">




                            @foreach(invoices_projects() as $notification)
                            <!-- awarded offers-->
                            @if((isset($notification->type) && $notification->type == 'award project'))
                            <li id="award{{$notification->id}}" class="msg awardoffer" style="position:relative">
                                <a href="{{url('offer/project').'/'.$notification->id}}" style="font-size:16px; font-weight:bold; color:green; padding:0 20px">
                                    <center style="padding-top:10px">
                                        <span style="color:red">تهانينا تم اختيارك لتنفيذ </span><br>
                                        ({{$notification->title}})
                                    </center><br>
                                    <span style="color:#75787d">{{$notification->desc}}</span>
                                    @if($notification->award_offer_seen == '0')
                                    <a class="btn btn-success seen-offer" onclick="return seenOffer({{$notification->id}})">شكرا تمت الرؤيه</a>
                                    @endif
                                    <hr style="margin-bottom:0; margin-top:10px;">
                                </a>
                            </li>
                            <!-- for end projects -->
                            @elseif((isset($notification->type) && $notification->type == 'end project'))
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
                                </a> </li>
                            @endif
                            @endif
                            @endforeach

                            <li>
                                <a href="{{url('search/projects')}}" style="font-size:16px; font-weight:bold; color:green; padding:20px 20px">عرض كافه المشاريع</a>
                            </li>
                        </ul>
                    <!----------------------------------------------------------------------------------------->
                    <!----------------------------------------------------------------------------------------->
                    <!----------------------------------------------------------------------------------------->