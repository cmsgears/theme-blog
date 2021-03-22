// == Application =========================

jQuery( document ).ready( function() {

	var cmtApp	= cmt.api.root.getApplication( 'core' );
	var blogApp	= cmt.api.root.getApplication( 'blogCore' );

	// Register Controllers
});

// == Site Controller =====================

cmg.core.controllers.SiteController.prototype.checkUserActionPre = function( requestElement ) {

	var event = requestElement.attr( 'data-event' );

	switch( event ) {

		case 'review': {

		}
	}

	return true;
};

cmg.core.controllers.SiteController.prototype.checkUserActionSuccess = function( requestElement, response ) {

	var event = requestElement.attr( 'data-event' );

	switch( event ) {

		case 'review': {

			break;
		}
	}
};

cmg.core.controllers.SiteController.prototype.checkUserActionFailure = function( requestElement, response ) {

	var event = requestElement.attr( 'data-event' );

	switch( event ) {

		case 'review': {

			//window.location = siteUrl + 'login';

			break;
		}
	}
};

// Ajax Login
cmg.core.controllers.SiteController.prototype.loginActionSuccess = function( requestElement, response ) {

	window.location = response.data;
};

// == Direct Calls ========================

// == Additional Methods ==================
