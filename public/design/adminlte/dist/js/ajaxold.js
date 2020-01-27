$(function() {
	'use strict';


    
     function msgNotification(){
        $.ajax({
           url:url+'/notification/messages',
           method:'GET',
           success:function(data)
           {
//               console.log(data.data);
               var i;
               for (i in data) {
                    if(i == 'success'){
                        $('.dropdown .msg-menu').html(data.data);
                        if(data.unseen > 0){
                            $('.msg-circle').removeClass('hide');
                            $('#unseen-count').text(data.unseen);
                            
                        }
                    }
               }
           }
        })

      }
    
    
     function projectNotification(){
        $.ajax({
           url:url+'/notification/projects',
           method:'GET',
           success:function(data)
           {
               console.log(data);

               var j;
               for (j in data) {
                    if(j == 'success'){
                        $('.dropdown .project-menu').html(data.data);
                        if(data.last_pro_id > last_project){
                            last_project = data.last_pro_id;
                            $('.pro-circle').removeClass('hide');
//                            alert(last_project_id);
                        }
                    }
               }
           }
        })

      }
    
     function offerNotification(){
        $.ajax({
           url:url+'/notification/offers',
           method:'GET',
           success:function(data)
           {
//               console.log(data);

               var z;
               for (z in data) {
                    if(z == 'success'){
                        $('.dropdown .offer-menu').html(data.data);
                        if(data.last_offer_id > last_offer){
                            last_offer = data.last_offer_id;
                            $('.offer-circle').removeClass('hide');
                        }
                    }
               }
           }
        })

      }
    
    if(auth){
        window.setInterval(function(){
                msgNotification();
        }, 10000);
    }
    
    /* if user is company or admin or support */
    if(permission == '3' || permission == '0' || permission == '1'){
        window.setInterval(function(){
                projectNotification();
        }, 7000);
    }
    
    /* if user is owner */
    if(permission == '2'){
        window.setInterval(function(){
                offerNotification();
        }, 7000);
    }
    
    
    var unseen_count = Number($('#unseen-count').text());
    if(unseen_count > 0){
        $('.msg-circle').removeClass('hide'); 
    }
    
    var last_seen_project = Number($('#last-seen-project').text());
    var last_project = Number($('#last-project').text());
    if(last_project != last_seen_project){
        $('.pro-circle').removeClass('hide');
    }
    $('#pro-bill').click(function(){
        
        /***/
            $.ajax({
               url: url+'/last-seen-project',
               method: 'POST',
               data: {
                    _token: csrf_token,
                   last_project_id : last_project
               },
               success:function(data)
               {
                   console.log(data);
                   if(data.status == 'success'){
                       last_project = data.last_pro_id
                       $('.pro-circle').addClass('hide');
                   }

                }

            })
        /***/
    });
    
    
    var last_seen_offer = Number($('#last-seen-offer').text());
    var last_offer = Number($('#last-offer').text());
    if(last_offer != last_seen_offer){
        $('.offer-circle').removeClass('hide');
    }
    $('#offer-bill').click(function(){
        
        /***/
            $.ajax({
               url: url+'/last-seen-offer',
               method: 'POST',
               data: {
                    _token: csrf_token,
                   last_offer_id : last_offer
               },
               success:function(data)
               {
                   console.log(data);
                   if(data.status == 'success'){
                       $('.offer-circle').addClass('hide');
                   }

                }

            })
        /***/
    });
    
});






