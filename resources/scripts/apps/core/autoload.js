// == Application =========================

jQuery( document ).ready( function() {

	// Delay autoloader
	setTimeout( initAutoloader, 6000 );
});

// == Controller Namespace ================

// == Autoload Controller =================

cmg.core.controllers.AutoloadController.prototype.autoloadActionSuccess = function( requestElement, response ) {

	var data		= response.data;
	var html		= cmt.utils.object.hasProperty( data, 'html' );
	var json		= cmt.utils.object.hasProperty( data, 'json' );
	var autoload	= cmt.utils.object.hasProperty( data, 'id' ) && ( html || json );

	if( autoload ) {

		var autoloader = jQuery( '#' + data.id );

		if( autoloader.length > 0 ) {

			if( html ) {

				autoloader.html( data.html );
			}
			else if( json ) {

				var source 		= document.getElementById( data.id ).innerHTML;
				var template	= Handlebars.compile( source );
				var output 		= template( data.json );

				autoloader.html( output );
			}
		}
	}
};

// == Direct Calls ========================

// == Additional Methods ==================

function initAutoloader() {

	var app = cmt.api.root.getApplication( 'autoload' );

	jQuery( '.autoloader' ).each( function() {

		var element = jQuery( this );

		cmt.api.utils.request.trigger( app, element, false, element.find( '.cmt-click' ) );
	});
}
