// == Application =========================

jQuery( document ).ready( function() {

	var app	= cmt.api.root.registerApplication( 'user', 'cmt.api.Application', { basePath: ajaxUrl } );

	// Map Controllers
	app.mapController( 'user', 'blog.controllers.UserController' );

	// Map Services
	app.mapService( 'user', 'blog.services.UserService' );

	// Register Listeners
	cmt.api.utils.request.register( app, jQuery( '[cmt-app=user]' ) );

	// Event Listeners
	app.getService( 'user' ).initListeners();
});

// == Controller Namespace ================

// == User Controller =====================

blog.controllers.UserController = function() {};

blog.controllers.UserController.inherits( cmt.api.controllers.RequestController );

blog.controllers.UserController.prototype.avatarActionSuccess = function( requestElement, response ) {

	var uploader = requestElement.closest( '.file-uploader' );

	// Update Header Popuout
	jQuery( '.popout-group-main .wrap-user .fa-user' ).remove();
	jQuery( '.popout-group-main .wrap-user .user-avatar' ).remove();
	jQuery( '.popout-group-main .wrap-user' ).prepend( '<img class="user-avatar" src="' + response.data.thumbUrl + '" />' );

	// Update Uploader
	uploader.find( '.post-action' ).hide();
};

blog.controllers.UserController.prototype.clearAvatarActionSuccess = function( requestElement, response ) {

	var uploader = requestElement.closest( '.file-uploader' );

	// Update Header Popuout
	jQuery( '.popout-group-main .wrap-user .fa-user' ).remove();
	jQuery( '.popout-group-main .wrap-user .user-avatar' ).remove();
	jQuery( '.popout-group-main .wrap-user' ).prepend( '<span class="fa fa-user icon"></span>' );

	// Update Uploader
	uploader.find( '.file-wrap .file-data' ).html( '<i class="cmti cmti-5x cmti-user"></i>');
	uploader.find( '.file-clear' ).hide();
};

blog.controllers.UserController.prototype.profileActionSuccess = function( requestElement, response ) {

	// Profile success
};

blog.controllers.UserController.prototype.accountActionSuccess = function( requestElement, response ) {

	// Show old password field
	requestElement.find( '.data-crud-wrap .hidden-easy' ).removeClass( 'hidden-easy' );
};

blog.controllers.UserController.prototype.addressActionSuccess = function( requestElement, response ) {

	// Address success
};

blog.controllers.UserController.prototype.settingsActionSuccess = function( requestElement, response ) {

	// Settings success
};

blog.controllers.UserController.prototype.workActionSuccess = function( requestElement, response ) {

	// Settings success
};

// == Card Service ========================

blog.services.UserService = function() {};

blog.services.UserService.inherits( cmt.api.services.BaseService );

blog.services.UserService.prototype.initListeners = function() {

	//var self = this;
}

// == Direct Calls ========================

function updateUserAttribute( key, value ) {

	cmt.utils.ajax.triggerPost( ajaxUrl + "user/set-attribute", "Meta[key]=" + key + "&Meta[value]=" + value );
}

function updateUserConfig( key, value ) {

	cmt.utils.ajax.triggerPost( ajaxUrl + "user/set-config", "Meta[key]=" + key + "&Meta[value]=" + value );
}

function removeUserConfig( key ) {

	cmt.utils.ajax.triggerPost( ajaxUrl + "user/remove-config", "Meta[key]=" + key );
}

// == Additional Methods ==================
