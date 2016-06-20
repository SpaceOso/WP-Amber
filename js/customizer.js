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
	//info header
	wp.customize('info_header', function( value ) {
		value.bind( function( to ) {
			$( '.info h2' ).text( to );
		} );
	});
	//info paragraph
	wp.customize('info_paragraph', function( value ) {
		value.bind( function( to ) {
			$( '#info-paragraph' ).text( to );
		} );
	});
	/*======================================
	 portfolio
	 ======================================*/
	wp.customize('portfolio_header', function( value ) {
		value.bind( function( to ) {
			$( '#portfolio-header' ).text( to );
		} );
	});
	//info paragraph
	wp.customize('portfolio_desc', function( value ) {
		value.bind( function( to ) {
			$( '#portfolio-desc' ).text( to );
		} );
	});

	//portfolio-bg
	wp.customize('portfolio_bg', function( value ) {
		value.bind( function( to ) {
			to = "url(" + to + ")";
			$( '.portfolio' ).css({
				'background-image' : to
			});
		} );
	});
	/*======================================
	 	features
	 ======================================*/
	//features header
	wp.customize('features_header', function( value ) {
		value.bind( function( to ) {
			$( '#features-header' ).text( to );
		} );
	});
	/*======================================
		 quotes
	 ======================================*/
	//portfolio-bg
	wp.customize('quote_bg_setting', function( value ) {
		value.bind( function( to ) {
			to = "url(" + to + ")";
			$( '.quote' ).css({
				'background-image' : to
			});
		} );
	});
	/*======================================
	 	footer
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
