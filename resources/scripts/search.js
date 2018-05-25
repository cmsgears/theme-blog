jQuery( document ).ready( function() {

	initSearch();
});

// == Initialize Search ===================

function initSearch() {

	var pageUrl	= window.location.href;

	// Regular Search
	jQuery( '#btn-search' ).click( function() {

		searchBro( '#search-terms', pageUrl );
	});
	
	// Page Search
	jQuery( '#btn-search-page' ).click( function() {

		pageUrl = siteUrl + 'page/search';

		searchBro( '#search-page', pageUrl );
	});
	
	// Article Search
	jQuery( '#btn-search-article' ).click( function() {

		pageUrl = siteUrl + 'article/search';

		searchBro( '#search-article', pageUrl );
	});
	
	// Blog Search
	jQuery( '#btn-search-post' ).click( function() {

		pageUrl = siteUrl + 'blog/search';

		searchBro( '#search-post', pageUrl );
	});

	// Page Search
	jQuery( '#search-page' ).keypress( function( e ) {

		// Listen to enter key
    	if( e.which == 13 ) {

			pageUrl = siteUrl + 'page/search';

			searchBro( '#search-page', pageUrl );
    	}
	});
	
	// Article Search
	jQuery( '#search-article' ).keypress( function( e ) {

		// Listen to enter key
    	if( e.which == 13 ) {

			pageUrl = siteUrl + 'article/search';

			searchBro( '#search-article', pageUrl );
    	}
	});

	// Blog Search
	jQuery( '#search-post' ).keypress( function( e ) {

		// Listen to enter key
    	if( e.which == 13 ) {

			pageUrl = siteUrl + 'blog/search';

			searchBro( '#search-post', pageUrl );
    	}
	});

	// Init Default Filters
	initTextFilter( '.filter-text' );
	initCheckboxFilter( '.filter-checkbox' );
	initRangeFilter( '.filter-range' );
}

function searchBro( selector, pageUrl ) {

	var keywords = jQuery( selector ).val();

	// Search Keywords
	if( null != keywords && keywords.length > 0 ) {

		pageUrl = cmt.utils.data.updateUrlParam( pageUrl, 'keywords', keywords );
	}
	else {

		pageUrl = cmt.utils.data.removeParam( pageUrl, 'keywords' );
	}

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
