jQuery( document ).ready( function() {

	initFullCalendar();
});

function initFullCalendar() {

	var element	= jQuery( '.data-event-calendar' );

	if( element.length > 0 ) {

		jQuery( '#user-calendar' ).fullCalendar({
			header: {
				left: 'prev,next',
				right: 'title',
				center: 'month,basicWeek,basicDay'
			},
			//hiddenDays: [ 0, 6 ],
			editable: false,
			eventLimit: true,
			viewRender: function( view, element ) {
			   populateCalendar();
			},
			eventRender: function( event, element ) {

				var element = jQuery( element );

				element.attr( 'id', event.id );

				element.click( function() {

					getCalendarEvent( event.id );
				});
			}
		});
	}
}

function populateCalendar() {

	var startDate	= moment( jQuery( '#user-calendar' ).fullCalendar( 'getView' ).start ).format( 'YYYY-MM-DD' );
	var endDate		= moment( jQuery( '#user-calendar' ).fullCalendar( 'getView' ).end ).format( 'YYYY-MM-DD' );

	var csrfParam 	= jQuery( 'meta[name=csrf-param]' ).attr( 'content' );
	var csrfToken 	= jQuery( 'meta[name=csrf-token]' ).attr( 'content' );
	var data		= "startDate=" + startDate + "&endDate=" + endDate + "&" + csrfParam + "=" + csrfToken;

	// Get Calendar Items
	jQuery.ajax({
		type: 'POST',
		url: ajaxUrl + 'notify/calendar/events',
		data: data,
		dataType: 'JSON',
		//contentType: 'application/json;charset=UTF-8',
		success: function( response, textStatus, XMLHttpRequest ) {

			jQuery( '#user-calendar' ).fullCalendar( 'removeEvents' );
			jQuery( '#user-calendar' ).fullCalendar( 'addEventSource', response.data );
		},
		complete: function(  jqXHR, textStatus ) {

		}
	});
}

function getCalendarEvent( id ) {

	var csrfParam 	= jQuery( 'meta[name=csrf-param]' ).attr( 'content' );
	var csrfToken 	= jQuery( 'meta[name=csrf-token]' ).attr( 'content' );
	var data		= csrfParam + "=" + csrfToken;

	// Get Calendar Event
	jQuery.ajax({
		type: 'POST',
		url: ajaxUrl + 'notify/calendar/event?id=' + id,
		data: data,
		dataType: 'JSON',
		//contentType: 'application/json;charset=UTF-8',
		success: function( response, textStatus, XMLHttpRequest ) {

			var source 		= document.getElementById( 'viewCalendarEventTemplate' ).innerHTML;
			var template 	= Handlebars.compile( source );
			var output 		= template( response.data );

			var popup = jQuery( '#popup-data-event' );

			popup.find( '.popup-content-wrap .popup-content' ).html( output );

			showPopup( '#popup-data-event' );
		},
		complete: function(  jqXHR, textStatus ) {

		}
	});
}
