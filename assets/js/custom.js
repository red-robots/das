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
		slideshow: false,//disable rotation
		directionNav: true,
		start: function(){
			$('.flexslider').parents(".clear-bottom").eq(0).find(".js-f-blocks").matchHeight();//rectify heights of f elements after flex
		}
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
			}).parents(".clear-bottom").eq(0).find(".js-i-blocks").matchHeight();//rectify height of i elements after isotope
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
	------------------------------------
	 $('a').click(function(){
	    $('html, body').animate({
	        scrollTop: $('[name="' + $.attr(this, 'href').substr(1) + '"]').offset().top
	    }, 500);
	    return false;
	});
*/
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
		$(window).on('resize ready',function(){
			if($(this).width()>600){ //if not mobile
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
			if($(this).width()>600){ //if not mobile
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
	
	/*-------------------------------------------
	 * Initialization for process template
	 --------------------------------------------*/
	$('.process-title.wrapper li').on('click',function(){ //li on click 
		var click_step = Number($(this).attr("data-step")); //find the desired step
		$('.process-steps.wrapper span').each(function(){ //cycle through all steps only show those below or equal to desired
			var $this = $(this);
			var this_step = Number($this.attr("data-step")); 
			if(this_step<=click_step){
				$this.addClass("active");
			} else {
				$this.removeClass("active");
			}
		});
	});
	$('.graphic-steps .process-image').on('click',function(e){ //on image click
		var $this = $(this); //this as jquery
		var offset_left = $this.offset().left; //offset for image
		var width = $this.width(); //width of image
		var width_offset = 0.025*width; //factor in margin on image
		width = 0.95*width; //factor in margin on image
		var mouseX = e.pageX - offset_left - width_offset; //calculate offset for mouse click
		var click_step=0;
		if(mouseX>=0){
			if(mouseX<=width*0.25){ //if first quarter of image
				click_step=1;
			}else if (mouseX<=width*0.5){ //if second quarter of image
				click_step=2;
			}else if (mouseX<=width*0.75){ //if third quarter of image
				click_step=3;
			}else if(mouseX<=width){ //if last quarter of image
				click_step=4;
			}
			if(click_step!==0){
				//steps from above for li
				$('.process-steps.wrapper span').each(function(){
					$this = $(this);
					var this_step = Number($this.attr("data-step"));
					if(this_step<=click_step){
						$this.addClass("active");
					} else {
						$this.removeClass("active");
					}
				});
			}
		}
	});
	
	
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