// == Application =========================

jQuery( document ).ready( function() {

	// Delay autoloader
	setTimeout( initAutoloader, 6000 );
});

// == Controller Namespace ================

// == Autoload Controller =================

cmg.core.controllers.AutoloadController.prototype.autoloadActionSuccess = function( requestElement, response ) {

	if( cmt.utils.object.hasProperty( response.data, 'widgetId' ) && cmt.utils.object.hasProperty( response.data, 'widgetHtml' ) ) {

		var widget = jQuery( '#' + response.data.widgetId );

		if( widget.length > 0 ) {

			widget.html( response.data.widgetHtml );
		}
	}
};

// == Direct Calls ========================

// == Additional Methods ==================

function initAutoloader() {

	jQuery( '.autoloader' ).each( function() {

		var element = jQuery( this );

		cmt.api.utils.request.trigger( cmt.api.root.getApplication( 'autoload' ), element, false, element.find( '.cmt-click' ) );
	});
}
