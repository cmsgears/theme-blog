// URL Params ------------------------------------------------

String.prototype.urlParams=function(e,t){var n;var r="";var i=$("<a />").attr("href",this)[0];var s,o=/\+/g,u=/([^&=]+)=?([^&]*)/g,a=function(e){return decodeURIComponent(e.replace(o," "))},f=i.search.substring(1);n={};while(s=u.exec(f))n[a(s[1])]=a(s[2]);if(!e&&!t){return n}else if(e&&!t){return n[e]}else{n[e]=t;var l=[];for(var c in n){l.push(encodeURIComponent(c)+"="+encodeURIComponent(n[c]))}if(l.length>0){r="?"+l.join("&")}return i.origin+i.pathname+r}}


// Header Transition -----------------------------------------

function registerHeaderChange() {

    window.addEventListener( 'scroll', function( e ) {

        var distanceY		= window.pageYOffset || document.documentElement.scrollTop;
        var smallDistance 	= 300;
		var header 			= jQuery( "#header" );

        if ( distanceY > smallDistance ) {

            header.addClass( "header-small" );
        } 
        else {

            if ( header.hasClass( "header-small" ) ) {

                header.removeClass( "header-small" );
            }
        }
    });
}

// Smooth Scroll using anchor ---------------------------------

function initSmoothScroll( selector ) {

	jQuery( selector ).on('click',function ( e ) {

	    e.preventDefault();

	    var targetId 	= this.hash;
	    var target 		= jQuery( targetId );

	    jQuery('html, body').stop().animate(
	    	{ 'scrollTop': ( target.offset().top ) }, 
	    	900, 
	    	'swing', 
	    	function () {

		        window.location.hash = targetId;
	    	}
	    );
	});
}

// B-popup ---------------------------------------------------

/* Show popup */
function showPopup( popupSelector ) {

	jQuery( popupSelector ).bPopup({
	    modalClose: false,
	    opacity: 0.6,
	    positionStyle: 'fixed' //'fixed' or 'absolute'
	});	
}

/* Close popup */
function closePopup( popupSelector ) {

	jQuery( popupSelector ).bPopup().close();
}

/* Show default error popup */
function showErrorPopup( errors ) {

	jQuery( "#error-popup .popup-elements" ).html( errors );

	showPopup( "#error-popup" );
}

function hideErrorPopup() {

	closePopup( "#error-popup" );
}

/* Show default message popup */
function showMessagePopup( message ) {

	jQuery( "#message-popup .popup-elements" ).html( message );

	showPopup( "#message-popup" );
}

function hideMessagePopup() {

	closePopup( "#message-popup" );
}