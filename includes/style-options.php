<?php
/**
 * This template is used to manage style options.
 *
 * @package Music Lite
 * @since Music Lite 1.0
 */

/**
 * Changes styles upon user defined options.
 */
function music_lite_custom_styles() {

	$header_image = get_header_image();
	$display_title = get_theme_mod( 'music_lite_site_title', '1' );
	$display_tagline = get_theme_mod( 'music_lite_site_tagline', '1' );
	$nav_bg = get_theme_mod( 'music_lite_colors_nav', '#000000' );
	$sidebar_bg = get_theme_mod( 'music_lite_colors_sidebar', '#000000' );
	$footer_bg = get_theme_mod( 'music_lite_colors_footer', '#000000' );
	$link_color = get_theme_mod( 'music_lite_colors_links', '#cc00cc' );
	$link_hover_color = get_theme_mod( 'music_lite_colors_links_hover', '#ff33cc' );
	$heading_link_color = get_theme_mod( 'music_lite_colors_heading_links', '#ffffff' );
	$heading_link_hover_color = get_theme_mod( 'music_lite_colors_heading_links_hover', '#ff33cc' );
	$button_color = get_theme_mod( 'music_lite_colors_button', '#cc00cc' );
	$button_hover_color = get_theme_mod( 'music_lite_colors_button_hover', '#ff33cc' );
	$font_pairing = get_theme_mod( 'music_lite_fonts', 'anton_noto_serif' );
	$title_font = get_theme_mod( 'music_lite_title_font', 'montserrat' );
	?>

	<style>

	#wrapper .post-area {
		background-color: #<?php echo get_theme_mod( 'background_color', '111111' ); ?> ;
	}

	.wp-custom-header {
		<?php if ( ! empty( $header_image ) ) { ?>
			background-image: url('<?php header_image(); ?>');
		<?php } ?>
	}

	#wrapper .site-title {
		<?php
		if ( '1' != $display_title ) {
			echo
			'position: absolute;
			text-indent: -9999px;
			margin: 0px;
			padding: 0px;';
		};
		?>
	}

	#wrapper .site-description {
		<?php
		if ( '1' != $display_tagline ) {
			echo
			'position: absolute;
			left: -9999px;
			margin: 0px;
			padding: 0px;';
		};
		?>
	}

	#wrapper #nav-bar, #wrapper .menu ul.sub-menu, #wrapper .menu ul.children {
		<?php
		if ( $nav_bg ) {
			echo 'background-color: ' .esc_html( $nav_bg ). ';';
		};
		?>
	}

	#wrapper .footer {
		<?php
		if ( $footer_bg ) {
			echo 'background-color: ' .esc_html( $footer_bg ). ';';
		};
		?>
	}

	#wrapper .sidebar {
		<?php
		if ( $sidebar_bg ) {
			echo 'background-color: ' .esc_html( $sidebar_bg ). ';';
		};
		?>
	}

	.container a, .container a:link, .container a:visited, .footer-widgets a, .footer-widgets a:link, .footer-widgets a:visited,
	a.link-email, a.link-email:link, a.link-email:visited, a.link-phone, a.link-phone:link, a.link-phone:visited,
	#wrapper .widget ul.menu li a, #wrapper .widget ul.menu li a:link, #wrapper .widget ul.menu li a:visited,
	#wrapper .widget ul.menu li ul.sub-menu li a, #wrapper .widget ul.menu li ul.sub-menu li a:link, #wrapper .widget ul.menu li ul.sub-menu li a:visited {
		<?php
		if ( $link_color ) {
			echo 'color: ' .esc_html( $link_color ). ';';
		};
		?>
	}

	.container a:hover, .container a:focus, .container a:active, .footer-widgets a:hover, footer-widgets a:focus, footer-widgets a:active,
	a.link-email:hover, a.link-email:focus, a.link-email:active, a.link-phone:hover, a.link-phone:focus, a.link-phone:active,
	#wrapper .widget ul.menu li a:hover, #wrapper .widget ul.menu li a:focus, #wrapper .widget ul.menu li a:active,
	#wrapper .widget ul.menu li ul.sub-menu li a:hover, #wrapper .widget ul.menu li ul.sub-menu li a:focus, #wrapper .widget ul.menu li ul.sub-menu li a:active,
	#wrapper .widget ul.menu .current_page_item a, #wrapper .widget ul.menu .current-menu-item a {
		<?php
		if ( $link_hover_color ) {
			echo 'color: ' .esc_html( $link_hover_color ). ';';
		};
		?>
	}

	.container h1 a, .container h2 a, .container h3 a, .container h4 a, .container h5 a, .container h6 a,
	.container h1 a:link, .container h2 a:link, .container h3 a:link, .container h4 a:link, .container h5 a:link, .container h6 a:link,
	.container h1 a:visited, .container h2 a:visited, .container h3 a:visited, .container h4 a:visited, .container h5 a:visited, .container h6 a:visited {
		<?php
		if ( $heading_link_color ) {
			echo 'color: ' .esc_html( $heading_link_color ). ';';
		};
		?>
	}

	.container h1 a:hover, .container h2 a:hover, .container h3 a:hover, .container h4 a:hover, .container h5 a:hover, .container h6 a:hover,
	.container h1 a:focus, .container h2 a:focus, .container h3 a:focus, .container h4 a:focus, .container h5 a:focus, .container h6 a:focus,
	.container h1 a:active, .container h2 a:active, .container h3 a:active, .container h4 a:active, .container h5 a:active, .container h6 a:active {
		<?php
		if ( $heading_link_hover_color ) {
			echo 'color: ' .esc_html( $heading_link_hover_color ). ';';
		};
		?>
	}

	.container button, .button, a.button, a:link.button, a:visited.button, a.more-link, a:link.more-link, a:visited.more-link,
	.container .reply a, #searchsubmit, #prevLink a, #nextLink a, input#submit, #wrapper input[type='submit'],
	.woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button {
		<?php
		if ( $button_color ) {
			echo 'background-color: ' .esc_html( $button_color ). ';';
		};
		?>
	}

	.container button:hover, .container button:focus, .container button:active, .button:hover, a:hover.button, a:focus.button, a:active.button,
	a:hover.more-link, a:focus.more-link, a:active.more-link, .container .reply a:hover, #searchsubmit:hover, #prevLink a:hover,
	#nextLink a:hover, input#submit:hover, #wrapper input[type='submit']:hover, .gallery a:hover,
	.woocommerce #respond input#submit:hover, .woocommerce a.button:hover, .woocommerce button.button:hover, .woocommerce input.button:hover {
		<?php
		if ( $button_hover_color ) {
			echo 'background-color: ' .esc_html( $button_hover_color ). ';';
		};
		?>
	}

	<?php
	$fonts = array( 0 => array(), 1 => array(), 2 => array() );
	switch ( $font_pairing ) {
		case 'anton_noto_serif':
			$fonts[0]['font'] = "font-family: 'Anton', sans-serif;";
			$fonts[1]['font'] = "font-family: 'Noto Serif', serif;";
			break;
		case 'oswald_droid_serif':
			$fonts[0]['font'] = "font-family: 'Oswald', 'Helvetica Neue', sans-serif;";
			$fonts[1]['font'] = "font-family: 'Droid Serif', serif;";
			break;
		case 'montserrat_merriweather':
			$fonts[0]['font'] = "font-family: 'Montserrat', sans-serif;";
			$fonts[1]['font'] = "font-family: 'Merriweather', serif;";
			break;
		case 'raleway_roboto_slab':
			$fonts[0]['font'] = "font-family: 'Raleway', sans-serif;";
			$fonts[1]['font'] = "font-family: 'Roboto Slab', serif;";
			break;
		case 'playfair_display_source_sans_pro':
			$fonts[0]['font'] = "font-family: 'Playfair Display', serif;";
			$fonts[1]['font'] = "font-family: 'Source Sans Pro', sans-serif;";
			break;
		case 'quicksand_lora':
			$fonts[0]['font'] = "font-family: 'Quicksand', sans-serif;";
			$fonts[1]['font'] = "font-family: 'Lora', serif;";
			break;
		default:
			$fonts[0]['font'] = "font-family: 'Helvetica Neue', Arial, sans-serif;";
			$fonts[1]['font'] = "font-family: 'Helvetica Neue', Arial, sans-serif;";
			break;
	}

	switch ( $title_font ) {
		case 'anton':
			$fonts[2]['font'] = "font-family: 'Anton', sans-serif;";
			break;
		case 'oswald':
			$fonts[2]['font'] = "font-family: 'Oswald', sans-serif;";
			break;
		case 'droid_serif':
			$fonts[2]['font'] = "font-family: 'Droid Serif', serif;";
			break;
		case 'montserrat':
			$fonts[2]['font'] = "font-family: 'Montserrat', sans-serif;";
			break;
		case 'merriweather':
			$fonts[2]['font'] = "font-family: 'Merriweather', serif;";
			break;
		case 'raleway':
			$fonts[2]['font'] = "font-family: 'Raleway', sans-serif;";
			break;
		case 'roboto_slab':
			$fonts[2]['font'] = "font-family: 'Roboto Slab', serif;";
			break;
		case 'playfair_display':
			$fonts[2]['font'] = "font-family: 'Playfair Display', serif;";
			break;
		case 'source_sans_pro':
			$fonts[2]['font'] = "font-family: 'Source Sans Pro', sans-serif;";
			break;
		case 'quicksand':
			$fonts[2]['font'] = "font-family: 'Quicksand', sans-serif;";
			break;
		case 'lora':
			$fonts[2]['font'] = "font-family: 'Lora', serif;";
			break;
		default:
			$fonts[2]['font'] = "font-family: 'Helvetica Neue', Arial, sans-serif;";
			break;
	}
	?>

	h1, h2, h3, h4, h5, h6, .site-description {
		<?php if ( $fonts[0]['font'] ) echo $fonts[0]['font']; ?>
	}
	body, .pagination, table {
		<?php if ( $fonts[1]['font'] ) echo $fonts[1]['font']; ?>
	}
	.site-title {
		<?php if ( $fonts[2]['font'] ) echo $fonts[2]['font']; ?>
	}

	</style>

	<?php
}
add_action( 'wp_head', 'music_lite_custom_styles', 100 );
