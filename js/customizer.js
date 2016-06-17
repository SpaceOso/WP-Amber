/**
 * File customizer.js.
 *
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */

( function( $ ) {
	/*======================================
	 Company Info
	 ======================================*/
	//email info
	wp.customize('email_setting', function( value ) {
		value.bind( function( to ) {
			$( '#footer-email' ).text( to );
		} );
	});
	//phone number
	wp.customize('phone_setting', function( value ) {
		value.bind( function( to ) {
			$( '#footer-phone' ).text( to );
		} );
	});
	// Site address and description.
	wp.customize( 'address_setting', function( value ) {
		value.bind( function( to ) {
			$( '#footer-address' ).text( to );
		} );
	} );

	// Site title and description.
	wp.customize( 'blogname', function( value ) {
		value.bind( function( to ) {
			$( '.site-title a' ).text( to );
		} );
	} );
	wp.customize( 'blogdescription', function( value ) {
		value.bind( function( to ) {
			$( '.site-description' ).text( to );
		} );
	} );

	// Header text color.
	wp.customize( 'header_textcolor', function( value ) {
		value.bind( function( to ) {
			if ( 'blank' === to ) {
				$( '.site-title a, .site-description' ).css( {
					'clip': 'rect(1px, 1px, 1px, 1px)',
					'position': 'absolute'
				} );
			} else {
				$( '.site-title a, .site-description' ).css( {
					'clip': 'auto',
					'position': 'relative'
				} );
				$( '.site-title a, .site-description' ).css( {
					'color': to
				} );
			}
		} );
	} );
} )( jQuery );
