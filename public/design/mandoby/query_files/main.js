jQuery.noConflict(),jQuery(document).ready(function(e){function t(e){var t="ease-out";switch(e){case"init":Moveit.put(first,{start:"0%",end:"14%",visibility:1}),Moveit.put(second,{start:"0%",end:"11.5%",visibility:1}),Moveit.put(middle,{start:"0%",end:"0%",visibility:1});break;case"open":Moveit.animate(first,{visibility:1,start:"78%",end:"93%",duration:.75,delay:0,timing:t}),Moveit.animate(second,{visibility:1,start:"81.5%",end:"94%",duration:.75,delay:0,timing:t}),Moveit.animate(middle,{visibility:0,start:"0",end:"0",duration:.75,delay:0,timing:t});break;case"close":Moveit.animate(middle,{visibility:1,start:"0%",end:"100%",duration:.75,delay:0,timing:t}),Moveit.animate(middle,{visibility:1,duration:.75,delay:0,timing:t}),Moveit.animate(first,{visibility:1,start:"0%",end:"14%",duration:.75,delay:0,timing:t}),Moveit.animate(second,{visibility:1,start:"0%",end:"11.5%",duration:.75,delay:0,timing:t})}}function a(t){var a=e("nav.nav-categories"),n=a.find("button.prev"),i=a.find("button.next");switch(t){case"init":a.mCustomScrollbar({axis:"x",theme:"dark",scrollEasing:"easeInOut",advanced:{autoExpandHorizontalScroll:!0,autoScrollOnFocus:!1,updateOnContentResize:!0,updateOnBrowserResize:!0}}),n.click(function(e){e.preventDefault(),a.mCustomScrollbar("scrollTo","+=200",{scrollEasing:"easeOut",scrollInertia:700})}),i.click(function(e){e.preventDefault(),a.mCustomScrollbar("scrollTo","-=200",{scrollEasing:"easeOut",scrollInertia:700})});break;case"destroy":a.mCustomScrollbar("destroy")}}function n(e){e.preventDefault()}function i(t,a){var n=e(t),i=n.find(a),s=n.find(".upload-label"),o=s.text();n.length&&i.bind("change",function(){var t=i.val().replace(/C:\\fakepath\\/i,"");if(""==t)s.text(o),n.find(".uploaded-file").length&&n.find(".uploaded-file").remove();else{if(t.length>15&&(t=t.substring(0,12)+"..."),s.text(t),n.find(".uploaded-file").length)return!1;i.parent().append('<span class="uploaded-file animated fadeInLeft"><button class="btn btn-delete-me delete-uc zm-icon zm-close"></button> </span>'),n.find(".delete-uc").on("click",function(){return $this=e(this),console.log("deleting uploaded file!"),$this.parent().removeClass("fadeIn").addClass("fadeOutLeft"),setTimeout(function(){$this.parent().remove()},500),i.val(""),s.text(o),!1})}return!1})}function s(){var t=e(".ui.checkbox.is-governmental"),a=e(".gov-fields"),n=e(".field.dynamic-numbers");t.on("click",function(){e(this).hasClass("checked")?(a.slideUp("fast"),a.find(".ui.dropdown").dropdown("restore defaults"),a.find(".delete-uc").trigger("click")):a.slideDown("fast")}),n.each(function(){function t(){i.children("li").each(function(){e(this).find("button.delete-entry").click(function(t){var a=e(this);t.preventDefault(),a.parent("li").removeClass("fadeInLeft").addClass("fadeOut").animate({marginLeft:0,width:0},300),setTimeout(function(){a.parent().remove()},300),e(".registration-steps").length&&setTimeout(function(){e(".registration-steps").trigger("refresh.owl.carousel")},300)})})}var a=e(this).find(".btn.btn-add-cn"),n=e(this).find(".input-field"),i=e(this).find("ul");a.hide(),n.keyup(function(){""==e(this).val()?a.removeClass("fadeIn").addClass("fadeOut").hide():a.removeClass("fadeOut").addClass("fadeIn").show()}),a.on("click",function(e){if(!n.val().length>0)return!1;var s=n.val().toString();n.val("").focus();var o='<li class="animated fadeInLeft"><button class="zm-icon zm-close delete-entry"></button><span>'+s+"</span></li>";i.append(o),e.preventDefault(),a.removeClass("fadeIn").addClass("fadeOut").hide(),t()}),t()})}var o,l=768,r=e(".btn-upload-pi");o=!!e("body").hasClass("home"),function(){if(o){var t=e(".header.home"),a=e(".header.home").offset().top;e(window).resize(function(){o&&(e(window).scroll(function(){e(this).scrollTop()>a?t.addClass("sticky"):t.removeClass("sticky")}),e(window).scroll())}),e(window).resize()}}(),function(){var a=e(".nav-mobile"),n=e(".mobile-nav-close"),i=e(".mobile-nav-open");i.length&&(t("init"),i.on("click",function(){if(e(this).hasClass("is-active"))return!1;e(this).addClass("is-active"),e("body").addClass("unscroll"),a.addClass("reveal"),setTimeout(function(){n.addClass("reveal"),t("open")},200),n.on("click",function(){t("close"),i.removeClass("is-active"),a.find("ul").addClass("animated fadeOut"),setTimeout(function(){a.removeClass("reveal").addClass("conceal"),setTimeout(function(){e("body").removeClass("unscroll"),a.removeClass("conceal").find("ul").removeClass("animated fadeOut"),t("init")},750)},250)})}),e(window).resize(function(t){if(!(e(window).outerWidth()>=l&&e("body").hasClass("unscroll")))return!1;n.trigger("click")}).resize())}(),function(){function t(){if(!n.hasClass("active"))return!1;var t=e("header.header"),a=t.height(),s=i.height();i.fadeOut(50),t.animate({height:a-s},200),setTimeout(function(){e("header.header").removeAttr("style"),initCustomScroll("destroy")},500),n.removeClass("active")}var n=e(".nav-desktop .categories"),i=e("nav.nav-categories");i.find("button.prev"),i.find("button.next");a("init"),n.on("click",function(t){if(e(this).hasClass("active"))return!1;e(this).addClass("active").siblings().removeClass("active");var n=e("header.header"),s=n.height(),o=i.addClass("reveal").height();i.removeClass("reveal"),n.animate({height:s+o},200,function(){i.fadeIn(500)}),a("destroy"),setTimeout(function(){a("init")},230),t.preventDefault()}),i.length&&i.find("ul > li").each(function(){$this=e(this),e(this).children("ul").length&&$this.addClass("has-sub")}),e(document).mouseup(function(e){i.is(e.target)||0!==i.has(e.target).length||n.is(e.target)||0!==n.has(e.target).length||t()}),e(window).resize(function(){t()}).resize()}(),function(){var t=e(".frm-newsletter");t.find("button").on("click",function(e){if(t.hasClass("registered"))return!1;t.find("input[type=email]").val()&&(t.prepend('<div class="loading-scene animated fadeIn"><span></span><span></span><span></span></div>'),setTimeout(function(){t.find(".loading-scene").remove()},1800),setTimeout(function(){t.find(".reg-confirmation").addClass("show"),setTimeout(function(){t.find(".reg-confirmation").find("#successAnimation").addClass("animated")},300)},1800),t.addClass("registered")),e.preventDefault()})}(),function(){var t=e(".ar-entry");if(t.length){var a=e(".companies-list");t.each(function(){e(this).find(".ar-check").on("click",function(t){e(this).hasClass("checked")||(e("html,body").animate({scrollTop:a.offset().top-50},350),setTimeout(function(){a.trigger("add.owl.carousel",['<div class="entry animated fadeInRight"> <span><img src="assets/imgs/tempo/compnies/01.jpg" alt="Company" /> </span><h1>Ø´Ø±ÙƒÙ‡ Ø¯Ø§Ù…Ø§Ùƒ Ø§Ù„Ø¹Ù‚Ø§Ø±ÙŠÙ‡</h1> <button class="btn btn-remove"></button> </div>',0]).trigger("refresh.owl.carousel")},500))})})}}(),function(){if(r.length){var t=e(".frm-user-edit input[type=file]"),a=e(".frm-user-edit .slim img.in");r.click(function(){return t.val()||0!=a.css("opacity")||t.click(),!1})}}(),function(){var t=e("form.frm-user-edit");t.find("input").each(function(){e(this).val(),e(this).on("change",function(){t.find("button[type=submit]").prop("disabled",!1)})})}(),function(){var t,a=e(".company-about article"),n=a.height(),i=e(".btn-read-more");i.on("click",function(e){a.hasClass("full")?(a.removeClass("full"),i.text("Ù‚Ø±Ø§Ø¡Ø© Ø§Ù„Ù…Ø²ÙŠØ¯").removeClass("active"),a.height(t).animate({height:n},200)):(a.css({height:"auto"}),t=a.height(),a.addClass("full"),i.text("Ø§Ø®ÙØ§Ø¡").addClass("active"),a.height(n).animate({height:t},200))})}(),e("[data-fancybox]").length&&e("[data-fancybox]").fancybox({animationEffect:"zoom-in-out",slideClass:"slide-entry",baseClass:"bena"}),function(){var t=e(".uploader.offer-attachments"),a=e(".uploader.product-attachments"),i=e(".uploader.project-attachments");t.length&&t.find("input.uploader-file").uploaderGallery({title:"Ø¹Ø¯Ø¯ Ø§Ù„ØµÙˆØ± Ø§Ù„Ù…Ø³Ù…ÙˆØ­ Ø¨Ù‡ : 4 ØµÙˆØ±",classes:"bena-uploader",showbtn:!0,btnClasses:"btn-upload-attachments",btnTitle:"Ø§Ø¶ØºØ· Ù‡Ù†Ø§ Ù„Ù„Ø¥Ø¶Ø§ÙØ©",thumbClasses:"",thumbDeleteIcon:"",thumbDeleteBtnClass:"",thumbImgClasses:"",thumbPrevHtml:"",thumbNextHtml:"",mimetypes:"image/png|image/jpeg",ajaxSubmit:n}),a.length&&a.find("input.uploader-file").uploaderGallery({title:"Ø¹Ø¯Ø¯ Ø§Ù„ØµÙˆØ± Ø§Ù„Ù…Ø³Ù…ÙˆØ­ Ø¨Ù‡ : 4 ØµÙˆØ±",classes:"bena-uploader",showbtn:!0,btnClasses:"btn-upload-attachments",btnTitle:"Ø§Ø±ÙÙ‚ ØµÙˆØ±Ø©",thumbClasses:"",thumbDeleteIcon:"",thumbDeleteBtnClass:"",thumbImgClasses:"",thumbPrevHtml:"",thumbNextHtml:"",mimetypes:"image/png|image/jpeg",ajaxSubmit:n}),i.length&&i.find("input.uploader-file").uploaderGallery({title:"Ø¹Ø¯Ø¯ Ø§Ù„ØµÙˆØ± Ø§Ù„Ù…Ø³Ù…ÙˆØ­ Ø¨Ù‡ : 4 ØµÙˆØ±",classes:"bena-uploader",showbtn:!0,btnClasses:"btn-upload-attachments",btnTitle:"Ø§Ø±ÙÙ‚ ØµÙˆØ±Ø©",thumbClasses:"",thumbDeleteIcon:"",thumbDeleteBtnClass:"",thumbImgClasses:"",thumbPrevHtml:"",thumbNextHtml:"",mimetypes:"image/png|image/jpeg",ajaxSubmit:n})}(),function(){var t=e(".companies-to .btn-close");t.length&&t.each(function(){e(this).on("click",function(t){var a=e(this);a.parents("li").addClass("animated fadeOut"),setTimeout(function(){a.parents("li").remove()},350),t.preventDefault()})})}(),function(){var t=e(".add-to-fav");e(".section.share");t.length&&t.click(function(){$this=e(this),$this.prepend('<i class="ui tiny loader"></i>').addClass("progress"),setTimeout(function(){$this.removeClass("progress").find("i").remove(),$this.hasClass("faved")?$this.removeClass("faved"):$this.addClass("faved")},700)})}(),i("form.frm-register .field.certificate","#certificate-uploader"),i("form.frm-register .field.logo","#company-logo"),s(),function(){var t=e(".entry-tags").find("a.more");t.length&&t.each(function(){var t=e(this);t.on("click",function(a){a.preventDefault(),t.hasClass("visible")?(t.parent().find("a.hidden").each(function(){e(this).fadeOut(600).removeAttr("style")}),t.removeClass("visible")):(t.parent().find("a.hidden").each(function(){e(this).fadeIn(600).css({display:"flex"})}),t.addClass("visible"))})})}(),e(".formatted-input").length&&(e(".formatted-input.visa").payment("formatCardNumber"),e(".formatted-input.cvc").payment("formatCardCVC"));var s=e(".reg-types .btn-reg-type"),d=e(".ui.accordion.company-reg"),c=e(".ui.calendar.offer-date"),u=e(".ui.calendar.featured-from"),m=e(".ui.calendar.featured-to"),f=e(".frm-ar-filter .ui.floating.dropdown"),p=e(".ui.rating.company-rate"),h=e(".trig-req-modal"),g=e(".profile-tabs-heads"),v=e(".payment-gates"),b=e(".upgrade-account"),y=e(".add-branch"),C=e(".btn.new-product"),w=e(".btn.new-project"),k=e(".nav-filter > a"),S=e(".ar-entry-more.offer-detail"),z=e(".terms-trigger"),x=e(".trig-confirm"),T=e(".ui.dropdown.country-name"),D=e(".ui.dropdown.country-code"),O=e(".edit-btns .zm-trash");offerDateOptions={className:{calendar:"popup-calendar"},formatter:{date:function(e,t){if(!e)return"";var a=e.getDate(),n=e.getMonth()+1;return e.getFullYear()+"/"+n+"/"+a}},type:"date",firstDayOfWeek:6,text:{days:["Ø£","Ø§Ø«","Ø«","Ø£Ø±","Ø®","Ø¬","Ø³"],months:["ÙŠÙ†Ø§ÙŠØ±","ÙØ¨Ø±Ø§ÙŠØ±","Ù…Ø§Ø±Ø³","Ø§Ø¨Ø±ÙŠÙ„","Ù…Ø§ÙŠÙˆ","ÙŠÙˆÙ†ÙŠÙˆ","ÙŠÙˆÙ„ÙŠÙˆ","Ø§ØºØ³Ø·Ø³","Ø³Ø¨ØªÙ…Ø¨Ø±","Ø§ÙƒØªÙˆØ¨Ø±","Ù†ÙˆÙÙ…Ø¨Ø±","Ø¯ÙŠØ³Ù…Ø¨Ø±"],monthsShort:["Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec"],today:"Ø§Ù„ÙŠÙˆÙ…",now:"Ø§Ù„Ø¢Ù†",am:"Øµ",pm:"Ù…"}},subStartOption={endCalendar:m},subEndOption={startCalendar:u},e(".ui.dropdown").dropdown(),e(".ui.dropdown.multiple").dropdown({useLabels:!1,maxSelections:10,message:{count:"ØªÙ… Ø§Ø®ØªÙŠØ§Ø±: <b>{count}</b> Ù…Ù† Ø§Ù„Ù…Ø¬Ø§Ù„Ø§Øª"}}),e(".ui.checkbox").checkbox(),e(".ui.checkbox.ar-check.uncheckable").checkbox({uncheckable:!1}),e(".ui.rating").rating(),p.length&&p.rating("disable"),s.length&&s.tab(),d.length&&(d.accordion({onOpen:function(){if(!e(this).hasClass("second"))return!1;google.maps.event.trigger(map,"resize")}}),e(".reg-step-edit").click(function(e){e.preventDefault()})),c.length&&c.calendar(offerDateOptions),f.length&&f.dropdown({message:{noResults:"Ù„Ø§ ØªÙˆØ¬Ø¯ Ø§ÙŠ Ù†ØªØ§Ø¦Ø¬"}}),h.on("click",function(){e("#offer-req").modal("setting",{detachable:!1,transition:"scale"}).modal("show refresh")}),x.on("click",function(t){e(".modal-confirm").modal("setting",{transition:"scale"}).modal("show refresh"),t.preventDefault()}),e(".modal-confirm").find("button.modal-close").on("click",function(){e(".modal-confirm").modal("hide")}),b.on("click",function(){e("#upgrade-account").modal("setting",{transition:"scale",autofocus:!1,onVisible:function(){u.calendar(e.extend(offerDateOptions,subStartOption)),m.calendar(e.extend(offerDateOptions,subEndOption))}}).modal("show refresh")}),y.on("click",function(){e("#new-branch").modal("setting",{transition:"scale",observeChanges:!0,autofocus:!1,onVisible:function(){function t(){s.children("li").each(function(){e(this).find("button.delete-entry").click(function(t){var a=e(this);t.preventDefault(),a.parent("li").removeClass("fadeInLeft").addClass("fadeOut").animate({marginLeft:0,width:0},300),setTimeout(function(){a.parent().remove()},300),e("#new-branch").modal("refresh")})})}var a=e(this).find(".field.contact-numbers"),n=a.find("input"),i=a.find("button.btn-add-cn"),s=a.find("ul");google.maps.event.trigger(map,"resize"),i.on("click",function(a){if(e("#new-branch").modal("refresh"),!n.val().length>0)return!1;var i=n.val().toString();n.val("").focus();var o='<li class="animated fadeInLeft"><button class="zm-icon zm-close delete-entry"></button><span>'+i+"</span></li>";s.append(o),a.preventDefault(),t()}),t()}}).modal("show refresh")}),C.on("click",function(){e("#new-product").modal("setting",{transition:"scale",autofocus:!1}).modal("show refresh")}),w.on("click",function(){e("#new-project").modal("setting",{transition:"scale",autofocus:!1}).modal("show refresh")}),S.on("click",function(t){e("#offer-detail").modal("setting",{transition:"scale"}).modal("show refresh"),t.preventDefault()}),k.on("click",function(){e("#mobile-filter").modal("setting",{transition:"scale",autofocus:!1}).modal("show refresh")}),g.length&&g.find("button").tab(),v.length&&v.find("button").tab({onVisible:function(){e(this).closest("form").find("input").each(function(){e(this).val("")}),e(this).closest("form").find(".ui.dropdown").each(function(){e(this).dropdown("restore defaults")})}}),z.on("click",function(t){var a=e(".terms-container");e("#terms-conditions").modal("setting",{transition:"scale",onShow:function(){a.mCustomScrollbar({axis:"y",theme:"dark",scrollEasing:"easeInOut"})},onVisible:function(){e("#terms-conditions").modal("refresh")},onHidden:function(){a.mCustomScrollbar("destroy")}}).modal("show refresh"),t.preventDefault()}),O.on("click",function(t){e(".confirm-modal").modal("setting",{transition:"scale",approve:".approve",deny:".cancel"}).modal("show refresh"),t.preventDefault()}),T.length&&T.dropdown({onChange:function(){var t=e(this).dropdown("get value");D.dropdown("set selected",t)}});var I=e(".slider-main"),P=e(".slider-banner"),E=e(".categories-portals"),H=e(".company-branches-slider"),j=e(".company-projects-slider"),M=e(".company-products-slider"),$=e(".companies-list");!function(){if(I.length&&I.owlCarousel({rtl:!0,autoplay:!0,autoplayTimeout:5e3,autoplaySpeed:900,autoplayHoverPause:!0,loop:!0,items:1,navSpeed:900,dragSpeed:900,dragEndSpeed:900,nav:!0,navText:["<i class='zm-icon zm-caret-right'></i>","<i class='zm-icon zm-caret-left'></i>"]}),P.length&&P.owlCarousel({rtl:!0,autoplay:!0,animateIn:"fadeInDown",animateOut:"fadeOutUp",autoplayTimeout:5500,autoplayHoverPause:!0,loop:!0,items:1,autoplaySpeed:1500,dotsSpeed:1500,dragSpeed:1500,dragEndSpeed:1500,nav:!1,dots:!0}),E.length){var t=e(".cats-filter li a");E.owlCarousel({rtl:!0,autoplay:!0,autoplaySpeed:1600,autoplayTimeout:6e3,autoplayHoverPause:!0,loop:!0,center:!0,margin:30,navSpeed:1200,dragSpeed:1200,dragEndSpeed:1200,nav:!0,responsive:{320:{items:1,stagePadding:20},420:{items:1,stagePadding:20},640:{items:3,stagePadding:20},1250:{items:3,stagePadding:20},1251:{items:5,stagePadding:-40}},navText:["<i class='zm-icon zm-caret-right'></i>","<i class='zm-icon zm-caret-left'></i>"],onInitialized:function(e){var t=e.item.index,a=E.find(".owl-item");a.eq(t-1).addClass("centered"),a.eq(t+1).addClass("centered")}}).on("translate.owl.carousel",function(e){var t=e.item.index,a=E.find(".owl-item");a.removeClass("centered"),a.eq(t-1).addClass("centered"),a.eq(t+1).addClass("centered")}),t.on("click",function(){var t=e(this);if(t.parent().hasClass("active")||E.hasClass("loading-content"))return null;t.parent().addClass("active").siblings().removeClass("active").parents(".tf--holder").prepend('<div class="loading-scene animated fadeIn"><span></span><span></span><span></span></div>'),E.addClass("loading-content"),setTimeout(function(){t.parents(".tf--holder").find(".loading-scene").remove(),E.removeClass("loading-content")},1500)})}H.length&&H.owlCarousel({rtl:!0,autoplay:!0,autoplaySpeed:1600,autoplayTimeout:6e3,autoplayHoverPause:!0,margin:20,navSpeed:800,dragSpeed:800,dragEndSpeed:800,nav:!0,dots:!1,responsive:{320:{items:1,margin:0,stagePadding:0},420:{items:1,margin:0,stagePadding:0},767:{items:2,margin:20,stagePadding:5},1024:{items:3,stagePadding:0},1024:{items:3}},navText:["<i class='zm-icon zm-caret-right'></i>","<i class='zm-icon zm-caret-left'></i>"]}),j.length&&j.owlCarousel({rtl:!0,autoplay:!0,autoplaySpeed:1600,autoplayTimeout:6e3,autoplayHoverPause:!0,loop:!0,slideBy:3,margin:25,navSpeed:1200,dragSpeed:1200,dragEndSpeed:1200,nav:!0,dots:!1,responsive:{320:{items:1,stagePadding:0,margin:0},420:{items:1,stagePadding:0,margin:0},767:{items:2,stagePadding:20,margin:14},1024:{items:3,stagePadding:60},1024:{items:3}},navText:["<i class='zm-icon zm-caret-right'></i>","<i class='zm-icon zm-caret-left'></i>"]}),M.length&&M.owlCarousel({rtl:!0,autoplay:!0,autoplaySpeed:1800,autoplayTimeout:8e3,autoplayHoverPause:!0,loop:!0,slideBy:3,margin:25,navSpeed:1200,dragSpeed:1200,dragEndSpeed:1200,nav:!0,dots:!1,responsive:{320:{items:1,stagePadding:0,margin:0},420:{items:1,stagePadding:0,margin:0},767:{items:2,stagePadding:20,margin:14},1024:{items:3,stagePadding:60},1024:{items:3}},navText:["<i class='zm-icon zm-caret-right'></i>","<i class='zm-icon zm-caret-left'></i>"]}),$.length&&($.owlCarousel({rtl:!0,loop:!1,autoWidth:!0,items:4,margin:10,navSpeed:600,dragSpeed:600,dragEndSpeed:600,nav:!0,navText:["<i class='zm-icon zm-caret-right'></i>","<i class='zm-icon zm-caret-left'></i>"]}),$.on("click",".owl-item",function(t){var a=$.data("owl.carousel"),n=e(t.target),i=e(this);n.is("button")&&$.trigger("remove.owl.carousel",a.relative(i.index())).trigger("refresh.owl.carousel"),t.preventDefault()}))}()});