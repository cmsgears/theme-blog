jQuery(document).ready( function() {

	initLanding();

	initModules();

	initListeners();
});

function initLanding() {

	registerHeaderChange();

	initSmoothScroll( ".smooth-scroll" );	
}

function initModules() {

	// Initialise the Page Modules
	if( jQuery().cmgPageModules ) {

		jQuery( ".module" ).cmgPageModules( {
			fullHeight: true,
			modules: {
				'module-about': { fullHeight: true, css: { 'height': 'auto' } },
				'module-contact': { heightAutoMobile: true, heightAutoWidth: 1024 }
			}
		});
	}	
}

function initListeners() {

	// Show pre-loader spinner
	jQuery( '#pre-loader-page' ).fadeIn();

	// Hide pre-loader spinner
	jQuery( 'body' ).imagesLoaded( function() {

		jQuery( '#pre-loader-page' ).fadeOut( "slow" );
	});

	// Initialise the mobile button
	jQuery( "#btn-mobile-menu" ).click( function() {

		jQuery( "#nav-mobile" ).slideToggle( "slow" );
	});
	
	// Show/ Hide login box
	jQuery("#btn-login, #btn-login-mobile").click( function() {

		jQuery( "#wrap-login-register" ).toggle( "slow" );
	});
	
	// Show/ Hide settings box
	jQuery("#btn-settings, #btn-settings-mobile").click( function( e ) {
		
		e.preventDefault();

		jQuery( "#box-settings" ).toggle( "slow" );
	});
}