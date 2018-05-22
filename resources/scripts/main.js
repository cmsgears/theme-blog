jQuery( document ).ready( function() {

	initPreloaders();

	initCmgTools();

	initListeners();

	initAutoHide();
});

// == Pre Loaders =========================

function initPreloaders() {

	// Hide global pre-loader spinner
	jQuery( '.container-main' ).imagesLoaded( { background: true }, function() {

		jQuery( '#pre-loader-main .spinner' ).addClass( 'animate animate-zoom-out' );
		jQuery( '#pre-loader-main' ).fadeOut( 'slow' );
	});
}

// == CMT JS ==============================

function initCmgTools() {

	// Blocks
	jQuery( '.block' ).cmtBlock({
		// Generic
		halfHeight: true,
		heightAuto: true,
		// Block Specific - Ignores generic
		blocks: {
			'block-slider': { fullHeight: true },
			'block-testimonials': { qtfHeight: true },
			'block-public': { fullHeight: true, heightAuto: true, heightAutoMobile: true, heightAutoMobileWidth: 1024 },
			'block-form': { qtfHeight: true, heightAuto: true, heightAutoMobile: true, heightAutoMobileWidth: 1024 }
		}
	});

	// Perspective Header
	jQuery( '#header-main' ).cmtHeader( { scrollDistance: 280 } );

	// Smooth Scroll
	jQuery( '.smooth-scroll' ).cmtSmoothScroll();

	// Box Forms
	jQuery( '.box-form' ).cmtFormInfo();

	// Ratings
	jQuery( '.cmt-rating' ).cmtRate();

	// Select
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

	// Tabs
	jQuery( '.tabs' ).cmtTabs();

	// Accordians
	jQuery( '.accordian' ).cmtAccordian();

	// Grid
	jQuery( '.grid-data' ).cmtGrid();

	// Icon Picker
	jQuery( '.icon-picker' ).cmtIconPicker();
}

// == JS Listeners ========================

function initListeners() {

	jQuery( '#btn-menu-mobile' ).click( function() {

		jQuery( '#menu-main-mobile' ).slideToggle();
	});

	// Datepicker
	var datepickers = jQuery( '.datepicker' );
	
	datepickers.each( function() {

		var datepicker = jQuery( this );

		var start = datepicker.attr( 'start' );

		if( null != start ) {

			datepicker.datepicker({
				dateFormat: 'yy-mm-dd',
				minDate: start
			});
		}
		else {

			datepicker.datepicker({
				dateFormat: 'yy-mm-dd'
			});
		}
	});

	// Scrollbar
	jQuery( '.cscroller' ).mCustomScrollbar( { autoHideScrollbar: true } );
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
