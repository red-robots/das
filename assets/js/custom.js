/**
 *	Custom jQuery Scripts
 *	
 *	Developed by: Austin Crane	
 *	Designed by: Austin Crane
 */

jQuery(document).ready(function ($) {
	
	/*
	*
	*	Current Page Active
	*
	------------------------------------*/
	$("[href]").each(function() {
    if (this.href == window.location.href) {
        $(this).addClass("active");
        }
	});
	
	/*
	*
	*	Flexslider
	*
	------------------------------------*/
	$('.flexslider').flexslider({
		animation: 'slide',
		slideshow: false//disable rotation
	}).parents(".clear-bottom").eq(0).find(".js-f-blocks").matchHeight();
	
	/*
	 *
	 *	Isotope
	 *
	 ----------------------------------*/
	$('.is-container').each(function(){//for each is-container
		$container = $(this).imagesLoaded(function(){
			$container.isotope({//initialize isotope
				// options
				itemSelector: '.item', //.items are selector
				percentPosition: true,
				masonry: {
					gutter: 0
				}
			});//end of initialize isotope
			$container.parents(".clear-bottom").eq(0).find(".js-i-blocks").matchHeight();
		});
	});//end of each
	
	
	/*
	*
	*	Colorbox
	*
	------------------------------------*/
	$('a.gallery').colorbox({
		rel:'gal',
		width: '80%', 
		height: '80%'
	});
	
	/*
	*
	*	Smooth Scroll to Anchor
	*
	------------------------------------*/
	 $('a').click(function(){
	    $('html, body').animate({
	        scrollTop: $('[name="' + $.attr(this, 'href').substr(1) + '"]').offset().top
	    }, 500);
	    return false;
	});

	/*
	*
	*	Nice Page Scroll
	*
	------------------------------------*/
	$(function(){	
		$("html").niceScroll();
	});
	
	
	/*
	*
	*	Equal Heights Divs
	*
	------------------------------------*/
	$('.js-blocks').matchHeight();
	
	/*----------------------------------
	 * Adjustments for header, logo, and fixed sidebar
	 -----------------------------------*/
	function init_header(){ //provide scope for variables
		var $logo_wrapper = $('#sidebar .logo.wrapper'); //get logo wrapper
		var $site_header = $('#site-header'); // get site header
		var $logo = $('#logo'); //get logo
		var bottom_percent = Number($logo.css('bottom').replace(/[^\d|\.|-]/g,''))/Number($logo_wrapper.height());//determing css bottom by percentage
		$(window).on('resize ready',function(){
			if($(this).width()>500){ //if not mobile
				$logo_wrapper.css({
					"height":$site_header.css('height')//change css of logo wrapper to match site header
				});
			}
			else { //if mobile
				$logo_wrapper.css({
					"height": "" //cancel out previous work
				});
			}
		});
	}
	init_header();//call function to init header
	
	/*---------------------------------------
	 * Initialization for footer 
	 --------------------------------------*/
	function init_footer(){ //provide scope for variables
		var $footer = $('#colophon');//get footer
		var $sidebar = $('#sidebar');//get sidebar
		var $window = $(window);
		$window.on('scroll resize',function(){
			var footerOffsetTop = Number($footer.offset().top);
			var windowBottom = Number($window.scrollTop())+Number($window.height());
			var sidebarHeight = Number($sidebar.height());
			if($(this).width()>500){ //if not mobile
				if(windowBottom>=footerOffsetTop){
					$sidebar.css({
						"position": "absolute",
						"bottom": 0,
						"left": 0,
						"height": sidebarHeight,
						"top": "inherit"
					});
				}
				if(windowBottom<footerOffsetTop){
					$sidebar.css({
						"position": "",
						"bottom": "",
						"left": "",
						"height": "",
						"top": ""
					});
				}
			}
			else { //if mobile
				$sidebar.css({
					"position": "",
					"bottom": "",
					"left": "",
					"height": "",
					"top": ""
				});
			}
		});
	}
	init_footer();//call function to init footer
	
	/*
	*
	*	Wow Animation
	*
	------------------------------------*/
	new WOW().init();
	
	/*
	 *
	 * Custom gallery thumbnail switcher
	 *
	 */	
	$('.gallery .thumbnail img.thumbnail-img').on('click',function(){
		var url = $(this).attr('data-full-url');
		$('.gallery .featured-image img').attr('src',url);
	});

});// END #####################################    END