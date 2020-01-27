$(function() {
	'use strict';

    
    $('.fields .cont-nav div').click(function(){
       // $(this).addClass('selected').siblings().removeClass('selected');
        $('.fields .cont-nav div').removeClass('selected');
        $(this).addClass('selected');
        $('.fields .no-show').hide();
        $('.fields'+' .' + $(this).data('class')).fadeIn(100);
//        console.log($(this).data('class')));
         //alert('.no-show'+' .' +$(this).data('class') );
    })
       
    
});


function myfuncAr(){
    return confirm('هل تريد الحذف بالفعل ؟ '); 
}


function myfuncAward(company_name){
    return confirm('هل تريد بالفعل اسناد المشروع الى '+ company_name +'؟ '); 
}


function confirmAr(){
    return confirm('هل انت متأكد ؟ '); 
}

function openForm() {
  document.getElementById("myForm").style.display = "block";
}

function closeForm() {
  document.getElementById("myForm").style.display = "none";
}