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
	*	Flexslider and Isotope plugin
	*	NOTE: Images must be loaded before the plugins run
	*	the isotope plugin runs for each is-container and
	*	once all the containers are managed via isotope the
	*	containers are put into the flexslider
	*
	------------------------------------*/
	$(window).load(function(){
		$('.is-container').each(function(){//for each is-container
			$(this).isotope({//initialize isotope
				// options
				itemSelector: '.item', //.items are selector
					masonry: {
						gutter: 15
					}
			});
		}).parents('.flexslider').flexslider({
			animation: 'slide',
			slideshow: false//disable rotation
		});//end flexslider
	});//end images loaded
	
	
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

	/*
	*
	*	Wow Animation
	*
	------------------------------------*/
	new WOW().init();

});// END #####################################    END