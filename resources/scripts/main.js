jQuery(document).ready( function() {
	
	initPreloaders();

	initLanding();

	initModules();

	initListeners();
});

function initPreloaders() {

	// Hide global pre-loader spinner
	jQuery( '.module' ).imagesLoaded( function() {

		jQuery( '#pre-loader-main' ).fadeOut( "slow" );
	});
}

function initLanding() {

	// perspective header
	if( jQuery().cmtHeader ) {

		jQuery( "#header-main" ).cmtHeader( { scrollDistance: 250 } );
	}
}

function initModules() {

	// Page Modules
	if( jQuery().cmtPageModule ) {

		jQuery( ".module" ).cmtPageModule( {
			fullHeight: true,
			modules: {
				'module-banner': { fullHeight: false }
				/*
				'module-contact': { fullHeight: false, heightAutoMobile: true, heightAutoMobileWidth: 1024 },
				'module-public': { fullHeight: true, heightAutoMobile: true, heightAutoMobileWidth: 1024 },
				'module-public-full': { fullHeight: false, heightAutoMobile: true, heightAutoMobileWidth: 1024 }
				*/
			}
		});
	}
}

function initListeners() {

	// Initialise the mobile button
	jQuery( "#btn-mobile-menu, #nav-mobile li" ).click( function() {

		jQuery( "#nav-mobile" ).slideToggle( "slow" );
	});

	// Show/ Hide login box
	jQuery( "#btn-login, #btn-login-mobile" ).click( function() {

		jQuery( "#wrap-login-register" ).toggle( "slow" );
	});

	// Show/ Hide settings box
	jQuery( "#btn-settings, #btn-settings-mobile" ).click( function( e ) {

		e.preventDefault();

		jQuery( "#box-settings" ).toggle( "slow" );
	});

	// File Uploader
	if( jQuery().cmtFileUploader ) {

		jQuery( '.file-uploader' ).cmtFileUploader();
	}
}