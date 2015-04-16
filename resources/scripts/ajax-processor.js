jQuery(document).ready( function() {

	initAjaxListeners();
});

function initAjaxListeners() {

	jQuery( "#btn-logout a" ).click( function( e ) {
	
		e.preventDefault();
		
		logout( this.href );
	});

	// Listen for Ajax Forms
	jQuery( ".frm-ajax" ).processAjax();
}

// Forms --------------------------------------------------------------------

function postBTProcessorSuccess( formId, formGroup, formKey, data ) {

	switch( formGroup ) {

		case FORM_GROUP_DEFAULT:
		{

			switch( formKey ) {

				case FORM_KEY_LOGIN:
				{
					window.location.replace( siteUrl + "user/home" );

					break;
				}
			}

			break;
		}
	}
}

postAjaxProcessor.addSuccessListener( postBTProcessorSuccess );

// Logout -------------------------------------------------------------------

function logout( logoutUrl ) {

	var csrfToken 	= jQuery( 'meta[name=csrf-token]' ).attr( 'content' );
	var formData	= { _csrf: csrfToken };

    jQuery.ajax({
        type: 'POST',
        url: logoutUrl,
        data: formData,
        dataType: "JSON",
        success: function( data, textStatus, XMLHttpRequest ) {

        	window.location.href = siteUrl;
        }
	});
}