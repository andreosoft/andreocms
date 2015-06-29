/** Used Only For Touch Devices **/
$(document).ready(function() { 
	/* for touch devices: add class cs-hover to the figures when touching the items */
	if( Modernizr.touch ) {
		$( '.img-hover article:not(.generatedMoreLink) figure, .img-hover div figure').on( 'touchstart', function(e) {
			$('div', this).find( '.mask-over > a' ).on( 'touchstart', function(e) {
				e.stopPropagation();
			});
			$(this).toggleClass('cs-hover');
		});
	}
});