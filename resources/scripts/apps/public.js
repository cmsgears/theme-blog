// == Application =========================

jQuery( document ).ready( function() {

	var app	= cmt.api.root.registerApplication( 'site', 'cmt.api.Application', { basePath: ajaxUrl } );

	// Map Controllers
	app.mapController( 'site', 'blog.controllers.SiteController' );

	// Register Listeners
	cmt.api.utils.request.register( app, jQuery( '[cmt-app=site]' ) );
});

// == Controller Namespace ================

var cmg = cmg || {};

cmg.controllers = cmg.controllers || {};

var blog = blog || {};

blog.controllers = blog.controllers || {};

// == Service Namespace ===================

cmg.services = cmg.services || {};

blog.services = blog.services || {};

// == Site Controller =====================

blog.controllers.SiteController = function() {};

blog.controllers.SiteController.inherits( cmt.api.controllers.RequestController );

cmg.controllers.SiteController.prototype.loginActionSuccess = function( requestElement, response ) {

	window.location = response.data;
};

blog.controllers.SiteController.prototype.checkUserActionPre = function( requestElement ) {

	var event = requestElement.attr( 'data-event' );

	switch( event ) {
		
		case 'review': {

		}
	}

	return true;
};

blog.controllers.SiteController.prototype.checkUserActionSuccess = function( requestElement, response ) {

	var event = requestElement.attr( 'data-event' );

	switch( event ) {
		
		case 'review': {

			break;
		}
	}
};

blog.controllers.SiteController.prototype.checkUserActionFailure = function( requestElement, response ) {

	var event = requestElement.attr( 'data-event' );
	
	switch( event ) {
		
		case 'review': {

			//window.location = siteUrl + 'login';

			break;
		}
	}
};

// == Direct Calls ========================

// == Additional Methods ==================
