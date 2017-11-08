( function( $ ) {

	"use strict";

	/**
	 * Real-time preview of the site title and description text.
	 */
	wp.customize( 'blogname', function( value ) {
		value.bind( function( to ) {
			$( '.site-title a' ).html( to );
		} );
	} );
	wp.customize( 'blogdescription', function( value ) {
		value.bind( function( to ) {
			$( '.site-description' ).html( to );
		} );
	} );

	/**
	 * Real-time preview of the footer site information text.
	 */
	wp.customize( 'music_lite_footer_text', function( value ) {
		value.bind( function( to ) {
			$( '.footer-site-info' ).html( to );
		} );
	} );

	/**
	 * Real-time preview of the site title.
	 */
	wp.customize( 'music_lite_site_title', function( value ) {
		value.bind( function( to ) {
			if ( '1' != to ) {
				$( '.site-title' ).css( {
					'padding' : '0',
					'text-indent' : '-9999px',
					'position': 'absolute'
				} );
			} else {
				$( '.site-title' ).css( {
					'padding' : '24px 12px',
					'text-indent' : '0',
					'position': 'relative'
				} );
			}
		} );
	} );

	/**
	 * Real-time preview of the site tagline.
	 */
	wp.customize( 'music_lite_site_tagline', function( value ) {
		value.bind( function( to ) {
			if ( '1' != to ) {
				$( '.site-description' ).css( {
					'padding' : '0',
					'left' : '-9999px',
					'position': 'absolute'
				} );
			} else {
				$( '.site-description' ).css( {
					'padding' : '12px',
					'left' : '0',
					'position': 'relative'
				} );
			}
		} );
	} );

	/**
	 * Real-time preview of the navigation menu background color.
	 */
	wp.customize( 'music_lite_colors_nav', function( value ) {
		value.bind( function( to ) {
			$('#nav-bar, .menu ul.sub-menu, .menu ul.children').css('background-color', to );
			$('#nav-bar').bgBrightness();
		} );
	} );

	/**
	 * Real-time preview of the sidebar background color.
	 */
	wp.customize( 'music_lite_colors_sidebar', function( value ) {
		value.bind( function( to ) {
			$('.sidebar').css('background-color', to );
			if ( $('.sidebar').length ) {
				$('.sidebar').bgBrightness();
			}
		} );
	} );

	/**
	 * Real-time preview of the footer background color.
	 */
	wp.customize( 'music_lite_colors_footer', function( value ) {
		value.bind( function( to ) {
			$('.footer').css('background-color', to );
			$('.footer').bgBrightness();
		} );
	} );

	/**
	 * Real-time preview of the link color.
	 */
	wp.customize( 'music_lite_colors_links', function( value ) {
		value.bind( function( to ) {
			$('.container p a, .container li a, .container table a').css('color', to );
		} );
	} );

	/**
	 * Real-time preview of the heading link color.
	 */
	wp.customize( 'music_lite_colors_heading_links', function( value ) {
		value.bind( function( to ) {
			$('.container h1 a, .container h2 a, .container h3 a, .container h4 a, .container h5 a, .container h6 a').css('color', to );
		} );
	} );

	/**
	 * Real-time preview of the button background color.
	 */
	wp.customize( 'music_lite_colors_button', function( value ) {
		value.bind( function( to ) {
			$('.container button, .button, a.more-link, .reply a, #searchsubmit, #prevLink a, #nextLink a, input#submit').css('background-color', to );
		} );
	} );

})( jQuery );
