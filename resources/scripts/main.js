jQuery(document).ready( function() {

	initLanding(); 

	initListeners();
	
	initAutoHeight();
	
	cmgStickMenu( ".mobile-nav-icon" ); 
	
	jQuery(".media").click( function() {
		
		jQuery(this).toggleClass("hover");
	} );
});

function initLanding() {

	registerHeaderChange();

	initSmoothScroll( ".smooth-scroll" );	
} 

function initListeners() {

	// Show pre-loader spinner
	jQuery( '#pre-loader-page' ).fadeIn();

	// Hide pre-loader spinner
	jQuery( 'body' ).imagesLoaded( function() {

		jQuery( '#pre-loader-page' ).fadeOut( "slow" );
	}); 
}

function cmgStickMenu( $clickable ) { 
	 	
	jQuery(".cmg-stick-menu").css("top",-jQuery(".header-main").height());
	
	jQuery( $clickable ).click( function() {
		
		jQuery(".cmg-stick-menu").animate({left: '0px'});
	} );
	
	jQuery(".menu-close").click( function() {
		
		jQuery(".cmg-stick-menu").animate({left: '-700px'});
	} );
}

// Set AutoHeight

function initAutoHeight() {
	
	jQuery("#wrap-posts").css("min-height",jQuery(".post").height());
	
	jQuery(".sidebar").height( jQuery(".media").height() );
	
	jQuery(".post .hover-content").width( jQuery(".media").width() ); 
	
	if( window.innerWidth <= 1024  ) {
		
		jQuery(".post .sidebar").height(jQuery(".date").outerHeight()); 
	}
	
	if( window.innerWidth <= 480  ) {
		
		jQuery(".post .media").height( jQuery(".hover-content").height()+30 );
	}
}
