// == Application =========================

jQuery( document ).ready( function() {

	// Register App
	var app	= cmt.api.root.registerApplication( 'blogCore', 'cmt.api.Application', { basePath: ajaxUrl } );

	// Register Listeners
	cmt.api.utils.request.register( app, jQuery( '[cmt-app=blogCore]' ) );
});

// == App Namespace =======================

var blog = blog || {};

blog.core = blog.core || {};

// == Controller Namespace ================

blog.core.controllers = blog.core.controllers || {};

// == Service Namespace ===================

blog.core.services = blog.core.services || {};

// == Additional Methods ==================
