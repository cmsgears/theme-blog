jQuery( document ).ready( function() {

	initPreloaders();

	initCmgTools();

	initListeners();

	initDatePickers();

	initSidebar();
	initSidebarTabs();

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

	// Perspective Header
	jQuery( '.cmt-header-perspective' ).cmtHeader( { scrollDistance: 280 } );

	// Blocks
	jQuery( '.cmt-block, .page' ).cmtBlock({
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
	jQuery( '.cmt-select' ).cmtSelect( { iconHtml: '<span class="fa fab fa-caret-down"></span>' } );
	jQuery( '.cmt-select-c' ).cmtSelect( { iconHtml: '<span class="fa fab fa-caret-down"></span>', copyOptionClass: true } );
	jQuery( '.cmt-select-s' ).cmtSelect( { iconHtml: '<span class="fa fab fa-caret-down"></span>', wrapperClass: 'element-small' } );

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

	// Collapsible Menu
	jQuery( '#sidebar-main' ).cmtCollapsibleMenu();

	// Actions
	jQuery( '.cmt-actions' ).cmtActions();

	// Auto Hide
	jQuery( '.cmt-auto-hide' ).cmtAutoHide();

	// Icon Picker
	jQuery( '.cmt-icon-picker, .cmt-texture-picker' ).cmtIconPicker();

	// Time Picker
	jQuery( '.cmt-timepicker' ).cmtTimePicker();

	// Login & Register
	jQuery( '#popup-login' ).cmtLoginRegister();

	// Intl Tel Input
	cmt.utils.intltel.initIntlTelInput( 'us' );
}

// == JS Listeners ========================

function initListeners() {

	// Main Menu
	jQuery( '#btn-menu-mobile' ).click( function() {

		jQuery( '#menu-main-mobile' ).slideToggle();
	});

	// Login & Register
	jQuery( '#btn-login' ).click( function( e ) {

		e.preventDefault();

		showPopup( '#popup-login' );
	});

	// Custom scroller
	jQuery( '.cscroller' ).mCustomScrollbar( { autoHideScrollbar: true } );

	// Auto save checkbox action
	jQuery( '.cmt-checkbox input' ).on( 'input', function() {

		jQuery( this ).parent().find( '.cmt-click' ).click();
	});
}

// == Datepickers =========================

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

	// Datetimepicker
	if( jQuery().datetimepicker ) {

		jQuery( '.datetimepicker' ).datetimepicker( { format: 'Y-m-d H:i:00', step: 5 } );

		jQuery( '.dt-date-picker' ).datetimepicker( { timepicker: false, format: 'Y-m-d' } );

		jQuery( '.dt-dob-picker' ).datetimepicker( { timepicker: false, format: 'Y-m-d', yearStart: 1950, yearEnd: 2010, defaultDate: '2000-01-01' } );

		jQuery( '.dt-time-picker' ).datetimepicker( { datepicker: false, format: 'H:i:00', step: 5 } );
	}
}

// == Sidebars ============================

function initSidebar() {

	jQuery( '#btn-sidebar-main' ).click( function() {

		if( jQuery( '#sidebar-main' ).hasClass( 'sidebar-main-micro' ) ) {

			setUserConfig( 'microSidebar', 0 );
		}
		else {

			setUserConfig( 'microSidebar', 1 );
		}

		jQuery( '#sidebar-main' ).toggleClass( 'sidebar-main-micro' );

		initSidebarTabs();
	});

	jQuery( '#btn-sidebar-mobile' ).click( function() {

		jQuery( '#sidebar-main' ).fadeIn( 'slow' );
	});

	jQuery( '#btn-sidebar-close' ).click( function() {

		jQuery( '#sidebar-main' ).fadeOut( 'fast' );
	});
}

function initSidebarTabs() {

	if( jQuery( '#sidebar-main' ).hasClass( 'sidebar-main-micro' ) ) {

		jQuery( '.sidebar-main-filler' ).addClass( 'sidebar-filler-micro' );
		jQuery( '.container-main' ).addClass( 'container-main-micro' );
		jQuery( '.content-main-wrap' ).addClass( 'content-main-wrap-micro' );

		jQuery( '#sidebar-main .collapsible-tab .tab-header' ).addClass( 'tab-content-trigger' );
		jQuery( '#sidebar-main .tab-content' ).removeClass( 'visible' );

		jQuery( '#sidebar-main .tab-content-trigger' ).click( function() {

			var parent = jQuery( this ).closest( '.collapsible-tab' );

			if( parent.hasClass( 'has-children' ) ) {

				var tab = parent.find( '.tab-content' );

				if( tab.is( ':visible' ) ) {

					tab.hide( 'fast' );
				}
				else {

					jQuery( '#sidebar-main .tab-content' ).hide( 'fast' );

					tab.fadeIn( 'slow' );
				}
			}
		});

		jQuery( '#btn-sidebar-main .sidebar-trigger-expanded' ).hide();
		jQuery( '#btn-sidebar-main .sidebar-trigger-collapsed' ).show();
	}
	else {

		jQuery( '.sidebar-main-filler' ).removeClass( 'sidebar-filler-micro' );
		jQuery( '.container-main' ).removeClass( 'container-main-micro' );
		jQuery( '.content-main-wrap' ).removeClass( 'content-main-wrap-micro' );

		jQuery( '#sidebar-main .collapsible-tab .tab-header' ).unbind( 'click' );
		jQuery( '#sidebar-main .collapsible-tab .tab-header' ).removeClass( 'tab-content-trigger' );
		jQuery( '#sidebar-main .collapsible-tab.has-children.active .tab-content' ).addClass( 'visible' );

		jQuery( '#btn-sidebar-main .sidebar-trigger-expanded' ).show();
		jQuery( '#btn-sidebar-main .sidebar-trigger-collapsed' ).hide();
	}
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
