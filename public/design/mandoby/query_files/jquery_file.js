/**
 * Created by moataz on 11/25/2017.
 */

$(document).ready(function() {

    $("#sec>li").mouseover(function(){
        $(this).addClass("active").siblings().removeClass("active");
    })





//========================================================start side navbar
    //stick in the fixed 100% height behind the navbar but don't wrap it
    $('#slide-nav.navbar-inverse').after($('<div class="inverse" id="navbar-height-col"></div>'));

    $('#slide-nav.navbar-default').after($('<div id="navbar-height-col"></div>'));

    // Enter your ids or classes
    var toggler = '.navbar-toggle';
    var pagewrapper = '#page-content';
    var navigationwrapper = '.navbar-header';
    var menuwidth = '100%'; // the menu inside the slide menu itself
    var slidewidth = '80%';
    var menuneg = '-100%';
    var slideneg = '-80%';


    $("#slide-nav").on("click", toggler, function (e) {

        var selected = $(this).hasClass('slide-active');

        $('#slidemenu').stop().animate({
            left: selected ? menuneg : '0px'
        });

        $('#navbar-height-col').stop().animate({
            left: selected ? slideneg : '0px'
        });

        $(pagewrapper).stop().animate({
            left: selected ? '0px' : slidewidth
        });

        $(navigationwrapper).stop().animate({
            left: selected ? '0px' : slidewidth
        });


        $(this).toggleClass('slide-active', !selected);
        $('#slidemenu').toggleClass('slide-active');


        $('#page-content, .navbar, body, .navbar-header').toggleClass('slide-active');


    });


    var selected = '#slidemenu, #page-content, body, .navbar, .navbar-header';


    $(window).on("resize", function () {

        if ($(window).width() > 767 && $('.navbar-toggle').is(':hidden')) {
            $(selected).removeClass('slide-active');
        }
    });

//========================================================end of side navbar


//========================================================counter

        $('.counter-count').each(function () {
            $(this).prop('Counter', 0).animate({
                Counter: $(this).text()
            }, {
                duration: 20000,
                easing: 'swing',
                step: function (now) {
                    $(this).text(Math.ceil(now));
                }
            });
        });

    //===================================================

    $(".build").click(function(){

        var ids= $(this).attr("id");



$("#" + ids + "-content").show().siblings().hide()
    });






 //========================================================end of swiper


$(".change").mouseover(function(){
    var y= $(this).attr("id");
    $("span").removeClass("actives1").removeClass("actives");

    $("#" + y).animate({
        marginTop:'-50px',
    },350).siblings().animate({
        marginTop:'0px',
    },350)



});




    $('#coin-slider').coinslider({width: 1348,height:500, navigation: false, delay: 2000,links : false,
        spw: 8, // squares per width
        sph: 8, // squares per height
        delay: 3000, // delay between images in ms
        sDelay: 30, });




    
//    start animation for index ================================================
    
    


//    ============== animation for order now ===========================


    $('#custom_carousel').on('slide.bs.carousel', function (evt) {
        $('#custom_carousel .controls li.active').removeClass('active');
        $('#custom_carousel .controls li:eq('+$(evt.relatedTarget).index()+')').addClass('active');
    })


});







