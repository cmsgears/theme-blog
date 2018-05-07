jQuery( document ).ready( function() {

	initPreloaders();

	initCmgTools();

	initListeners();

	initAutoHide();
});

// == Pre Loaders =========================

function initPreloaders() {

	jQuery( '.container-main' ).imagesLoaded( { background: true }, function() {

		jQuery( '#pre-loader-main' ).fadeOut( 'slow' );
	});
}

// == CMT JS ==============================

function initCmgTools() {

	// Page Blocks
	jQuery( '.block' ).cmtBlock({
		// Generic
		fullHeight: true,
		// Block Specific - Ignores generic
		blocks: {
			'block-public': { fullHeight: true, heightAutoMobile: true, heightAutoMobileWidth: 1024 }
		}
	});

	// Ratings
	jQuery( '.cmt-rating' ).cmtRate();

	// Custom Select
	jQuery( '.cmt-select' ).cmtSelect( { iconHtml: '<span class="fa fa-caret-down"></span>' } );
	jQuery( '.cmt-select-c' ).cmtSelect( { iconHtml: '<span class="fa fa-caret-down"></span>', copyOptionClass: true } );
	jQuery( '.cmt-select-s' ).cmtSelect( { iconHtml: '<span class="fa fa-caret-down"></span>', wrapperClass: 'element-small' } );

	// Checkboxes
	jQuery( '.cmt-checkbox' ).cmtCheckbox();

	// Field Groups
	jQuery( '.cmt-field-group' ).cmtFieldGroup();

	// File Uploader
	jQuery( '.file-uploader' ).cmtFileUploader();

	// Popups
	jQuery( '.popup' ).cmtPopup();

	// Popouts
	jQuery( '.popout-group' ).cmtPopoutGroup();

	// Auto Fillers
	jQuery( '.auto-fill' ).cmtAutoFill();

	// Vertical & Horizontal Tabs
	jQuery( '.tabs-v, .tabs-h' ).cmtTabs();

	// Grid
	jQuery( '.grid-data' ).cmtGrid();

	// Collapsible Sidebar
	jQuery( '#sidebar-main' ).cmtCollapsibleMenu();

	// Icon Picker
	jQuery( '.icon-picker' ).cmtIconPicker();
}

// == JS Listeners ========================

function initListeners() {

	// Datepicker
	if( jQuery().datepicker ) {

		var start = jQuery( '.datepicker' ).attr( 'start' );

		if( null != start ) {

			jQuery( '.datepicker' ).datepicker({
				dateFormat: 'yy-mm-dd',
				minDate: start
			});
		}
		else {
			
			jQuery( '.datepicker' ).datepicker({
				dateFormat: 'yy-mm-dd'
			});
		}
	}

	// Custom Scroller
	if( jQuery().mCustomScrollbar ) {

		jQuery( '.cscroller' ).mCustomScrollbar( { autoHideScrollbar: true } );
	}
}

// == Auto Hide ===========================

function initAutoHide() {

	hideElement( jQuery( '.popout-trigger' ), jQuery( '.popout' ) );
}

function hideElement( targetElement, hideElement ) {

	jQuery( window ).click( function( e ) {

	    if ( !targetElement.is( e.target ) && targetElement.has( e.target ).length === 0 ) {

			jQuery( hideElement ).slideUp();

	        targetElement.removeClass( 'active' );
	    }
	});
}

// == Window Resize, Scroll ===============

function initWindowResize() {

	//resizeElements();

	jQuery( window ).resize( function () {

		//resizeElements();
	});
}

function initWindowScroll() {

	jQuery( window ).scroll(function() {

		var scrolledY = jQuery( window ).scrollTop();

	  	// Do scroll specific tasks
	});
}

function resizeElements() {

	// Resize elements on window resize
}
