/*** global vars init ***/
var $headerHeight,
$isMobile,
$isDesktop,
$mapType,
$mapStyle,
wall;

/*** Windows event ***/
$(window).on("resize",function(e){

	/* Ipad Modernizr Test */
	Modernizr.addTest('ipad', function () {
		return !!navigator.userAgent.match(/iPad/i);
	});

	/* Main Menu */
	if (!Modernizr.ipad) {  
		initializeMainMenu(); 
	}
	$('.sub-menu').hide();
});

$(window).on("load resize",function(e){
	/* mobile detection */
	if(Modernizr.mq('only all and (max-width: 767px)') ) {
		$isMobile = true;
	}else{
		$isMobile = false;
	}
	/* tablette and mobile detection */
	if(Modernizr.mq('only all and (max-width: 1024px)') ) {
		$isDesktop = false;
	}else{
		$isDesktop = true;
	}

	if ($isDesktop === true && $('.parallax').length){
		setTimeout(function(){
			$.stellar('refresh');
		}, 300);
	}


	/*
	|--------------------------------------------------------------------------
	| PARALLAX
	|--------------------------------------------------------------------------
	*/		 

	if ($isDesktop === true && $('.parallax').length )
	{
		$(window).stellar({
			horizontalScrolling: false,
			responsive:true,
			scrollProperty: 'scroll',
			positionProperty: 'transform',
			parallaxBackgrounds:true,
			parallaxElements:false
		});
	}

	toTop($isMobile);

	/*
	|--------------------------------------------------------------------------
	| Rolls over vertical centering 
	|--------------------------------------------------------------------------
	*/
	if($('.img-hover').length){
		$(".img-hover .mask-over").each(function(index, val) {
			var captionHeight = $(this).outerHeight(true),
			captionPadding = (captionHeight - $(this).children().outerHeight(true))/2;
			$(this).css({'padding-top':captionPadding});

		});
	}
	

});
/*** End Windows event ***/



(function($) {
	"use strict";

	/* var asign */
	$headerHeight = ($('.menu-header.navbar-fixed-top').length)?$('.menu-header.navbar-fixed-top').outerHeight():0;

	/*
	|--------------------------------------------------------------------------
	| TIPS
	|--------------------------------------------------------------------------
	*/
	if($('.tips').length)
	$('.tips').tooltip({placement:'auto'});
	

	/*
	|--------------------------------------------------------------------------
	| OWL CAROUSEL
	|--------------------------------------------------------------------------
	*/

	if($('.neko-data-owl').length){

		$( '.neko-data-owl' ).each(function( index ) {
			var $this =$(this);
			$this.owlCarousel(
			{
				items:$this.data('neko_items'),
				navigation:$this.data('neko_navigation'),
				singleItem:$this.data('neko_singleitem'),
				autoPlay:$this.data('neko_autoplay'),
				itemsScaleUp:$this.data('neko_itemsscaleup'),
				navigationText:['<i class="icon-owl-navigation-left"></i>','<i class="icon-owl-navigation-right"></i>'], 
				pagination:$this.data('neko_pagination'),
				paginationNumbers:$this.data('neko_paginationnumbers'),
				autoHeight:$this.data('neko_autoheight'),
				mouseDrag:$this.data('neko_mousedrag'),
				transitionStyle:$this.data('neko_transitionstyle'),
				responsive:true,
				lazyLoad : true,
				addClassActive:true,
				afterInit: function(){

					$('.active .caption-content-position', this.owl.baseElemen).children().each(function(index, val) {
						$(this).addClass('animated '+$(this).data('neko_animation'));
					});
				},
				beforeMove:  function(){
					$('.caption-content-position').children().each(function(index, val) {
						$(this).removeClass('animated '+$(this).data('neko_animation'));
					});
				},
				afterMove:  function(){
					$('.active .caption-content-position', this.owl.baseElemen).children().each(function(index, val) {
						$(this).addClass('animated '+$(this).data('neko_animation'));
					});
				}
			});

});

}

	/*
	|--------------------------------------------------------------------------
	| Main menu
	|--------------------------------------------------------------------------
	*/
	initializeMainMenu();

	if($('.navbar-fixed-top').length && $('#pre-header').length){
		var $window = $(window);
		/* initial state detection */
		if($window.scrollTop() >= $('#pre-header').height()){
			$('#pre-header').hide();
		}

		/* on scroll detection */
		$window.scroll(function(){
			if($window.scrollTop() >= $('#pre-header').outerHeight(true)){
				$('body:not(.header-1):not(.header-2) #pre-header').stop(true, false).slideUp(50).end();
				$('.menu-header').addClass('scroll-header');
			}else{
				$('body:not(.header-1):not(.header-2) #pre-header').slideDown(150).end();
				$('.menu-header').removeClass('scroll-header');
			} 	
		});
	}


	/*
	|--------------------------------------------------------------------------
	| Img Hover
	|--------------------------------------------------------------------------
	*/
	if($('.img-hover').length && !Modernizr.csstransitions && !Modernizr.touch){
		$('.img-hover figure').addClass('noCss3');
		$('.img-hover figure').hover(
			function() {
				var captionHeight = $('.mask-over', this).outerHeight(true);
				$('.mask-over', this).stop(true, false).animate({
					opacity:1,
					bottom: captionHeight,
				}, 300, 'easeOutQuad',function() {}).end();
			}, function() {
				$('.mask-over', this).stop(true, false).animate({
					opacity:0,
					bottom: 0
				}, 300, 'easeOutQuad',function() {}).end();				
			});
	}

	/*
	|--------------------------------------------------------------------------
	| Counter trigger
	|--------------------------------------------------------------------------
	*/
	if($('.counter').length && $().appear){
		$('.counter').each( function(index, val) {
			var $this = $(this);
			if($(window).width() > 1024) {
				$this.html(0);
				$this.appear(function() {
					increment($this);
				}, {accX: 0, accY: 0});
			}
		});

	}

	/*
	|--------------------------------------------------------------------------
	| APPEAR
	|--------------------------------------------------------------------------
	*/
	if($('.activate-appear-animation').length){
		nekoAnimAppear();
		$('.reloadAnim').click(function (e) {
			$(this).parent().parent().find('img[data-nekoanim]').attr('class', '').addClass('img-responsive');
			nekoAnimAppear();
			e.preventDefault();
		});
	}

	/*
	|--------------------------------------------------------------------------
	| BACKGROUND VIDEO
	|--------------------------------------------------------------------------
	*/
	if($('#video-bg').length){
		$('#video-bg').mb_YTPlayer();
	}

    /*
    |--------------------------------------------------------------------------
    | FULLSCREEN IMAGE & CONTENT
    |--------------------------------------------------------------------------
    */
    if($(".fullscreen").length){
    	fullscreen($(".fullscreen"));
    }

    if($(".real-fullscreen").length){
    	fullscreen($(".real-fullscreen"), true);
    }


	/*
	|--------------------------------------------------------------------------
	| SUPERSLIDES
	|--------------------------------------------------------------------------
	*/	
	
	if($('.superslides').length){
		var $slides = $('.superslides');
		Hammer($slides[0]).on("swipeleft", function(e) {
			$slides.data('superslides').animate('next');
		});
		Hammer($slides[0]).on("swiperight", function(e) {
			$slides.data('superslides').animate('prev');
		});
		$slides.superslides({
			hashchange: false,
			play: 6000,
			inherit_width_from: '#slider-wrapper',
			inherit_height_from: '#slider-wrapper'
		});		
	}

	/*
	|--------------------------------------------------------------------------
	| Smooth scrolling
	|--------------------------------------------------------------------------
	*/	

	// $.srSmoothscroll({
	// 	step:150,
	// 	speed:600,
	// 	ease: 'linear'
	// });

	/*
	|--------------------------------------------------------------------------
	| Gmap trigger
	|--------------------------------------------------------------------------
	*/	
	appendGmapApi();

	

    /*
    |--------------------------------------------------------------------------
    | MAGNIFIC POPUP
    |--------------------------------------------------------------------------
    */


    if( $("a.image-link").length){
    	$("a.image-link").click(function (e) {
    		var items = [];
    		items.push( { src: $(this).attr('href')  } );
    		if($(this).data('gallery')){
    			var $arraySrc = $(this).data('gallery').split(',');
    			$.each( $arraySrc, function( i, v ){
    				items.push( {
    					src: v 
    				});
    			});     
    		}

    		
    		$.magnificPopup.open({
    			type:'image',
    			mainClass: 'mfp-fade',
    			items:items,
    			gallery: {
    				enabled: true 
    			}
    		});

    		e.preventDefault();
    	});

    }



    if( $("a.image-iframe").length){
    	$('a.image-iframe').magnificPopup({type:'iframe',mainClass: 'mfp-fade'});
    }

    if( $(".simple-gallery-link").length){
    	$('.simple-gallery-link').magnificPopup({
    		type: 'image',
    		gallery:{
    			enabled:true
    		}
    	});
    }


    /*
    |--------------------------------------------------------------------------
    | ANCHOR LINKS
    |--------------------------------------------------------------------------
    */
	$('.anchor-link').bind('click', function(event) {
		var $anchor = $(this);

		if($('#pre-header').length){
			var headerH = $('.navbar-fixed-top').outerHeight(true) - $('#pre-header').outerHeight(true) - 1;
		}else{
			var headerH = $('.navbar-fixed-top').outerHeight(true) - 1;
		}
		

		$('html, body').stop().animate({
			scrollTop : $($anchor.attr('href')).offset().top - headerH + "px"
		}, 1200, 'easeInOutExpo');

		event.preventDefault();
	});
    



	/*
	|--------------------------------------------------------------------------
	| FREE WALL
	|--------------------------------------------------------------------------
	*/		

	if($("#freewall").length){
		wall = new freewall("#freewall");
		wall.reset({
			selector: '.brick',
			animate: true,
			cellW: 180,
			cellH: 'auto',
			gutterX:0,
			gutterY:0,
			onResize: function() {
				wall.fitWidth();
			}
		});

		$(".filter-label").click(function() {
			$(".filter-label").removeClass("active");
			var filter = $(this).addClass('active').data('filter');
			if (filter) {
				wall.filter(filter);
			} else {
				wall.unFilter();
			}

			if ($isDesktop === true && $('.parallax').length){
				setTimeout(function(){
					$.stellar('refresh');
				}, 300);
			}

		});
	

	}



}) (jQuery); //END DOC READY



$( window ).load(function() {


	/*
	|--------------------------------------------------------------------------
	| Isotope masonery
	|--------------------------------------------------------------------------
	*/
	if($('.isotope-filter').length){

		$('.isotope-wrapper').animate({opacity: 1},300, 'easeInOutQuad');

		var isotopeLayout = 'fitRows';

		if($('.isotope-filter').length){
			var $container = $('.isotope-filter').isotope({
				itemSelector: '.isotope-filter article',
				layoutMode: isotopeLayout
			});

		}


		$('#filters').on( 'click', 'button, a', function(e) {
			e.preventDefault();
			var filterValue = $( this ).attr('data-filter');
			$container.isotope({ filter: filterValue }).isotope('arrange');
		});

		$('#filters').on( 'click', 'button, a', function(e) {
			e.preventDefault();
			$('#filters button, #filters a').removeClass('active');
			$( this ).addClass('active');

			if ($isDesktop === true && $('.parallax').length){
				setTimeout(function(){
					$.stellar('refresh');
				}, 300);
			}

		});
		
	}


	/*
	|--------------------------------------------------------------------------
	| FREE WALL
	|--------------------------------------------------------------------------
	*/		

	if($("#freewall").length){
		wall.fitWidth();
		$('.free-wall').animate({opacity: 1},800, function() {});
	}


	/*
	|--------------------------------------------------------------------------
	| SWIPER TABS
	|--------------------------------------------------------------------------
	*/	
	if($('.swiper-tab .swiper-engine').length){

		$('.swiper-tab').animate({ opacity: 1}, 300, 'easeInOutQuad');

		var tabsSwiper = new Swiper('.swiper-tab .swiper-engine',{
			speed:300,
			onSlideChangeStart: function(){
				$(".tabs .btn.active").removeClass('active')
				$(".tabs .btn").eq(tabsSwiper.activeIndex).addClass('active')  
			}
		});

		$(".tabs .btn").on('touchstart mousedown',function(e){
			e.preventDefault();
			tabsSwiper.swipeTo( $(this).index() );
		});

		$(".tabs .btn").click(function(e){
			e.preventDefault();
		});

		if($('.swiper-tab  .swiper-engine').hasClass('fullscreen')){
			$('.swiper-tab .swiper-engine, .swiper-tab .swiper-engine .swiper-slide').height($(window).height()-($headerHeight+$(".tabs").height()));
		}
	}

	if($('#preloader:not(.preloader-btn-start)').length)
	$('#preloader').fadeOut('fast');



}); //END WINDOW LOAD

function fullscreen($obj, $realfs){
	var $body_offset = 0.
	if($realfs == undefined){
		var $body_offset = parseInt($('body').css('padding-top'));
	}
	

	$obj.css({height:$(window).height() - $body_offset });
	$obj.css({width:$(window).width()});

	$(window).on('resize', function () {
		$obj.css({height:$(window).height() - $body_offset});
		$obj.css({width:$(window).width()});
	});
}


/* MAIN MENU (submenu slide and setting up of a select box on small screen)*/

function initializeMainMenu() {

	"use strict";
	var $mainMenu = jQuery('.menu-header .navbar-collapse').children('ul');


	if(Modernizr.mq('only all and (max-width: 1024px)') ) {


		var addActiveClass = false;

		jQuery("li a.has-sub-menu").unbind('click');
		$('li',$mainMenu).unbind('mouseenter mouseleave');


		$("a.has-sub-menu").on("click", function(e) {

			var $this = jQuery(this);	
			e.preventDefault();



			addActiveClass = $this.parent("li").hasClass("Nactive");

			$this.parent("li").removeClass("Nactive");
			$this.next('.sub-menu').slideUp('fast');


			if(!addActiveClass) {
				$this.parents("li").addClass("Nactive");
				$this.next('.sub-menu').slideDown('fast');
			}else{
				$this.parent().parent('li').addClass("Nactive");
			}

			return;
		});


	}else{


		jQuery("li", $mainMenu).removeClass("Nactive");
		jQuery('li a', $mainMenu).unbind('click');


		$('li',$mainMenu).hover(

			function() {

				var $this = jQuery(this),
				$subMenu = $this.children('.sub-menu');


				if( $subMenu.length ){
					$this.addClass('hover').stop();
				}else {
					if($this.parent().is(jQuery(':gt(1)', $mainMenu))){
						$this.stop(false, true).fadeIn('slow');
					}
				}
				if($this.parent().is(jQuery(':gt(1)', $mainMenu))){
					$subMenu.stop(true, true).fadeIn(200,'easeInOutQuad'); 
					$subMenu.css('left', $subMenu.parent().outerWidth(true));
				}else{
					$subMenu.css('top', $headerHeight - $mainMenu.css('padding-top')); 
					$subMenu.stop(true, true).delay( 300 ).fadeIn(200,'easeInOutQuad'); 

				}

			}, function() {

				var $this = jQuery(this),
				$subMenu = $this.children('ul, div');

				if($this.parent().is(jQuery(':gt(1)', $mainMenu))){
					$this.children('ul').hide();
					//$this.children('ul').css('left', 130);

				}else{
					$this.removeClass('hover');
					$subMenu.stop(true, true).delay( 300 ).fadeOut();
				}
				if( $subMenu.length ){$this.removeClass('hover');}
			});

}
}


/* Counter Increment */
function increment(obj){
	$({increment: 0}).animate({increment: obj.data('counterend')}, {
		duration: (obj.data('counterduration'))?obj.data('counterduration'):3000,
		easing:'swing',
		step: function() {
			if(obj.data('countertype') === 'float'){
				obj.html(Math.abs(this.increment).toFixed(1));
			}else{
				obj.html(Math.ceil(this.increment));	
			}
			
		}
	});
}


/* Appear function */
function nekoAnimAppear(){
	$("[data-nekoanim]").each(function() {

		var $this = $(this);

		$this.addClass("animated-invisible");
		
		if($(window).width() > 1024 && Modernizr.csstransitions) {
			
			$this.appear(function() {

				var delay = ($this.data("nekodelay") ? $this.data("nekodelay") : 1);
				if(delay > 1) $this.css("animation-delay", delay + "ms");

				$this.addClass("animated");
				$this.addClass($this.data("nekoanim"));

				setTimeout(function() {
					$this.addClass("animated-visible");
				}, delay);

			}, {accX: 0, accY: -200});

		} else {
			$this.css('opacity', 1);
		}
	});
}


/* CONTACT FROM */
$(function() {
	"use strict";
	if( $("#contactfrm").length ){

		$.validator.setDefaults({
			highlight: function(element) {
				$(element).closest('.form-group').addClass('has-error');
				if(!$(element).closest('.form-group').find('.form-control-feedback').length){
					$(element).closest('.form-group').append('<span class="icon-error form-control-feedback"></span>');
				}
				
			},
			unhighlight: function(element) {
				$(element).closest('.form-group').removeClass('has-error');
				$(element).closest('.form-group').find('.form-control-feedback').remove();
			},
			errorElement: 'span',
			errorClass: 'help-block',
			errorPlacement: function(error, element) {
				if(element.parent('.input-group').length) {
					error.insertAfter(element.parent());
				} else {
					error.insertAfter(element);
				}
			}
		});


		$("#contactfrm").validate({
			/* debug: true, */
			submitHandler: function(form) {

				$(form).ajaxSubmit({
					target: ".result",
					success: function(){
						if($('.result .alert-success').length){
							$("#contactfrm").trigger('reset');

						}
					}
				});
			},
			onkeyup: false,
			onclick: false,
			rules: {
				name: {
					required: true,
					minlength: 3
				},
				email: {
					required: true,
					email: true
				},
				phone: {
					required: true,
					minlength: 10,
					digits:true
				},
				comment: {
					required: true,
					minlength: 10,
					maxlength: 350
				}
			}
		});
	}

});

/* CONTACT FROM */ 





/*** G.MAPS ***/

function appendGmapApi() {
	"use strict";
	if($('#map-wrapper').length){

		var script = document.createElement("script");
		script.type = "text/javascript";
		script.src = "http://maps.google.com/maps/api/js?sensor=false&callback=initialize";
		document.body.appendChild(script);

		/* Map Type */
		if($('.satellite').length){ $mapType = 'SATELLITE';}
		else if($('.hybrid').length){ $mapType = 'HYBRID';}
		else if($('.terrain').length){ $mapType = 'TERRAIN';}
		else{ $mapType = 'ROADMAP';}

		/* Map Style */
		if($('.light').length){ $mapStyle = 'light';}
		else if($('.dark').length){ $mapStyle = 'dark';}
		else if($('.gray').length){ $mapStyle = 'gray';}
		else{ $mapStyle = 'DEFAULT';}

	}
}    






function initialize(id) {
	"use strict";
	var image = 'images/icon-map.png';

	var overlayTitle = 'Agencies';

	var locations = [
	/* point number 1 */
	['Madison Square Garden', '4 Pennsylvania Plaza, New York, NY'],

	/* point number 2 */
	['Best town ever', 'Santa Cruz', 36.986021, -122.02216399999998],

	/* point number 3 */
	['Located in the Midwestern United States', 'Kansas'],

	/* point number 4 */
	['I\'ll definitly be there one day', 'Chicago', 41.8781136, -87.62979819999998] 
	];

	/*** DON'T CHANGE ANYTHING PASSED THIS LINE ***/
	id = (id === undefined) ? 'map-wrapper' : id;

	var map = new google.maps.Map(document.getElementById(id), {
		scrollwheel: false,
		zoomControl: true,
		zoomControlOptions: {
			style: google.maps.ZoomControlStyle.LARGE,
			position: google.maps.ControlPosition.LEFT_CENTER
		},
		streetViewControl:true,
		scaleControl:false,
		zoom: 14
	});

	if($mapType == 'SATELLITE'){
		map.setMapTypeId(google.maps.MapTypeId.SATELLITE);
	}else if($mapType == 'HYBRID'){
		map.setMapTypeId(google.maps.MapTypeId.HYBRID);
	}else if($mapType == 'TERRAIN'){
		map.setMapTypeId(google.maps.MapTypeId.TERRAIN);
	}else{
		map.setMapTypeId(google.maps.MapTypeId.ROADMAP);
	}

	if($mapStyle == 'light' && $mapType == 'ROADMAP'){
		var $flatMap = [{"elementType":"labels.text","stylers":[{"visibility":"on"}]},{"featureType":"landscape.natural","elementType":"geometry.fill","stylers":[{"color":"#f5f5f2"},{"visibility":"on"}]},{"featureType":"administrative","stylers":[{"visibility":"on"}]},{"featureType":"transit","stylers":[{"visibility":"on"}]},{"featureType":"poi.attraction","stylers":[{"visibility":"on"}]},{"featureType":"landscape.man_made","elementType":"geometry.fill","stylers":[{"color":"#ffffff"},{"visibility":"on"}]},{"featureType":"poi.business","stylers":[{"visibility":"on"}]},{"featureType":"poi.medical","stylers":[{"visibility":"on"}]},{"featureType":"poi.place_of_worship","stylers":[{"visibility":"on"}]},{"featureType":"poi.school","stylers":[{"visibility":"on"}]},{"featureType":"poi.sports_complex","stylers":[{"visibility":"on"}]},{"featureType":"road.highway","elementType":"geometry","stylers":[{"color":"#ffffff"},{"visibility":"simplified"}]},{"featureType":"road.arterial","stylers":[{"visibility":"simplified"},{"color":"#ffffff"}]},{"featureType":"road.highway","elementType":"labels.icon","stylers":[{"color":"#ffffff"},{"visibility":"on"}]},{"featureType":"road.highway","elementType":"labels.icon","stylers":[{"visibility":"on"}]},{"featureType":"road.arterial","stylers":[{"color":"#ffffff"}]},{"featureType":"road.local","stylers":[{"color":"#ffffff"}]},{"featureType":"poi.park","elementType":"labels.icon","stylers":[{"visibility":"on"}]},{"featureType":"poi","elementType":"labels.icon","stylers":[{"visibility":"on"}]},{"featureType":"water","stylers":[{"color":"#71c8d4"}]},{"featureType":"landscape","stylers":[{"color":"#e5e8e7"}]},{"featureType":"poi.park","stylers":[{"color":"#8ba129"}]},{"featureType":"road","stylers":[{"color":"#ffffff"}]},{"featureType":"poi.sports_complex","elementType":"geometry","stylers":[{"color":"#c7c7c7"},{"visibility":"on"}]},{"featureType":"water","stylers":[{"color":"#a0d3d3"}]},{"featureType":"poi.park","stylers":[{"color":"#91b65d"}]},{"featureType":"poi.park","stylers":[{"gamma":1.51}]},{"featureType":"road.local","stylers":[{"visibility":"on"}]},{"featureType":"road.local","elementType":"geometry","stylers":[{"visibility":"on"}]},{"featureType":"poi.government","elementType":"geometry","stylers":[{"visibility":"on"}]},{"featureType":"landscape","stylers":[{"visibility":"on"}]},{"featureType":"road","elementType":"labels","stylers":[{"visibility":"on"}]},{"featureType":"road.arterial","elementType":"geometry","stylers":[{"visibility":"simplified"}]},{"featureType":"road.local","stylers":[{"visibility":"simplified"}]},{"featureType":"road"},{"featureType":"road"},{},{"featureType":"road.highway"}];
		var styledMap = new google.maps.StyledMapType($flatMap, {name: "light"});
	}else if($mapStyle == 'dark' && $mapType == 'ROADMAP'){
		var $darkMap = [{"stylers":[{"visibility":"on"},{"saturation":-100},{"gamma":0.54}]},{"featureType":"road","elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"water","stylers":[{"color":"#4d4946"}]},{"featureType":"poi","elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"poi","elementType":"labels.text","stylers":[{"visibility":"simplified"}]},{"featureType":"road","elementType":"geometry.fill","stylers":[{"color":"#ffffff"}]},{"featureType":"road.local","elementType":"labels.text","stylers":[{"visibility":"simplified"}]},{"featureType":"water","elementType":"labels.text.fill","stylers":[{"color":"#ffffff"}]},{"featureType":"transit.line","elementType":"geometry","stylers":[{"gamma":0.48}]},{"featureType":"transit.station","elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"road","elementType":"geometry.stroke","stylers":[{"gamma":7.18}]}];
		var styledMap = new google.maps.StyledMapType($darkMap, {name: "dark"});
	}else if($mapStyle == 'gray' && $mapType == 'ROADMAP'){
		var $grayMap = [{"featureType":"landscape","stylers":[{"saturation":-100},{"lightness":65},{"visibility":"on"}]},{"featureType":"poi","stylers":[{"saturation":-100},{"lightness":51},{"visibility":"simplified"}]},{"featureType":"road.highway","stylers":[{"saturation":-100},{"visibility":"on"}]},{"featureType":"road.arterial","stylers":[{"saturation":-100},{"lightness":30},{"visibility":"on"}]},{"featureType":"road.local","stylers":[{"saturation":-100},{"lightness":40},{"visibility":"on"}]},{"featureType":"transit","stylers":[{"saturation":-100},{"visibility":"simplified"}]},{"featureType":"administrative.province","stylers":[{"visibility":"on"}]},{"featureType":"water","elementType":"labels","stylers":[{"visibility":"on"},{"lightness":-25},{"saturation":-100}]},{"featureType":"water","elementType":"geometry","stylers":[{"hue":"#ffff00"},{"lightness":-25},{"saturation":-97}]}];
		var styledMap = new google.maps.StyledMapType($grayMap, {name: "grey"});
	}

	if( $mapStyle != 'DEFAULT' && $mapType == 'ROADMAP'){
		map.mapTypes.set('map_style', styledMap);
		map.setMapTypeId('map_style');
	}

	var myLatlng;
	var marker, i;
	var bounds = new google.maps.LatLngBounds();
	var infowindow = new google.maps.InfoWindow({ content: "loading..." });

	for (i = 0; i < locations.length; i++) { 


		if(locations[i][2] !== undefined && locations[i][3] !== undefined){
			var content = '<div class="infoWindow">'+locations[i][0]+'<br>'+locations[i][1]+'</div>';
			(function(content) {
				myLatlng = new google.maps.LatLng(locations[i][2], locations[i][3]);

				marker = new google.maps.Marker({
					position: myLatlng,
					icon:image,  
					title: overlayTitle,
					map: map
				});

				google.maps.event.addListener(marker, 'click', (function() {
					return function() {
						infowindow.setContent(content);
						infowindow.open(map, this);
					};

				})(this, i));

				if(locations.length > 1){
					bounds.extend(myLatlng);
					map.fitBounds(bounds);
				}else{
					map.setCenter(myLatlng);
				}

			})(content);
		}else{

			var geocoder   = new google.maps.Geocoder();
			var info   = locations[i][0];
			var addr   = locations[i][1];
			var latLng = locations[i][1];

			(function(info, addr) {

				geocoder.geocode( {

					'address': latLng

				}, function(results) {

					myLatlng = results[0].geometry.location;

					marker = new google.maps.Marker({
						position: myLatlng,
						icon:image,  
						title: overlayTitle,
						map: map
					});
					var $content = '<div class="infoWindow">'+info+'<br>'+addr+'</div>';
					google.maps.event.addListener(marker, 'click', (function() {
						return function() {
							infowindow.setContent($content);
							infowindow.open(map, this);
						};
					})(this, i));

					if(locations.length > 1){
						bounds.extend(myLatlng);
						map.fitBounds(bounds);
					}else{
						map.setCenter(myLatlng);
					}
				});
			})(info, addr);

		}
	}
}


/*** End G.MAPS ***/

/*** To top button ***/

function toTop(mobile){

	if(mobile == false){

		if(!$('#nekoToTop').length)
			$('body').append('<a href="#" id="neko-to-top"><i class="icon-to-top"></i></a>');

		$(window).scroll(function () {
			if ($(this).scrollTop() > 100) {
				$('#neko-to-top').slideDown('fast');
			} else {
				$('#neko-to-top').slideUp('fast');
			}
		});

		$('#neko-to-top').click(function (e) {
			e.preventDefault();
			$("html, body").animate({
				scrollTop: 0
			}, 800, 'easeInOutCirc');

		});
	}else{

		if($('#neko-to-top').length)
			$('#neko-to-top').remove();

	}

}

/*** To top button ***/