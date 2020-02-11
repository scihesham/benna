$(function() {
	'use strict';


    var last_seen_project = Number($('#last-seen-project').text());
    var last_project = Number($('#last-project').text());
    
    var last_seen_invoice = Number($('#last-seen-invoice').text());
    var last_invoice = Number($('#last-invoice').text());
    
    var last_seen_notpaid_invoice = Number($('#last-seen-notpaid-invoice').text());
    var last_notpaid_invoice = Number($('#last-notpaid-invoice').text());
   
    
    /* if user is company */
    if(permission == '3'){
       if(award_count > 0){
          $('.pro-circle').removeClass('hide');
       }
        /* if there is not seen overdate_invoices */
       if(overdate_invoice_count > 0){
          $('.user-invoice-circle').removeClass('hide');
        }
        
        /* if there is end projects not seen */
       if(end_projects_notseen_count > 0){
           $('.pro-circle').removeClass('hide');
       }
        
       /* if there is evaluation not seen */
       if(evaluation_notification_notseen_count > 0){
           $('.pro-circle').removeClass('hide');
       }
        
       if((last_project > last_seen_project )){
                $('.pro-circle').removeClass('hide');
        }
        
        if( (last_seen_invoice < last_invoice) || (last_seen_notpaid_invoice < last_notpaid_invoice)){
                $('.user-invoice-circle').removeClass('hide');
        }
    }
    
    
    var last_seen_offer = Number($('#last-seen-offer').text());
    var last_offer = Number($('#last-offer').text());
    
    /* if user is owner */
    if(permission == '2'){
        
        if(last_offer != last_seen_offer){
            $('.offer-circle').removeClass('hide');
        }
        
        /* if there is evaluation not seen */
       if(evaluation_notification_notseen_count > 0){
           $('.offer-circle').removeClass('hide');
       }       
        
    }
    
    
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
//               console.log(data);

               var j;
               for (j in data) {
                    if(j == 'success'){
                        $('.dropdown .project-menu').html(data.data);
                        if(data.last_pro_id > $('#last-project').text()){
                            // last_project = data.last_pro_id;
                            $('#last-project').text(data.last_pro_id);
                            $('.pro-circle').removeClass('hide');
                        }                    

                        /* award offer not seen */
                        if(data.offers_count > 0 || data.end_projects_notseen_count > 0 || data.evaluation_notification_notseen_count > 0){
                            $('.pro-circle').removeClass('hide');
                        }

                    }
               }
           }
        })

      }
    
    
     function userInvoiceNotification(){
        $.ajax({
           url:url+'/notification/user-invoice',
           method:'GET',
           success:function(data)
           {
//               console.log(data.last_pro_id +' '+ last_project + ' ' +  data.offers_count);
               console.log('h '+data.last_notpaid_invoice_id + ' ' + ($('#last-notpaid-invoice').text()));

               var j;
               for (j in data) {
                    if(j == 'success'){
                        $('.dropdown .user-invoice-menu').html(data.data);
                        
                        if(data.last_notpaid_invoice_id > $('#last-notpaid-invoice').text()){
                            $('#last-notpaid-invoice').text(data.last_notpaid_invoice_id);
                            $('.user-invoice-circle').removeClass('hide');
                        }
                        
                        if(data.last_invoice_id > $('#last-invoice').text()){
                            $('#last-invoice').text(data.last_invoice_id);
                            $('.user-invoice-circle').removeClass('hide'); 
                        }
                        
                        /* award offer not seen */
                        if( data.overdate_invoice_count > 0 ){
                            $('.user-invoice-circle').removeClass('hide');
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
                        if(data.last_offer_id > Number($('#last-offer').text())){
                            $('#last-offer').text(data.last_offer_id);
                            $('.offer-circle').removeClass('hide');
                        }
                        
                        /* evaluation not seen */
                        if(data.evaluation_notification_notseen_count > 0){
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
    
    /* if user is company or admin or support */
    if(permission == '3' || permission == '0' || permission == '1'){
        window.setInterval(function(){
                userInvoiceNotification();
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
    
    
    $('.award-project').click(function(){
        /***/
            $.ajax({
               url: url+'/last-seen-project',
               method: 'POST',
               data: {
                    _token: csrf_token,
                   last_project_id : Number($('#last-project').text())
               },
               success:function(data)
               {
                   console.log(data);
                   if(data.status == 'success'){
                       /* award offer not seen or overdate_invoice not seen */
                       if((data.offers_count ==  0)){
                          $('.pro-circle').addClass('hide');
                       }
                   }

                }
              
            })
        /***/

    });

    
    $('#user-invoice-bill').click(function(){
  
        /***/
            $.ajax({
               url: url+'/last-seen-project',
               method: 'POST',
               data: {
                    _token: csrf_token,
                   last_invoice_id : Number($('#last-invoice').text()),
                   last_notpaid_invoice_id : Number($('#last-notpaid-invoice').text())
               },
               success:function(data)
               {
                   console.log(data);
                   if(data.status == 'success'){
                       /* overdate_invoice seen */
                       if( (data.overdate_invoice_count == 0) ){
                          $('.user-invoice-circle').addClass('hide');
                       }
                   }

                }
              
            })
        /***/

    });
    

    $('#offer-bill').click(function(){
        
        /***/
            $.ajax({
               url: url+'/last-seen-offer',
               method: 'POST',
               data: {
                    _token: csrf_token,
                   last_offer_id : Number($('#last-offer').text())
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
    
 


/* awarded offer seen */
function seenOffer(award_project_id){
        /***/
        $.ajax({
           url: url+'/offer/seen',
           method: 'POST',
           data: {
                _token: csrf_token,
               project_id : award_project_id
           },
           success:function(data)
           {
               console.log(data);
               if(data.status == 'success'){
                   $('#award'+data.id+' .seen-offer').addClass('hide');
                   $('.award-project').addClass('open');
                   console.log(data.offers_count ==  0);
                   if(data.offers_count ==  0){
                        $('.pro-circle').addClass('hide');
                    }
               }
                

            }

        })
    /***/
}

/* overdate invoice seen */
function seenOverdateInvoice(overdate_invoice_id){
        /***/
        $.ajax({
           url: url+'/overdate-invoice/seen',
           method: 'POST',
           data: {
                _token: csrf_token,
               invoice_id : overdate_invoice_id
           },
           success:function(data)
           {
               console.log('#overdate-invoice'+data.id);
               if(data.status == 'success'){
                   $('#overdate-invoice'+data.id + ' .seen-overdate-invoice').addClass('hide');
                   $('.user-invoice.bill-notification').addClass('open');
                   console.log(data.overdate_invoice_count ==  0);
                   if(data.overdate_invoice_count ==  0){
                        $('.user-invoice-circle').addClass('hide');
                    }
               }
                

            }

        })
    /***/
}




