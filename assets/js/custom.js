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
	/*$(function(){	
		$("html").niceScroll();
		$('nav.mobile').niceScroll();
	});
	*/
	
	
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

	/*----------------------------------
	 * Adjustments for header, logo, and fixed sidebar
	 -----------------------------------*/
	function init_header(){ //provide scope for variables
		var $logo_wrapper = $('#sidebar .logo.wrapper'); //get logo wrapper
		var $site_header = $('#site-header'); // get site header
		$(window).on('resize ready',function(){
			var scrollbar_width = window.innerWidth-$(window).width();
			if($(this).width()>600-scrollbar_width){ //if not mobile
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
			var scrollbar_width = window.innerWidth-$(window).width();
			if($(this).width()>600-scrollbar_width){ //if not mobile
				if(windowBottom>=footerOffsetTop){
					$sidebar.css({ //fix sidebar to footer
						"position": "absolute",
						"bottom": 0,
						"left": 0,
						"height": sidebarHeight,
						"top": "inherit"
					});
				}
				if(windowBottom<footerOffsetTop){
					$sidebar.css({ //cancel out previous work
						"position": "",
						"bottom": "",
						"left": "",
						"height": "",
						"top": ""
					});
				}
			}
			else { //if mobile cancel out previous work
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
	
	/*-----------------------------------
	 * Custom mobile navigation
	 ------------------------------------*/
	//if hamburger clicked move menu into view
	$('#site-header .company-info-nav.wrapper.right-column > i.mobile.hamburger')
	.on('click',function(){
		$('#site-header .company-info-nav.wrapper.right-column > nav.mobile').animate({
			"right": 0,
		});
	});
	//if hamburger clicked on menu move back out of view
	$('#site-header .company-info-nav.wrapper.right-column > nav.mobile > i.mobile.hamburger')
	.on('click',function(){
		var $nav = $('#site-header .company-info-nav.wrapper.right-column > nav.mobile');
		$nav.animate({
			"right": 100*(-1*$nav.width()/$(window).width())-2+"%"
		});
	});
	
	
	/*
	 *
	 * Custom gallery thumbnail switcher
	 *
	 */	
	$('.gallery .thumbnail img.thumbnail-img').on('click',function(){ //on thumbnail click
		var url = $(this).attr('data-full-url'); //get url from data attribute
		$('.gallery .featured-image img').attr('src',url); //send url to featured image
	});
	
	/*--------------------------------------------
	 * Custom slider for homepage
	 ------------------------------------------*/
	function init_slider(){
		var $container = $('#home-primary .slider .das-slider');//get container for slides
		var $slides = $container.css({	//set container properties and get slides
			"position":"relative",
			"overflow":"hidden"
		}).find(".slides .slide");
		if($slides.length<1){ //if no slides don't don anything else
			return;
		}
		$slides.eq(0).css({ //set first slide to active and in view
			"position":"absolute",
			"width":"100%",
			"height":"100%",
			"top": 0,
			"left": 0,
		}).addClass("active");
		if($slides.length<2){ //if no more slides do nothing else, just show first slide
			return;
		}
		var $li = $('<li><div class="rectangle"></div></li>'); //create a li element for the custom navigation
		var $ul = $('<ul></ul>').append($li.clone()); //append one li to an ul node to hold it
		for(var i=1;i<$slides.length;i++){//for each slide after the first
			var $this = $slides.eq(i); //get slide as $this
			$this.css({					//set css properties for slide
				"position":"absolute",
				"width":"100%",
				"height":"100%",
				"top":0,
				"left": "100%",
			});
			$ul.append($li.clone());//add a button for it in the custom navigation
		}
		$('#home-primary .slider').append($('<div class="slider-nav"></div>').append($ul));//append the custom navigation to the slider
		$custom_navigation = $('#home-primary .slider .slider-nav ul li');//get the elements in the custom navigation
		$custom_navigation.eq(0).addClass("active");//change the first one to active to start
		var timeout;//timeout with outer scope for when slides need to stop moving with clear timeout
		function slide(){//recursive function to move slides
			timeout = setTimeout(function(){ //set timeout
				$custom_navigation.filter(".active").removeClass("active");//remove active from cooresponding custom nav icon
				var $active_slide = $slides.filter(".active").removeClass("active").animate({//animate the active slide out of view and remove class active
					"left":"-100%"
				},1000,function(){
					$(this).css({//move back to the right with all the other slides off screen
						"left":"100%"
					});//remove the active declaration
				});
				//if last slide move to the first, otherwise get sibling slide
				var $next_slide = $active_slide.index() !== $slides.length-1 ? $active_slide.next() : $slides.eq(0);
				$custom_navigation.eq($next_slide.index()).addClass("active"); //add active declaration to cooresponding custom nav icon
				$next_slide.addClass("active").animate({ //animate slide into view and add class active
					"left":"0"
				},1000);
				slide();//call self recursively
			},6000);
		}
		slide();
		$custom_navigation.on('click',function(){
			var index = $(this).index(); //get index of item clicked on
			clearTimeout(timeout); //clear any existing timeouts
			timeout = setTimeout(function(){ //set timeout so that the action can be cancled if repeat clicked
				if($slides.index($slides.filter('.active'))!==index) {//if not clicked on the active slide
					//this is the move guts from above
					$custom_navigation.filter(".active").removeClass("active");
					$slides.filter(".active").removeClass("active").animate({
						"left":"-100%"
					},1000,function(){
						$(this).css({
							"left":"100%"
						});
					});
					$custom_navigation.eq(index).addClass("active");
					$slides.eq(index).addClass("active").animate({
						"left":"0"
					},1000);
				}
			},1);//move immediately
		});
	}
	init_slider();//call function to init slider
	
	/*-------------------------------------------
	 * Keep videos same porportion
	 --------------------------------------------*/
	$(window).on('ready resize', function(){
		$('.video').not('.wrapper').each(function(){
			var $this = $(this);
			var height = Number($this.width())*2.7/4+"px";
			$this.css({
				"height": height,
			}).find('iframe').css({
				"height": height,
			});
		});
	});
	
	
});// END #####################################    END