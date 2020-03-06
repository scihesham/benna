
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