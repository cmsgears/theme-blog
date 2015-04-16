// Page Modules -------------------------------------------

( function( cmg ) {

	cmg.fn.cmgPageModules = function( options ) {

		// == Init == //

		// Configure Modules
		var settings 		= cmg.extend( {}, cmg.fn.cmgPageModules.defaults, options );
		var modules			= this;
		var screenHeight	= cmg( window ).height();
		var screenWidth		= cmg( window ).width();
		var modulesArr		= settings.modules;
		var modulesKeys		= Object.keys( modulesArr );

		// Iterate and initialise all the fox sliders
		modules.each( function() {

			var module	= cmg( this );

			init( module );
		});

		// Initialise parallax
		if( settings.backgroundParallax ) {

			cmg( window ).scroll( scrollBackground );
		}

		// return control
		return;

		// == Private Functions == //

		// Initialise Module
		function init( module ) {

			if( settings.fullHeight ) {

				module.css( { 'height': screenHeight + "px" } );
			}

			// Process in case module specific extra settings are provided
			if( cmg.inArray( module.attr( "id" ), modulesKeys ) >= 0 ) {

				var moduleSettings		= modulesArr[ module.attr( "id" ) ];
				var seperator			= moduleSettings[ "seperator" ];
				var seperatorHeight		= 0;
				var fullHeight 			= moduleSettings[ "fullHeight" ];
				var height				= moduleSettings[ "height" ];
				var heightAutoMobile	= moduleSettings[ "heightAutoMobile" ];
				var heightAutoWidth		= moduleSettings[ "heightAutoWidth" ];
				var css 				= moduleSettings[ "css" ];

				// Check whether module seperator is required
				if( null != seperator && seperator ) {

					seperatorHeight = module.children( ".seperator" ).height();
				}

				// Check whether full height is required
				if( null != fullHeight && fullHeight ) {

					module.css( { 'min-height': ( screenHeight - seperatorHeight ) + "px" } );
				}

				// Check whether pre-defined height is required
				if( null != height && height ) {

					module.css( { 'height': ( height - seperatorHeight ) + "px" } );
				}

				// Check whether min height and height auto is required for mobile to handle overlapped content
				if( null != heightAutoMobile && heightAutoMobile ) {

					if( screenWidth <= heightAutoWidth ) {

						module.css( { 'height': 'auto', 'min-height': screenHeight + "px" } );

						var contentWrap = module.children( ".module-wrap-content" );

						if( contentWrap.hasClass( "valign-center" ) ) {

							contentWrap.removeClass( "valign-center" );
						}
					}
				}

				// Check whether additional css is required
				if( null != css && css ) {

					module.css( css );
				}
			}
		}

		// Initialise parallax
		function scrollBackground() {

			var winHeight 	= cmg( window ).height();
		    var winTop 		= cmg( window ).scrollTop();
		    var winBottom 	= winTop + winHeight;
		    var winCurrent 	= ( winTop + winBottom ) / 2;
		    
		    modules.each( function( i ) {

		        var module 			= cmg( this );
		        var moduleHeight 	= module.height();
		        var moduleTop 		= module.offset().top;
		        var moduleBottom 	= moduleTop + moduleHeight;
		        var background		= module.children(".module-bkg-parallax");

		        if( null != background && background.length > 0 && winBottom > moduleTop && winTop < moduleBottom ) {

					var bkgWidth 		= background.width();
	            	var bkgHeight 		= background.height();
		            var min 			= 0;
		            var max 			= winHeight - bkgHeight;
		            var heightOverflow 	= moduleHeight < winHeight ? bkgHeight - moduleHeight : bkgHeight - winHeight;
		            moduleTop 			= moduleTop - heightOverflow;
		            moduleBottom 		= moduleBottom + heightOverflow;
		            var value 			= min + (max - min) * ( winCurrent - moduleTop ) / ( moduleBottom - moduleTop );

		            background.css( "background-position", "50% " + value + "px" );
		        }
		    });
		}
	};

	// Default Settings
	cmg.fn.cmgPageModules.defaults = {
		// Controls
		fullHeight: true,
		backgroundParallax: true,
		modules: {
			/* An array of Modules which need extra configuration. Ex:
			defaultModule: {
				seperator: true
				fullHeight: true, // Set either full height or height
				height: 250,
				css: { color: 'white' }
			}
			*/
		}
	};

}( jQuery ) );