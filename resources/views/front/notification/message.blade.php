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