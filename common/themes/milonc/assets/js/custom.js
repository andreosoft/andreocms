
	/*
	|--------------------------------------------------------------------------
	| GOOGLE ANALYTICS
	|--------------------------------------------------------------------------
	*/	
	/*************** REPLACE WITH YOUR OWN UA NUMBER ***********/
	window.onload = function () { "use strict"; gaSSDSLoad(); }; //load after page onload
	/*************** REPLACE WITH YOUR OWN UA NUMBER ***********/



$(document).ready(function() { 
	

	/*
	|--------------------------------------------------------------------------
	| Royal SLider video playlist
	|--------------------------------------------------------------------------
	*/	

	if($('.royalSlider').length){
		$('.royalSlider').animate({ opacity: 1}, 300, 'easeInOutQuad');
	}

	if($('.video-gallery').length){
		$('.video-gallery').each(function(index, val) {
			$(this).royalSlider({
				arrowsNav: false,
				fadeinLoadedSlide: true,
				controlNavigationSpacing: 0,
				controlNavigation: 'thumbnails',

				thumbs: {
					autoCenter: false,
					fitInViewport: true,
					orientation: 'vertical',
					spacing: 0,
					paddingBottom: 0
				},
				keyboardNavEnabled: true,
				imageScaleMode: 'fill',
				imageAlignCenter:true,
				slidesSpacing: 0,
				loop: false,
				loopRewind: true,
				numImagesToPreload: 3,
				video: {
					autoHideArrows:true,
					autoHideControlNav:false,
					autoHideBlocks: true
				}, 
				autoScaleSlider: true, 
				autoScaleSliderWidth: 960,     
				autoScaleSliderHeight: 450,

				/* size of all images http://help.dimsemenov.com/kb/royalslider-jquery-plugin-faq/adding-width-and-height-properties-to-images */
				imgWidth: 640,
				imgHeight: 360

			});
		});

	}


	if($('.gallery-fullscreen').length){
		$('.gallery-fullscreen').each( function(index, val) {			
			$(this).royalSlider({
				fullscreen: {
					enabled: true,
					nativeFS: true
				},
				controlNavigation: 'thumbnails',
				autoScaleSlider: true, 
				autoScaleSliderWidth: 960,     
				autoScaleSliderHeight: 850,
				loop: false,
				imageScaleMode: 'fit-if-smaller',
				navigateByClick: true,
				numImagesToPreload:2,
				arrowsNav:true,
				arrowsNavAutoHide: true,
				arrowsNavHideOnTouch: true,
				keyboardNavEnabled: true,
				fadeinLoadedSlide: true,
				globalCaption: false,
				globalCaptionInside: false,
				thumbs: {
					appendSpan: true,
					firstMargin: true,
					paddingBottom: 4
				}
			});
		});
	}

	if($('.animated-fullwidth').length){
		jQuery.rsCSS3Easing.easeOutBack = 'cubic-bezier(0.175, 0.885, 0.320, 1.275)';
		$('.animated-fullwidth').each(function(index, el) {
			$(this).royalSlider({
				arrowsNav: true,
				arrowsNavAutoHide: false,
				fadeinLoadedSlide: false,
				controlNavigationSpacing: 0,
				controlNavigation: 'bullets',
				autoScaleSlider: true, 
				autoScaleSliderWidth: 960,     
				autoScaleSliderHeight: 350,
				imageScaleMode: 'fill',
				imageAlignCenter:false,
				blockLoop: true,
				loop: true,
				numImagesToPreload: 6,
				transitionType: 'fade',
				keyboardNavEnabled: true,
				block: {
					delay: 400
				}
			});	
		});
	}


}); //End Doc Ready


/* ANALYTICS */
function gaSSDSLoad(acct) {
	"use strict";  
	var gaJsHost = (("https:" === document.location.protocol) ? "https://ssl." : "http://www."),
	pageTracker,
	s;
	s = document.createElement('script');
	s.src = gaJsHost + 'google-analytics.com/ga.js';
	s.type = 'text/javascript';
	s.onloadDone = false;
	function init () {
		pageTracker = _gat._getTracker(acct);
		pageTracker._trackPageview();
	}
	s.onload = function () {
		s.onloadDone = true;
		init();
	};
	s.onreadystatechange = function() {
		if (('loaded' === s.readyState || 'complete' === s.readyState) && !s.onloadDone) {
			s.onloadDone = true;
			init();
		}
	};
	document.getElementsByTagName('head')[0].appendChild(s);
}