jQuery(document).ready( function() {

	initAjaxListeners();
});

function initAjaxListeners() {

	// Listen for Ajax Forms
	jQuery( ".frm-ajax" ).processAjax();
	
	jQuery( ".request-ajax" ).processAjax( { form: false } );
}

// Forms --------------------------------------------------------------------

function postBTProcessorSuccess( formId, formGroup, formKey, data ) {

	switch( formGroup ) {

		case CONTROLLER_DEFAULT: {

			switch( formKey ) {

				case ACTION_LOGIN: {

					window.location.replace( siteUrl + "home" );

					break;
				}
				case ACTION_AVATAR: {

					jQuery( "#" + formId ).parent().hide();

					break;
				}
			}

			break;
		}
	}
}

postCmtApiProcessor.addSuccessListener( postBTProcessorSuccess );