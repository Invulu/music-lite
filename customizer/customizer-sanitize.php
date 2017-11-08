<?php
/**
 * Theme customizer sanitization
 *
 * @package Music Lite
 * @since Music Lite 1.0
 */

/**
 * Sanitize Categories.
 *
 * @param array $input Sanitizes user input.
 * @return array
 */
function music_lite_sanitize_categories( $input ) {
	$categories = get_terms( 'category', array( 'fields' => 'ids', 'get' => 'all' ) );

	if ( in_array( $input, $categories, true ) ) {
		return $input;
	} else {
		return '';
	}
}

/**
 * Sanitize Font Pairings
 *
 * @param array $input Sanitizes user input.
 * @return array
 */
function music_lite_sanitize_font_pairing( $input ) {
	$font_pairings = array(
		'oswald',
		'anton',
		'anton_noto_serif',
		'droid_serif',
		'montserrat',
		'merriweather',
		'raleway',
		'roboto_slab',
		'roboto',
		'playfair_display',
		'source_sans_pro',
		'quicksand',
		'lora',
		'helvetica_neue',
		'oswald_droid_serif',
		'montserrat_merriweather',
		'raleway_roboto_slab',
		'playfair_display_source_sans_pro',
		'quicksand_lora'
	);

	if ( in_array( $input, $font_pairings, true ) ) {
		return $input;
	} else {
		return '';
	}
}

/**
 * Sanitize Pages.
 *
 * @param array $input Sanitizes user input.
 * @return array
 */
function music_lite_sanitize_pages( $input ) {
	$pages = get_all_page_ids();

	if ( in_array( $input, $pages, true ) ) {
			return $input;
	} else {
		return '';
	}
}

/**
 * Sanitize Slideshow Transition Interval.
 *
 * @param array $input Sanitizes user input.
 * @return array
 */
function music_lite_sanitize_transition_interval( $input ) {
	 $valid = array(
			 '2000' 		=> esc_html__( '2 Seconds', 'music-lite' ),
			 '4000' 		=> esc_html__( '4 Seconds', 'music-lite' ),
			 '6000' 		=> esc_html__( '6 Seconds', 'music-lite' ),
			 '8000' 		=> esc_html__( '8 Seconds', 'music-lite' ),
			 '10000' 	=> esc_html__( '10 Seconds', 'music-lite' ),
			 '12000' 	=> esc_html__( '12 Seconds', 'music-lite' ),
			 '20000' 	=> esc_html__( '20 Seconds', 'music-lite' ),
			 '30000' 	=> esc_html__( '30 Seconds', 'music-lite' ),
			 '60000' 	=> esc_html__( '1 Minute', 'music-lite' ),
			 '999999999'	=> esc_html__( 'Hold Frame', 'music-lite' ),
	 );

	 if ( array_key_exists( $input, $valid ) ) {
			 return $input;
		} else {
			 return '';
		}
}

/**
 * Sanitize Slideshow Transition Style.
 *
 * @param array $input Sanitizes user input.
 * @return array
 */
function music_lite_sanitize_transition_style( $input ) {
	 $valid = array(
			 'fade' 		=> esc_html__( 'Fade', 'music-lite' ),
			 'slide' 	=> esc_html__( 'Slide', 'music-lite' ),
	 );

	 if ( array_key_exists( $input, $valid ) ) {
			 return $input;
		} else {
			 return '';
		}
}

/**
 * Sanitize Columns.
 *
 * @param array $input Sanitizes user input.
 * @return array
 */
function music_lite_sanitize_columns( $input ) {
	 $valid = array(
			 'one' 		=> esc_html__( 'One Column', 'music-lite' ),
			 'two' 		=> esc_html__( 'Two Columns', 'music-lite' ),
			 'three' 	=> esc_html__( 'Three Columns', 'music-lite' ),
			 'four' 	=> esc_html__( 'Four Columns', 'music-lite' ),
			 'five' 	=> esc_html__( 'Five Columns', 'music-lite' ),
	 );

	 if ( array_key_exists( $input, $valid ) ) {
			 return $input;
		} else {
			 return '';
		}
}

/**
 * Sanitize Alignment.
 *
 * @param array $input Sanitizes user input.
 * @return array
 */
function music_lite_sanitize_align( $input ) {
	 $valid = array(
			 'left' 		=> esc_html__( 'Left Align', 'music-lite' ),
			 'center' 		=> esc_html__( 'Center Align', 'music-lite' ),
			 'right' 	=> esc_html__( 'Right Align', 'music-lite' ),
	 );

	 if ( array_key_exists( $input, $valid ) ) {
			 return $input;
		} else {
			 return '';
		}
}

/**
 * Sanitize Colors.
 *
 * @param array $input Sanitizes user input.
 * @return array
 */
function music_lite_sanitize_title_color( $input ) {
	 $valid = array(
			 'black' 	=> esc_html__( 'Black', 'music-lite' ),
			 'white' 	=> esc_html__( 'White', 'music-lite' ),
	 );

	 if ( array_key_exists( $input, $valid ) ) {
			 return $input;
		} else {
			 return '';
		}
}

/**
 * Sanitize Checkboxes.
 *
 * @param array $input Sanitizes user input.
 * @return array
 */
function music_lite_sanitize_checkbox( $input ) {
	if ( 1 == $input ) {
		return 1;
	} else {
		return '';
	}
}

/**
 * Sanitize Text Input.
 *
 * @param array $input Sanitizes user input.
 * @return array
 */
function music_lite_sanitize_text( $input ) {
	 return wp_kses_post( force_balance_tags( $input ) );
}
