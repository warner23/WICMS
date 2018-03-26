/*jshint jquery:true */
/*global $:true */

var $ = jQuery.noConflict();
new UISearch( document.getElementById( 'sb-search' ) );
$(document).ready(function($) {

	"use strict";
		var api = jQuery('.fullwidthbanner').revolution({
			delay:9000,
			startwidth:1170,
			startheight:410,
			onHoverStop:"off",						// Stop Banner Timet at Hover on Slide on/off
			thumbWidth:20,							// Thumb With and Height and Amount (only if navigation Tyope set to thumb !)
			thumbHeight:20,
			thumbAmount:10,
			hideThumbs:10,
			navigationType:"none",				// bullet, thumb, none
			navigationArrows:"solo",				// nexttobullets, solo (old name verticalcentered), none
			navigationStyle:"round",				// round,square,navbar,round-old,square-old,navbar-old, or any from the list in the docu (choose between 50+ different item), custom
			navigationHAlign:"center",				// Vertical Align top,center,bottom
			navigationVAlign:"bottom",					// Horizontal Align left,center,right
			navigationHOffset:0,
			navigationVOffset: 0,
			soloArrowLeftHalign:"left",
			soloArrowLeftValign:"center",
			soloArrowLeftHOffset:0,
			soloArrowLeftVOffset:0,
			soloArrowRightHalign:"right",
			soloArrowRightValign:"center",
			soloArrowRightHOffset:0,
			soloArrowRightVOffset:0,
			touchenabled:"on",						// Enable Swipe Function : on/off
			stopAtSlide:-1,							// Stop Timer if Slide "x" has been Reached. If stopAfterLoops set to 0, then it stops already in the first Loop at slide X which defined. -1 means do not stop at any slide. stopAfterLoops has no sinn in this case.
			stopAfterLoops:-1,						// Stop Timer if All slides has been played "x" times. IT will stop at THe slide which is defined via stopAtSlide:x, if set to -1 slide never stop automatic
			hideCaptionAtLimit:320,					// It Defines if a caption should be shown under a Screen Resolution ( Basod on The Width of Browser)
			hideAllCaptionAtLilmit:480,				// Hide all The Captions if Width of Browser is less then this value
			hideSliderAtLimit:0,					// Hide the whole slider, and stop also functions if Width of Browser is less than this value
			fullWidth:"on",
			forceFullWidth: "on",
			lazyLoad:"on",
			shadow:0								//0 = no Shadow, 1,2,3 = 3 Different Art of Shadows -  (No Shadow in Fullwidth Version !)
		});

//



/// end 




// Accordion Toggle Items
   var iconOpen = 'fa fa-minus',
		iconClose = 'fa fa-plus';

    $(document).on('show.bs.collapse hide.bs.collapse', '.accordion', function (e) {
        var $target = $(e.target);
          $target.siblings('.accordion-heading')
          .find('i').toggleClass(iconOpen + ' ' + iconClose);
          if(e.type == 'show'){
              $target.prev('.accordion-heading').find('.accordion-toggle').addClass('active');
          }else{
              $target.prev('.accordion-heading').find('.accordion-toggle').not($target).removeClass('active');
              $target.prev('.accordion-heading').find('.accordion-toggle').not($target).removeClass('collapsed');
          };
    });

// Toggle
jQuery("ul.clav_toggle li").each(function () {
	jQuery(this).children(".clav_toggle_content").css('display', 'none');
	jQuery(this).find(".clav_toggle_head_sign").html("<i class='fa fa-plus-circle'></i>");
	
	jQuery(this).children(".clav_toggle_head").bind("click", function () {
		if (jQuery(this).parent().hasClass("active")) {
			jQuery(this).parent().removeClass("active");
		} else {
			jQuery(this).parent().addClass("active");
		}
		jQuery(this).find(".clav_toggle_head_sign").html(function () {
			if (jQuery(this).parent().parent().hasClass("active")) {
				return "<i class='fa fa-minus-circle'></i>";
			} else {
				return "<i class='fa fa-plus-circle'></i>";
			}
		});
		jQuery(this).siblings(".clav_toggle_content").slideToggle();
	});
});
jQuery("ul.clav_toggle").find(".clav_toggle_content.active").siblings(".clav_toggle_head").trigger('click');


// Tooltips
    $( 'body' ).tooltip({
		selector: "a[data-toggle=tooltip]"
	});



    
$(".carousel").owlCarousel({
	slideSpeed : 600,
	paginationSpeed: 1000, 
	autoPlay: false,
	items : 1,
	itemsDesktop : [1170,4],
	itemsDesktopSmall : [960,4],
	itemsTablet: [768,1],
	itemsMobile : [480,1],
	itemsMobileSmall: [360, 1],
	navigation:false,
	pagination:true,
	navigationText : false
});
$(".carousel2").owlCarousel({
	slideSpeed : 600,
	paginationSpeed: 2000, 
	autoPlay: false,
	items : 6,
	itemsDesktop : [1170,4],
	itemsDesktopSmall : [960,4],
	itemsTablet: [768,3],
	itemsMobile : [480,2],
	itemsMobileSmall: [360, 1],
	navigation:true,
	pagination:false,
	navigationText : false
});
$(".carousel3").owlCarousel({
	slideSpeed : 600,
	paginationSpeed: 1000, 
	autoPlay: false,
	items : 4,
	itemsDesktop : [1170,4],
	itemsDesktopSmall : [960,4],
	itemsTablet: [768,3],
	itemsMobile : [480,2],
	itemsMobileSmall: [360, 1],
	navigation:true,
	pagination:false,
	navigationText : false
});
$(".team_slides").owlCarousel({
	slideSpeed : 600,
	paginationSpeed: 1000, 
	autoPlay: false,
	items : 4,
	itemsDesktop : [1170,4],
	itemsDesktopSmall : [960,4],
	itemsTablet: [768,3],
	itemsMobile : [480,2],
	itemsMobileSmall: [360, 1],
	navigation:true,
	pagination:false,
	navigationText : false
});

$(".rblog_slides").owlCarousel({
	slideSpeed : 600,
	paginationSpeed: 1000, 
	autoPlay: false,
	items : 2,
	itemsDesktop : [1170,4],
	itemsDesktopSmall : [960,4],
	itemsTablet: [768,1],
	itemsMobile : [480,1],
	itemsMobileSmall: [360, 1],
	navigation:true,
	pagination:false,
	navigationText : false
});
$(".testi_slides").owlCarousel({
	slideSpeed : 600,
	paginationSpeed: 1000, 
	autoPlay: true,
	items : 1,
	itemsDesktop : [1170,4],
	itemsDesktopSmall : [960,4],
	itemsTablet: [768,1],
	itemsMobile : [480,1],
	itemsMobileSmall: [360, 1],
	navigation:true,
	pagination:false,
	navigationText : false
});

$(".img_blog").owlCarousel({
	slideSpeed : 800,
	paginationSpeed: 1000, 
	autoPlay: true,
	items : 1,
	itemsDesktop : [1170,1],
	itemsDesktopSmall : [960,1],
	itemsTablet: [768,1],
	itemsMobile : [480,1],
	itemsMobileSmall: [360, 1],
	navigation:false,
	pagination:true,
	navigationText : false
});
$(".portfolio_single").owlCarousel({
	slideSpeed : 600,
	paginationSpeed: 1000, 
	autoPlay: true,
	items : 1,
	itemsDesktop : [1170,1],
	itemsDesktopSmall : [960,1],
	itemsTablet: [768,1],
	itemsMobile : [480,1],
	itemsMobileSmall: [360, 1],
	navigation:false,
	pagination:true,
	navigationText : false
});
$(".related_work").owlCarousel({
	slideSpeed : 600,
	paginationSpeed: 1000, 
	autoPlay: false,
	items : 4,
	itemsDesktop : [1170,4],
	itemsDesktopSmall : [960,3],
	itemsTablet: [768,3],
	itemsMobile : [480,1],
	itemsMobileSmall: [360, 1],
	navigation:true,
	pagination:false,
	navigationText : false
});






    var detectmob = false;	
    if(navigator.userAgent.match(/Android/i) || navigator.userAgent.match(/webOS/i) || navigator.userAgent.match(/iPhone/i) || navigator.userAgent.match(/iPad/i) || navigator.userAgent.match(/iPod/i) || navigator.userAgent.match(/BlackBerry/i) || navigator.userAgent.match(/Windows Phone/i)) {
        detectmob = true;
    }
    
    if (detectmob === true) {
      $( '#parallax,#parallax_2, #parallax_3, #tp_1' ).each(function(){
			$(this).addClass('parallax-mobile');
     });
    }
    else {
        $( '#parallax' ).parallax();
        $( '#parallax_2' ).parallax();
        $( '#parallax_3' ).parallax();
        $( '#tp_1' ).parallax();
    }  



var sliderTestim = $('.bxslider');
	sliderTestim.bxSlider({
		pagerCustom: '#box-img_testimonial',
		auto: true,
		pause:3000,
		mode: 'vertical',
		controls:false,
		responsive:true,
		speed:500,
		preloadImages:"all",
		easing:"ease-in-out"
	});




$('#basicuse, #flickr').jflickrfeed({
	limit: 12,
	qstrings: {
		id: '52617155@N08' // Change this ID with Your Flickr ID
	},
	itemTemplate: '<li><a class="mfp-image" href="{{image_b}}" title="{{title}}"><i class="fa fa-search"></i><div class="hover"></div></a><img src="{{image_s}}" alt="{{title}}" /></li>'
});

$('.tweet_go').tweetable({
	html5: true,
	time: true,
	username: 'envato',
	limit: 2,
	loading:"Load tweets...",
	rotate: false,
	onComplete:function($ul){
		$('time').timeago();
	}
});
$('.tweet_menu').tweetable({
	html5: true,
	time: false,
	username: 'detikcom',
	limit: 2,
	loading:"Load tweets...",
	rotate: false,
	onComplete:function($ul){
		$('time').timeago();
	}
});




// Count Script
function count($this){
	var current = parseInt($this.html(), 10);
	current = current + 1; /* Where 50 is increment */

	$this.html(++current);
	if(current > $this.data('count')){
		$this.html($this.data('count'));
	} else {    
		setTimeout(function(){
      count($this);
    }, 50);
	}
}        

$(".stat-count").each(function() {
  $(this).data('count', parseInt($(this).html(), 10));
  $(this).html('0');
  count($(this));
});

/* Add retina images */
if (window.devicePixelRatio > 1) {
    var lowresImages = $('img');
    images.each(function(i) {
        var lowres = $(this).attr('src');
        var highres = lowres.replace(".", "@2x.");
        $(this).attr('src', highres);
    });
}


/*----------------------------------------------------*/
/*	Swipe Slider 
/*----------------------------------------------------*/

window.mySwipe = new Swipe(document.getElementById('about_slide'), {
  startSlide: 1,
  speed: 400,
  auto: 3000,
  continuous: true,
  disableScroll: true,
  stopPropagation: false,
  callback: function(index, elem) {},
  transitionEnd: function(index, elem) {}
});




/*----------------------------------------------------*/
/*	Tabs
/*----------------------------------------------------*/

var $tabsNav    = $('.tabs-nav'),
	$tabsNavLis = $tabsNav.children('li'),
	$tabContent = $('.tab-content');

$tabsNav.each(function() {
	var $this = $(this);

	$this.next().children('.tab-content').stop(true,true).hide().first().show();

	$this.children('li').first().addClass('active').stop(true,true).show();
});

$tabsNavLis.on('click', function(e) {
	var $this = $(this);

	$this.siblings().removeClass('active').end().addClass('active');

	$this.parent().next().children('.tab-content').stop(true,true).hide().siblings( $this.find('a').attr('href') ).fadeIn();

	e.preventDefault();
});



//  ==========
//  = Scroll event function =
//  ==========
var goScrolling = function(elem) {
	var docViewTop = $(window).scrollTop();
	var docViewBottom = docViewTop + $(window).height();
	var elemTop = elem.offset().top;
	var elemBottom = elemTop + elem.height();
	return ((elemBottom <= docViewBottom) && (elemTop >= docViewTop));
};
//  ==========
//  = Progress bars =
//  ==========
$('.progress_skill .bar').data('width', $(this).width()).css({
	width : 0,
	height:0
});
$(window).scroll(function() {
	$('.progress_skill .bar').each(function() {
		if (goScrolling($(this))) {
			$(this).css({
				width : $(this).attr('data-value') + '%',
				height : $(this).attr('data-height') + '%'
			});
		}
	});
});

		// Accordion
		jQuery("ul.coruscate_accordion li").each(function () {
			if (jQuery(this).index() > 0) {
				jQuery(this).children(".coruscate_acc_content").css('display', 'none');
			} else {
				if ($(".faq")[0]) {
					jQuery(this).addClass('active').find(".acc_head_icon").append("<i class='fa fa-check  '></i>");
					jQuery(this).siblings("li").find(".acc_head_icon").append("<i class='fa fa-question'></i>");
				} else {
					jQuery(this).addClass('active').find(".acc_head_icon").append("<i class='fa fa-minus'></i>");
					jQuery(this).siblings("li").find(".acc_head_icon").append("<i class='fa fa-plus'></i>");
				}
			}
			jQuery(this).children(".acc_head").bind("click", function () {
				jQuery(this).parent().addClass(function () {
					if (jQuery(this).hasClass("active")) {
						return;
					} {
						return "active";
					}
				});
				if ($(".faq")[0]) {
					jQuery(this).siblings(".coruscate_acc_content").slideDown();
					jQuery(this).parent().find(".acc_head_icon i").removeClass("fa fa-question").addClass("fa fa-check  ");
					jQuery(this).parent().siblings("li").children(".coruscate_acc_content").slideUp();
					jQuery(this).parent().siblings("li").removeClass("active");
					jQuery(this).parent().siblings("li").find(".acc_head_icon i").removeClass("fa fa-check").addClass("fa fa-question");
				} else {
					jQuery(this).siblings(".coruscate_acc_content").slideDown();
					jQuery(this).parent().find(".acc_head_icon i").removeClass("fa fa-plus").addClass("fa fa-minus");
					jQuery(this).parent().siblings("li").children(".coruscate_acc_content").slideUp();
					jQuery(this).parent().siblings("li").removeClass("active");
					jQuery(this).parent().siblings("li").find(".acc_head_icon i").removeClass("fa fa-minus").addClass("fa fa-plus");
				}
			});
		});
		


	$('#masonry').masonry({
		itemSelector: '.blog_post, .list_item'
	});

	

/*===========================================================*/
	/*	Isotope Posrtfolio
	/*===========================================================*/	
	if(jQuery.isFunction(jQuery.fn.isotope)){
		jQuery('.portfolio_list').isotope({
			itemSelector : '.list_item',
			layoutMode : 'fitRows',
			animationEngine : 'css',
			itemPositionDataEnabled: true
		});
		
		/* ---- Filtering ----- */
		jQuery('#filter li').click(function(){
			var $this = jQuery(this);
			if ( $this.hasClass('selected') ) {
				return false;
			} else {
					jQuery('#filter .selected').removeClass('selected');
					var selector = $this.attr('data-filter');
					$this.parent().next().isotope({ filter: selector });
					$this.addClass('selected');
					return false;
				}
		});	
	}
	



/*----------------------------------------------------*/
	/*	Magnific Popup
	/*----------------------------------------------------*/
	$(document).ready(function(){
		$('body').magnificPopup({ 
			type: 'image',
			delegate: 'a.mfp-gallery',
			fixedContentPos: true,
			fixedBgPos: true,
			overflowY: 'auto',
			closeBtnInside: true,
			preloader: true,
			removalDelay: 0,
			mainClass: 'mfp-fade',
			gallery:{enabled:true},
			callbacks: {
				buildControls: function() {
					console.log('inside'); this.contentContainer.append(this.arrowLeft.add(this.arrowRight));
				}
			}
		});
		
		$('.mfp-image').magnificPopup({
			type: 'image',
			closeOnContentClick: true,
			mainClass: 'mfp-fade',
			image: {
				verticalFit: true
			}
		});
		
		$('.mfp-youtube, .mfp-vimeo, .mfp-gmaps').magnificPopup({
			disableOn: 480,
			type: 'iframe',
			mainClass: 'mfp-fade',
			removalDelay: 0,
			preloader: false,
			fixedContentPos: false
		});
	});

/*===========================================================*/
/*	Contact Form
/*===========================================================*/	
(function($) {

    var blankClass = 'blank-input',
    errorClass = 'has-error',
    isValid = true;
    
    var resetField = function( $form ){
		$form.find('input,textarea').each(function(){
			if ( $(this).attr('type') != 'submit' && $(this).attr('type') != 'hidden' ){
				$(this).val('');
			}
		});
	};
	
	$.fn.resetField = function( $form ){
		resetField( $form );
	};

    var validate = function( $form ){
        $form.find('input').each(function(){
            if ($(this).attr("type") != "submit"){
                if ($(this).val() === ""){
                    $(this).addClass( errorClass +' '+ blankClass ).focus();
                    isValid = false;
                }
            }

            if ($(this).attr("data-rol") == "email"){
                if ( !isEmail( $(this).val() ) ){
                    $(this).addClass( errorClass );

                    isValid = false;
                }
            }
        });
        $form.find('textarea').each(function(){
            if ($(this).attr("type") != "submit"){
                if ($(this).val() === ""){
                    $(this).addClass( errorClass +' '+ blankClass ).focus();
                    isValid = false;
                }
            }

            if ($(this).attr("data-rol") == "email"){
                if ( !isEmail( $(this).val() ) ){
                    $(this).addClass( errorClass );

                    isValid = false;
                }
            }
        });
    };

    var isEmail = function(email) {
        var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        return regex.test(email);
    };

    $.fn.jogjaContact = function(){
        var uri = $(this).attr("action");

        this.unbind('submit').bind('submit', function(e){
            e.preventDefault();

			var data = $(this).serialize();
			var $form = $(this);
            if ( isValid ){

                $.ajax(uri, {

                    type: 'post',
                    data: data,
                    dataType: 'json',
                    success: function(data){
                        if (data.status == 200){
							
							$('.alert.alert-danger')
								.addClass('hidden');

							$('.alert.alert-success')
								.removeClass('hidden');
								
							resetField( $form );
							
                        } else{

                            data.message = (typeof data.message != 'undefined') ? data.message : 'Internal server error, please try again later';
							$('.alert.alert-danger')
								.removeClass('hidden')
								.children('.errorMessage')
								.html(data.message);

							$('.alert.alert-success')
								.addClass('hidden');

                        }
                        
                    },
                    error: function(){
						$form.find('input[type!=hidden]:first').focus();

						$('.alert.alert-success')
							.addClass('hidden');

                        var message = 'There was an error sending your message.';
						$('.alert.alert-danger')
							.removeClass('hidden')
							.children('.errorMessage')
							.html(message);

                    }

                });

            }

        });
    };

}(jQuery));

$('.jogjaContact').jogjaContact();



});

(function($) {
	"use strict";
	// Sticky Menus
	jQuery('.hed').affix({
		offset: { 
			top: $('.hed').offset().top
		}
	});

	// BUTTON UP
	var btnUp = $('<div/>', {'class':'btntoTop'});
	btnUp.appendTo('body');
	$(document).on('click', '.btntoTop', function() {
			$('html, body').animate({
				scrollTop: 0
			}, 700);
		});
		
	$(window).on('scroll', function() {
		if ($(this).scrollTop() > 200)
			$('.btntoTop').addClass('active');
		else
			$('.btntoTop').removeClass('active');
	});

	/*===========================================================*/
	/*	Preloader 
	/*===========================================================*/	
	//<![CDATA[
		$(window).load(function() { // makes sure the whole site is loaded
			$("#status").fadeOut(); // will first fade out the loading animation
			$("#preloader").delay(350).fadeOut("slow"); // will fade out the white DIV that covers the website.
		});
	//]]>



})(jQuery);