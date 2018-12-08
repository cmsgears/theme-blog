jQuery( document ).ready( function() {

	initPreloaders();

	initCmgTools();

	initListeners();
	
	initDatePickers();

	initWindowResize();
	
	initWindowScroll();
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
	jQuery( '.cmt-block' ).cmtBlock({
		// Generic
		halfHeight: true,
		heightAuto: true,
		// Block Specific - Ignores generic
		blocks: {
			'block-auto': { autoHeight: true, heightAuto: true },
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
	jQuery( '#cmt-header-main' ).cmtHeader( { scrollDistance: 280 } );

	// Smooth Scroll
	jQuery( '.cmt-smooth-scroll' ).cmtSmoothScroll();

	// Box Forms
	jQuery( '.cmt-box-form' ).cmtFormInfo();

	// Ratings
	jQuery( '.cmt-rating' ).cmtRate();

	jQuery( '.cmt-rating-emoticons' ).cmtRate({
		same: [ 'cmti cmti-2x cmti-emoticons-sad', 'cmti cmti-2x cmti-emoticons-sulk', 'cmti cmti-2x cmti-emoticons-intense', 'cmti cmti-2x cmti-emoticons-hopeful', 'cmti cmti-2x cmti-emoticons-happy' ],
		emptyColor: '#7F7F7F'
	});

	// Select
	jQuery( '.cmt-select' ).cmtSelect( { iconHtml: '<span class="fa fa-caret-down"></span>' } );
	jQuery( '.cmt-select-c' ).cmtSelect( { iconHtml: '<span class="fa fa-caret-down"></span>', copyOptionClass: true } );
	jQuery( '.cmt-select-s' ).cmtSelect( { iconHtml: '<span class="fa fa-caret-down"></span>', wrapperClass: 'element-small' } );

	// Checkboxes
	jQuery( '.cmt-checkbox' ).cmtCheckbox();

	// Field Groups
	jQuery( '.cmt-field-group' ).cmtFieldGroup();

	// File Uploader
	jQuery( '.cmt-file-uploader' ).cmtFileUploader();

	// Popups
	jQuery( '.cmt-popup' ).cmtPopup();

	// Popouts
	jQuery( '.cmt-popout-group' ).cmtPopoutGroup();

	// Auto Fillers
	jQuery( '.cmt-auto-fill' ).cmtAutoFill();

	// Tabs
	jQuery( '.cmt-tabs' ).cmtTabs();

	// Accordians
	jQuery( '.cmt-accordian' ).cmtAccordian();

	// Grid
	jQuery( '.cmt-grid-data' ).cmtGrid();

	// Actions
	jQuery( '.cmt-actions' ).cmtActions();

	// Auto Hide
	jQuery( '.cmt-auto-hide' ).cmtAutoHide();

	// Icon Picker
	jQuery( '.cmt-icon-picker, .cmt-texture-picker' ).cmtIconPicker();

	// Time Picker
	jQuery( '.cmt-timepicker' ).cmtTimePicker();

	jQuery( '.cmt-slider' ).cmtSlider({
		lControlContent: "<i class=\"fa fa-angle-left valign-center\"></i>",
		rControlContent: "<i class=\"fa fa-angle-right valign-center\"></i>"
	});
}

// == JS Listeners ========================

function initListeners() {

	// Main Menu
	jQuery( '#btn-menu-mobile' ).click( function() {

		jQuery( '#menu-main-mobile' ).slideToggle();
	});

	// Custom scroller
	jQuery( '.cscroller' ).mCustomScrollbar( { autoHideScrollbar: true } );

	// Auto save checkbox action
	jQuery( '.cmt-checkbox input' ).on( 'input', function() {

		jQuery( this ).parent().find( '.cmt-click' ).click();
	});
}

function initDatePickers() {

	// Datepicker
	var datepickers = jQuery( '.datepicker' );

	datepickers.each( function() {

		var datepicker = jQuery( this );

		var start	= datepicker.attr( 'ldata-start' );
		var end		= datepicker.attr( 'ldata-end' );

		if( null != start && null != end ) {

			datepicker.datepicker({
				dateFormat: 'yy-mm-dd',
				minDate: start,
				maxDate: end
			});
		}
		else if( null != start ) {

			datepicker.datepicker({
				dateFormat: 'yy-mm-dd',
				minDate: start
			});
		}
		else if( null != end ) {

			datepicker.datepicker({
				dateFormat: 'yy-mm-dd',
				maxDate: end
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
