<?php
/**
 * Google Fonts Implementation
 *
 * @package Music Lite
 * @since Music Lite 1.0
 */

/**
 * Register Google Font URLs
 *
 * @since Music Lite 1.0
 */
function music_lite_fonts_url() {
	$fonts_url = '';

	/*
	Translators: If there are characters in your language that are not
	* supported by Lora, translate this to 'off'. Do not translate
	* into your own language.
	*/

	$roboto = _x( 'on', 'Roboto font: on or off', 'music-lite' );
	$roboto_slab = _x( 'on', 'Roboto Slab font: on or off', 'music-lite' );
	$raleway = _x( 'on', 'Raleway font: on or off', 'music-lite' );
	$open_sans = _x( 'on', 'Open Sans font: on or off', 'music-lite' );
	$montserrat = _x( 'on', 'Montserrat font: on or off', 'music-lite' );
	$merriweather = _x( 'on', 'Merriweather font: on or off', 'music-lite' );
	$droid_serif = _x( 'on', 'Droid Serif font: on or off', 'music-lite' );
	$oswald = _x( 'on', 'Oswald font: on or off', 'music-lite' );
	$playfair_display = _x( 'on', 'Playfair Display font: on or off', 'music-lite' );
	$source_sans_pro = _x( 'on', 'Source Sans Pro font: on or off', 'music-lite' );
	$quicksand = _x( 'on', 'Quicksand font: on or off', 'music-lite' );
	$lora = _x( 'on', 'Lora font: on or off', 'music-lite' );
	$anton = _x( 'on', 'Anton font: on or off', 'music-lite' );
	$noto_serif = _x( 'on', 'Noto Serif font: on or off', 'music-lite' );

	if ( 'off' !== $quicksand || 'off' !== $lora || 'off' !== $source_sans_pro || 'off' !== $playfair_display || 'off' !== $merriweather || 'off' !== $oswald || 'off' !== $raleway || 'off' !== $roboto || 'off' !== $roboto_slab || 'off' !== $open_sans || 'off' !== $montserrat || 'off' !== $droid_serif || 'off' !== $anton || 'off' !== $noto_serif ) {

		$font_families = array();

		if ( 'off' !== $raleway ) {
			$font_families[] = 'Raleway:400,200,300,800,700,500,600,900,100';
		}

		if ( 'off' !== $roboto ) {
			$font_families[] = 'Roboto:300,300i,400,400i,700,700i';
		}

		if ( 'off' !== $roboto_slab ) {
			$font_families[] = 'Roboto Slab:300,400,700';
		}

		if ( 'off' !== $open_sans ) {
			$font_families[] = 'Open Sans:400,300,600,700,800,800italic,700italic,600italic,400italic,300italic';
		}

		if ( 'off' !== $oswald ) {
			$font_families[] = 'Oswald:300,400,700';
		}

		if ( 'off' !== $montserrat ) {
			$font_families[] = 'Montserrat:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i';
		}

		if ( 'off' !== $merriweather ) {
			$font_families[] = 'Merriweather:300,300i,400,400i,700,700i';
		}

		if ( 'off' !== $playfair_display ) {
			$font_families[] = 'Playfair Display:400,400i,700,700i';
		}

		if ( 'off' !== $source_sans_pro ) {
			$font_families[] = 'Source Sans Pro:300,300i,400,400i,700,700i';
		}

		if ( 'off' !== $droid_serif ) {
			$font_families[] = 'Droid Serif:400,400i,700,700i';
		}

		if ( 'off' !== $quicksand ) {
			$font_families[] = 'Quicksand:300,400,700';
		}

		if ( 'off' !== $lora ) {
			$font_families[] = 'Lora:400,400i,700,700i';
		}

		if ( 'off' !== $anton ) {
			$font_families[] = 'Anton';
		}

		if ( 'off' !== $noto_serif ) {
			$font_families[] = 'Noto Serif:400,400i,700,700i';
		}

		$query_args = array(
			'family' => urlencode( implode( '|', $font_families ) ),
			'subset' => urlencode( 'latin,latin-ext' ),
		);

		$fonts_url = add_query_arg( $query_args, '//fonts.googleapis.com/css' );
	}

	return esc_url_raw( $fonts_url );
}

/**
 * Enqueue Google Fonts on Front End
 *
 * @since Music Lite 1.0
 */
function music_lite_scripts_styles() {
	wp_enqueue_style( 'music-fonts', music_lite_fonts_url(), array(), null );
}
add_action( 'wp_enqueue_scripts', 'music_lite_scripts_styles' );

/**
 * Add Google Scripts for use with the editor
 *
 * @since Music Lite 1.0
 */
function music_lite_editor_styles() {
	add_editor_style( array( 'style.css', music_lite_fonts_url() ) );
}
add_action( 'after_setup_theme', 'music_lite_editor_styles' );
