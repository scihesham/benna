<form method="" action="#">
     @foreach($offer->messages as $key => $message)
     <?php
        if($key == 0 || ($offer->messages[$key]->created_at->format('Y-m-d') != $offer->messages[$key-1]->created_at->format('Y-m-d')))
             $avatar = true;
        else
            $avatar = false;
        
     ?>
    
    
        <!-- check if it is text -->
        @if($message->type == '0') 
            <!-- send from owner -->
            @if($message->messageFrom->permission == 2)
    
            @if($key == 0 || $avatar || ($offer->messages[$key]->messageFrom->id != $offer->messages[$key-1]->messageFrom->id))
            <div class="text-center" style="width:100%;position: relative; bottom: -30px; color: #9a9a9a">{{$message->created_at->format('Y-m-d')}}</div>
            <div>
                
                @if(isset($offer->messages[$key]->messageFrom->attachment->path))
                <img class='img-circle' style="width:40px" src="{{url('public/upload')}}/{{$offer->messages[$key]->messageFrom->attachment->path}}">
                @else
                <img class='img-circle'style="width:40px" src="{{url('public/design/adminlte/dist/img/avatar5.png')}}">
                @endif
                <span class="message-owner">{{$offer->messages[$key]->messageFrom->name}}</span>
            </div>
            @endif
    
            <div class="panel panel-default" style="width:70%; margin-right:0 !important; margin-bottom: 6px;background-color:#3578e5; border-radius: 40px; border: 1px solid;">
                <div class="panel-body" style="color:#FFF !important">
                    <div class="form-group" style="margin-bottom:0 !important">
                        {{$message->content}} 
                    </div>
                </div>
            </div>
            <!-- send from company -->
            @elseif($message->messageFrom->permission == 3)
    
            @if($key == 0 || $avatar || ($offer->messages[$key]->messageFrom->id != $offer->messages[$key-1]->messageFrom->id))
            <div class="text-center" style="width:100%;position: relative; bottom: -30px; color: #9a9a9a">{{$message->created_at->format('Y-m-d')}}</div>
            <div class="text-left" style="width:100%">
                
                <span class="message-owner">{{$offer->messages[$key]->messageFrom->name}}</span>
                @if(isset($offer->messages[$key]->messageFrom->attachment->path))
                <img class='img-circle' style="width:40px" src="{{url('public/upload')}}/{{$offer->messages[$key]->messageFrom->attachment->path}}">
                @else
                <img class='img-circle'style="width:40px" src="{{url('public/design/adminlte/dist/img/engineer.png')}}">
                @endif
            </div>
            @endif
    
            <div class="panel panel-default" style="width:70%; margin-left:0 !important; margin-bottom: 6px;background-color:#EEE;     border-radius: 40px; border: 1px solid;">
                <div class="panel-body" >
                    <div class="form-group" style="margin-bottom:0 !important">
                        {{$message->content}} 
                    </div>
                </div>
            </div>
            @endif
        
        <!-- check if it is attachment -->
        @else  
            <!-- send from owner -->
            @if($message->messageFrom->permission == 2)
            @if($key == 0 || $avatar || ($offer->messages[$key]->messageFrom->id != $offer->messages[$key-1]->messageFrom->id))
            <div class="text-center" style="width:100%;position: relative; bottom: -30px; color: #9a9a9a">{{$message->created_at->format('Y-m-d')}}</div>
            <div>
                @if(isset($offer->messages[$key]->messageFrom->attachment->path))
                <img class='img-circle' style="width:40px" src="{{url('public/upload')}}/{{$offer->messages[$key]->messageFrom->attachment->path}}">
                @else
                <img class='img-circle'style="width:40px" src="{{url('public/design/adminlte/dist/img/avatar5.png')}}">
                @endif
                <span class="message-owner">{{$offer->messages[$key]->messageFrom->name}}</span>
            </div>
            @endif
            <div class="panel panel-default" style="width:70%; margin-right:0 !important; margin-bottom: 6px;background-color:#FFF; border-radius: 40px; border: 1px solid;">
                <div class="panel-body" style="color:blue !important">
                    <div class="form-group" style="margin-bottom:0 !important">
                        <a href="{{url('public/upload')}}/{{$message->attachment->path}}" target="_blank">
                            {{$message->attachment->name}}
                        </a>  
                    </div>
                </div>
            </div>
            <!-- send from company -->
            @elseif($message->messageFrom->permission == 3)
            @if($key == 0 || $avatar || ($offer->messages[$key]->messageFrom->id != $offer->messages[$key-1]->messageFrom->id))
            <div class="text-center" style="width:100%;position: relative; bottom: -30px; color: #9a9a9a">{{$message->created_at->format('Y-m-d')}}</div>
            <div class="text-left" style="width:100%">
                <span class="message-owner">{{$offer->messages[$key]->messageFrom->name}}</span>
                @if(isset($offer->messages[$key]->messageFrom->attachment->path))
                <img class='img-circle' style="width:40px" src="{{url('public/upload')}}/{{$offer->messages[$key]->messageFrom->attachment->path}}">
                @else
                <img class='img-circle'style="width:40px" src="{{url('public/design/adminlte/dist/img/engineer.png')}}">
                @endif
            </div>
            @endif
            <div class="panel panel-default" style="width:70%; margin-left:0 !important; margin-bottom: 6px;background-color:#FFF;     border-radius: 40px; border: 1px solid;">
                <div class="panel-body" >
                    <div class="form-group" style="margin-bottom:0 !important">
                        <a href="{{url('public/upload')}}/{{$message->attachment->path}}" target="_blank">
                            {{$message->attachment->name}}
                        </a>  
                    </div>
                </div>
            </div>
            @endif
    
        @endif
    
    
     @endforeach
    <div class="modal-footer edit-modal">
        <button type="button" class="btn btn-default pull-right" data-dismiss="modal">غلق</button>
    </div>
</form>
<!--    </div>-->
<!--</div>-->
