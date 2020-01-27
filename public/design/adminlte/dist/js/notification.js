$(function() {
	'use strict';
    
    var last_seen_invoice = Number($('#last-seen-invoice').text());
    var last_invoice = Number($('#last-invoice').text());
    
    var last_seen_receipt = Number($('#last-seen-receipt').text());
    var last_receipt = Number($('#last-receipt').text());
    
    var last_seen_overdate_invoice = Number($('#last-seen-overdateInvoices').text());
    var last_overdate_invoice = Number($('#last-overdateInvoices').text());

    if((last_seen_invoice < last_invoice) || (last_seen_receipt < last_receipt) || (last_seen_overdate_invoice < last_overdate_invoice)){
        $('.invoice-circle').removeClass('hide');
    }
    
    
    $('#invoice-bill').click(function(){
  
        /***/
            $.ajax({
               url: url+'/admin/last-seen-invoice',
               method: 'POST',
               data: {
                    _token: csrf_token,
                   last_invoice : Number($('#last-invoice').text()),
                   last_receipt : Number($('#last-receipt').text()),
                   last_overdate_invoice : Number($('#last-overdateInvoices').text())
               },
               success:function(data)
               {
                   console.log(data);
                   if(data.status == 'success'){
                          $('.invoice-circle').addClass('hide');
                   }

                }
              
            })
        /***/

    });
    
    
     function invoiceNotification(){
        $.ajax({
           url:url+'/admin/notification/invoice',
           method:'GET',
           success:function(data)
           {
               console.log(data.last_receipt);

               var j;
               for (j in data) {
                    if(j == 'success'){
                        $('.notification-menu').html(data.data);
                        if( (data.last_invoice > $('#last-invoice').text()) || (data.last_receipt > $('#last-receipt').text()) || (data.last_overdate_invoice > $('#last-overdateInvoices').text()) ){
                            // last_project = data.last_pro_id;
                            $('#last-invoice').text(data.last_invoice);
                            $('#last-receipt').text(data.last_receipt);
                            $('#last-overdateInvoices').text(data.last_overdate_invoice);
                            $('.invoice-circle').removeClass('hide');
                        }

                    }
               }
           }
        })

      }
    
    window.setInterval(function(){
            invoiceNotification();
    }, 7000);
    

    
    
});