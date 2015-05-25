jQuery(document).ready( function() {

	initLanding(); 

	initListeners(); 
	initGridView();	 
	initListView();
	
	cmgStickMenu( ".mobile-nav-icon" ); 
	
	jQuery(".media").click( function() {
		
		jQuery(this).toggleClass("hover");
	} ); 
	initAutoHeight();
});

function initGridView() {
	
	jQuery(".icon-grid").click( function() { 
		
		jQuery(".blog .post").css({"width":"50%", "float": "left", "border":"0px", "margin":"2% 0"});
		jQuery(".blog .post .sidebar, .blog .post .icon").hide();
		jQuery(".blog .media").removeClass("col12x9");
		jQuery(".blog .media a img").removeClass("home");
		jQuery(".blog .media").addClass("col1");
		jQuery(this).removeClass("fa-th");
		jQuery(this).addClass("fa-th-list");
		jQuery(this).attr("title","List View");
		jQuery(this).removeClass("icon-grid");
		jQuery(this).addClass("icon-list");
		jQuery(this).one('bind',initAutoHeight());
		initListView();		
		initAutoHeight();
	} );
}

function initListView() {
	
	jQuery(".icon-list").click( function() {
		
		jQuery(".blog .post").css({"width":"100%", "float": "none", "border":"1px", "margin":"5% 0"});
		jQuery(".blog .post .sidebar, .blog .post .icon").show();
		jQuery(".blog .media").addClass("col12x9");
		jQuery(".blog .media").removeClass("col1");
		jQuery(".blog .media a img").addClass("home");
		jQuery(this).removeClass("fa-th-list");
		jQuery(this).addClass("fa-th");
		jQuery(this).attr("title","Grid View");
		jQuery(this).removeClass("icon-list");
		jQuery(this).addClass("icon-grid");
		jQuery(this).one('bind',initAutoHeight());
		initGridView();
		initAutoHeight(); 
	} );
}

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
	
	jQuery(".wrap-posts").css("min-height",jQuery(".post").height()); 
	
	jQuery(".sidebar").height( jQuery(".media").height() );
	
	jQuery(".post .hover-content").width( jQuery(".media").width() ); 
	
	if( window.innerWidth <= 1024  ) {
		
		jQuery(".post .sidebar").height(jQuery(".date").outerHeight()); 
	}
	
	if( window.innerWidth <= 480  ) {
		
		jQuery(".post .media").height( jQuery(".hover-content").height()+30 );
	}
}
