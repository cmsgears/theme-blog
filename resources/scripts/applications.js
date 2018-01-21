var mainApp	= null;

jQuery(document).ready( function() {

	mainApp		= new cmt.api.Application( { basePath: ajaxUrl } );

	var appControllers				= [];

	appControllers[ 'form' ] 		= 'FormController';
	appControllers[ 'newsletter' ] 	= 'NewsletterController';
	appControllers[ 'user' ]		= 'UserController';

	jQuery( '.cmt-form, .cmt-request' ).cmtRequestProcessor({
		app: mainApp,
		controllers: appControllers
	});
});

// DefaultController ----------------------------------------

cmt.api.controllers.DefaultController.prototype.avatarActionPost = function( success, requestElement, response ) {

	requestElement.parent().hide();

	jQuery( '.wrap-popout-actions .wrap-user .cmti-user' ).remove();
	jQuery( '.wrap-popout-actions .wrap-user' ).prepend( '<img class="user-avatar" src="' + response.data.fileUrl + '" />' );
};

// UserController -------------------------------------------

UserController	= function() {};

UserController.inherits( cmt.api.controllers.BaseController );

UserController.prototype.loginActionPost = function( success, parentElement, message, response ) {

	if( success ) {

		window.location.replace( siteUrl + "home" );
	}
};

UserController.prototype.registerActionPost = function( success, parentElement, message, response ) {
	// do nothing
};

UserController.prototype.avatarActionPost = function( success, requestElement, response ) {

	requestElement.parent().hide();

	jQuery( ".wrap-popout-actions .wrap-user img" ).attr( 'src', response.data.fileUrl );
};

UserController.prototype.profileActionPost = function( success, requestElement, response ) {

	if( success ) {

		var source 		= document.getElementById( 'userProfileTemplate' ).innerHTML;
		var template 	= Handlebars.compile( source );
		var output 		= template( response.data );
		var parent		= requestElement.closest( '.box-form' );

		parent.find( '.wrap-info' ).html( output );

		parent.find( '.btn-edit' ).click();
	}
};

UserController.prototype.accountActionPost = function( success, requestElement, response ) {

	if( success ) {

		var source 		= document.getElementById( 'userAccountTemplate' ).innerHTML;
		var template 	= Handlebars.compile( source );
		var output 		= template( response.data );
		var parent		= requestElement.closest( '.box-form' );

		parent.find( '.wrap-info' ).html( output );

		parent.find( '.btn-edit' ).click();
	}
};

UserController.prototype.settingsActionPost = function( success, requestElement, response ) {

	if( success ) {

		var source 		= document.getElementById( 'userSettingsTemplate' ).innerHTML;
		var template 	= Handlebars.compile( source );
		var data		= { settings: response.data };
		var output 		= template( data );
		var parent		= requestElement.closest( '.box-form' );

		parent.find( '.wrap-info' ).html( output );

		parent.find( '.btn-edit' ).click();
	}
};