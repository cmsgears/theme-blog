jQuery( document ).ready( function() {

	initPreloaders();

	initCmgTools();

	initListeners();
	
	initWindowScroll();
});

function initPreloaders() {

	// Hide global pre-loader spinner
	jQuery( '.block' ).imagesLoaded( { background: true }, function() {

		jQuery( '#pre-loader-main' ).fadeOut( 'slow' );
	});
}

function initCmgTools() {

	// perspective header
	if( jQuery().cmtHeader ) {

		jQuery( "#header-main" ).cmtHeader( { scrollDistance: 350 } );
	}

	// Initialise the Blocks
	if( jQuery().cmtBlock ) {

		jQuery( ".block" ).cmtBlock({
			fullHeight: true,
			blocks: {
				'block-banner': { fullHeight: false },
				'block-page': { fullHeight: false },
				'block-about': { 'fullHeight': true, heightAutoMobile: true, heightAutoMobileWidth: 1024 },
				'block-contact': { 'fullHeight': true, 'heightAuto': true },
				'block-public': { 'fullHeight': true, heightAutoMobile: true, heightAutoMobileWidth: 1600 }
			}
		});
	}
}

function initListeners() {

	// Initialise the mobile button
	jQuery( "#nav-mobile-icon, #nav-mobile li" ).click( function() {

		if( jQuery( "#nav-mobile" ).hasClass( "active" ) ) {

			jQuery( "#nav-mobile" ).removeClass( "active" );
		}
		else {

			jQuery( "#nav-mobile" ).addClass( "active" );
		}
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

function initWindowScroll() {

	jQuery( window ).scroll(function() {

		var scrolledY = jQuery( window ).scrollTop();

	  	jQuery( '#block-banner .block-bkg-scroll' ).css( 'background-position', 'center ' + ( ( scrolledY ) ) + 'px' );
	});
}