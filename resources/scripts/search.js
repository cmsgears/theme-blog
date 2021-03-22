jQuery( document ).ready( function() {

	initSearch();
});

// == Initialize Search ===================

function initSearch() {

	// Click
	jQuery( '.btn-search' ).click( function() {

		searchBro( jQuery( this ).closest( '.search-box' ) );
	});

	// Keypress
	jQuery( '.search-terms' ).keypress( function( e ) {

		if( e.which == 13 ) {

			searchBro( jQuery( this ).closest( '.search-box' ) );
		}
	});

	// Init Default Filters
	initTextFilter( '.filter-text' );
	initCheckboxFilter( '.filter-checkbox' );
	initRangeFilter( '.filter-range' );
}

function searchBro( searchBox ) {

	var pageUrl		= window.location.href;
	var keywords	= searchBox.find( '.search-terms' ).val();
	var param		= cmt.utils.data.hasAttribute( searchBox, 'data-param' ) ? searchBox.attr( 'data-param' ) : 'keywords';

	if( cmt.utils.data.hasAttribute( searchBox, 'data-url' ) ) {

		pageUrl = siteUrl + searchBox.attr( 'data-url' );
	}

	// Search Keywords
	if( null != keywords && keywords.length > 0 ) {

		pageUrl = cmt.utils.data.updateUrlParam( pageUrl, param, keywords );
	}
	else {

		pageUrl = cmt.utils.data.removeParam( pageUrl, param );
	}

	// Clear Pagination
	pageUrl = cmt.utils.data.removeParam( pageUrl, 'page' );
	pageUrl = cmt.utils.data.removeParam( pageUrl, 'per-page' );

	window.location	= pageUrl;
}

// == Search Filters ======================

function initTextFilter( selector ) {

	jQuery( selector ).click( function() {

		var pageUrl	= window.location.href;
		var param	= jQuery( this ).attr( 'column' );
		var value	= jQuery( this ).attr( 'filter' );

		window.location = cmt.utils.data.updateUrlParam( pageUrl, param, value );
	});
}

function initCheckboxFilter( selector ) {

	jQuery( selector ).change( function() {

		var pageUrl	= window.location.href;
		var param	= jQuery( this ).attr( 'column' );

		var checked	= [];

		jQuery( selector ).each( function( id, cb ) {

			if( jQuery( cb ).is( ':checked' ) ) {

				checked.push( jQuery( cb ).val() );
			}
		});

		var pageUrl	= window.location.href;

		if( checked.length > 0 ) {

			checked = checked.join();

			window.location = cmt.utils.data.updateUrlParam( pageUrl, param, checked );
		}
		else {

			window.location = cmt.utils.data.removeParam( pageUrl, param );
		}
	});
}

function initRangeFilter( selector ) {

    jQuery( selector ).each( function( index ) {

		var filter	= jQuery( this );

		var pageUrl	= window.location.href;
		var param	= filter.attr( 'column' );

        var start	= parseFloat( filter.attr( 'start' ) );
        var end		= parseFloat( filter.attr( 'end' ) );
        var min		= parseFloat( filter.attr( 'min' ) );
        var max		= parseFloat( filter.attr( 'max' ) );

        noUiSlider.create( selector, {
            start: [ start, end ],
            connect: true,
            behaviour: 'tap',
            range: {
                'min': [ min ],
                'max': [ max ]
            }
        });

        selector.noUiSlider.on( 'update', function( values, handle ) {

			var value = values[ 0 ] + "," + values[ 1 ];

            window.location = cmt.utils.data.updateUrlParam( pageUrl, param, value );
        });
    });
}
