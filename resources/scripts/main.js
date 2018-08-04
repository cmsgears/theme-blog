jQuery( document ).ready( function() {

	initPreloaders();

	initCmgTools();

	initListeners();

	initDatePickers();

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
			'block-half': { halfHeight: true },
			'block-qtf': { qtfHeight: true },
			'block-full': { fullHeight: true },
			'block-half-auto': { halfHeight: true, heightAuto: true },
			'block-qtf-auto': { qtfHeight: true, heightAuto: true },
			'block-full-auto': { fullHeight: true, heightAuto: true },
			'block-half-mauto': { halfHeight: true, heightAutoMobile: true, heightAutoMobileWidth: 1024 },
			'block-qtf-mauto': { qtfHeight: true, heightAutoMobile: true, heightAutoMobileWidth: 1024 },
			'block-full-mauto': { fullHeight: true, heightAutoMobile: true, heightAutoMobileWidth: 1024 }
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
	jQuery( '.cmt-select' ).cmtSelect( { iconHtml: '<span class="cmti cmti-chevron-down"></span>' } );
	jQuery( '.cmt-select-c' ).cmtSelect( { iconHtml: '<span class="cmti cmti-chevron-down"></span>', copyOptionClass: true } );
	jQuery( '.cmt-select-s' ).cmtSelect( { iconHtml: '<span class="cmti cmti-chevron-down"></span>', wrapperClass: 'element-small' } );

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
	
    // Sliders
    jQuery( '.cmt-slider' ).cmtSlider( {
        "lControlContent" : "<i class=\"cmti cmti-chevron-left icon\"></i>",
        "rControlContent" : "<i class=\"cmti cmti-chevron-right icon\"></i>",
        "circular" : false
    });
}

// == JS Listeners ========================

function initListeners() {

	// Main Menu
	jQuery( '#btn-menu-mobile' ).click( function() {

		jQuery( '#menu-main-mobile' ).slideToggle();
	});

	// Scrollbar
	jQuery( '.cscroller' ).mCustomScrollbar( { autoHideScrollbar: true } );
}

function initDatePickers() {
	
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
}

// == Window Resize, Scroll ===============

function initWindowResize() {

	//resizeElements();

	jQuery( window ).resize( function () {

		//resizeElements();
	});
}

function initWindowScroll() {

	jQuery( window ).scroll( function() {

		var scrolledY = jQuery( window ).scrollTop();

		configScrollAt( scrolledY );
	});
}

function resizeElements() {

	// Resize elements on window resize
}

function configScrollAt() {

	// Show hidden elements with animation effects
}
