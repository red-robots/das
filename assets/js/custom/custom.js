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
	});
	
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
	 * Adjustments for header and fixed sidebar
	 -----------------------------------*/
	function init_header(){
		var logo_wrapper = $('#sidebar .logo.wrapper');
		var site_header = $('#site-header');
		var logo = $('#logo');
		var bottom_percent = Number(logo.css('bottom').replace(/[^\d|\.|-]/g,''))/Number(logo_wrapper.height());
		$(window).on('resize ready',function(){
			if($(this).width()>500){
				logo_wrapper.css({
					"height":site_header.css('height')
				});
				logo.css({
					"bottom": Number(logo.width())*bottom_percent+"px"
				});
			}
			else {
				logo_wrapper.css({
					"height": ""
				});
				logo.css({
					"bottom": ""
				});
			}
		});
	}
	init_header();//call function to init header
	
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