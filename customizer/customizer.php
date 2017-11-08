<?php
/**
 * Theme customizer with real-time update
 *
 * Very helpful: http://ottopress.com/2012/theme-customizer-part-deux-getting-rid-of-options-pages/
 *
 * @package Music Lite
 * @since Music Lite 1.0
 */

/**
 * Begin the customizer functions.
 *
 * @param array $wp_customize Returns classes and sanitized inputs.
 */
function music_lite_theme_customizer( $wp_customize ) {

	include( get_template_directory() . '/customizer/customizer-controls.php');

	include( get_template_directory() . '/customizer/customizer-sanitize.php');

	/**
	 * Render the site title for the selective refresh partial.
	 *
	 * @since Music Lite 1.0
	 * @see music_lite_customize_register()
	 *
	 * @return void
	 */
	function music_lite_customize_partial_blogname() {
		bloginfo( 'name' );
	}

	/**
	 * Render the site tagline for the selective refresh partial.
	 *
	 * @since Music Lite 1.0
	 * @see music_lite_customize_register()
	 *
	 * @return void
	 */
	function music_lite_customize_partial_blogdescription() {
		bloginfo( 'description' );
	}

	// Set site name and description text to be previewed in real-time.
	$wp_customize->get_setting( 'blogname' )->transport = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial( 'blogname', array(
			'selector' => '.site-title a',
			'container_inclusive' => false,
			'render_callback' => 'music_lite_customize_partial_blogname',
		) );
		$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
			'selector' => '.site-description',
			'container_inclusive' => false,
			'render_callback' => 'music_lite_customize_partial_blogdescription',
		) );
	}

	/*
	-------------------------------------------------------------------------------------------------------
		Site Title Section
	-------------------------------------------------------------------------------------------------------
	*/

		// Title Font Selector
		$wp_customize->add_setting( 'music_lite_title_font', array(
			'default' => 'montserrat',
			'sanitize_callback' => 'music_lite_sanitize_font_pairing',
		) );
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'music_lite_title_font', array(
			'type'	=> 'select',
			'label' => esc_html__( 'Title Font', 'music-lite' ),
			'section' => 'title_tagline',
			'choices' => array(
				'droid_serif' 		=> __( 'Droid Serif', 'music-lite' ),
				'helvetica_neue'				=> __( 'Helvetica Neue', 'music-lite' ),
				'lora' 	=> __( 'Lora', 'music-lite' ),
				'merriweather' 	=> __( 'Merriweather', 'music-lite' ),
				'montserrat' 	=> __( 'Montserrat', 'music-lite' ),
				'oswald' 		=> __( 'Oswald', 'music-lite' ),
				'playfair_display' 	=> __( 'Playfair Display', 'music-lite' ),
				'quicksand' 	=> __( 'Quicksand', 'music-lite' ),
				'raleway' 	=> __( 'Raleway', 'music-lite' ),
				'roboto' 	=> __( 'Roboto', 'music-lite' ),
				'roboto_slab' 	=> __( 'Roboto Slab', 'music-lite' ),
				'source_sans_pro' 	=> __( 'Source Sans Pro', 'music-lite' ),
			),
			'priority' => 10,
		) ) );

		// Custom Display Site Title Option.
		$wp_customize->add_setting( 'music_lite_site_title', array(
			'default'						=> '1',
			'sanitize_callback'	=> 'music_lite_sanitize_checkbox',
			'transport'					=> 'postMessage',
		) );
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'music_lite_site_title', array(
			'label'			=> esc_html__( 'Display Site Title', 'music-lite' ),
			'type'			=> 'checkbox',
			'section'		=> 'title_tagline',
			'settings'	=> 'music_lite_site_title',
			'priority'	=> 10,
		) ) );

		// Custom Display Tagline Option.
		$wp_customize->add_setting( 'music_lite_site_tagline', array(
			'default'						=> '1',
			'sanitize_callback'	=> 'music_lite_sanitize_checkbox',
			'transport'					=> 'postMessage',
		) );
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'music_lite_site_tagline', array(
			'label'			=> esc_html__( 'Display Site Tagline', 'music-lite' ),
			'type'			=> 'checkbox',
			'section'		=> 'title_tagline',
			'settings'	=> 'music_lite_site_tagline',
			'priority'	=> 12,
		) ) );

		// Custom Display Logo Option.
		$wp_customize->add_setting( 'music_lite_site_logo', array(
			'default'						=> '1',
			'sanitize_callback'	=> 'music_lite_sanitize_checkbox',
			'transport'					=> 'postMessage',
		) );
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'music_lite_site_logo', array(
			'label'			=> esc_html__( 'Display Logo In Header', 'music-lite' ),
			'type'			=> 'checkbox',
			'section'		=> 'title_tagline',
			'settings'	=> 'music_lite_site_logo',
			'priority'	=> 14,
		) ) );

		// Logo Align.
		$wp_customize->add_setting( 'music_lite_logo_align', array(
				'default' 					=> 'left',
				'sanitize_callback'	=> 'music_lite_sanitize_align',
		) );
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'music_lite_logo_align', array(
				'type'			=> 'radio',
				'label' 		=> esc_html__( 'Logo & Title Alignment', 'music-lite' ),
				'section' 	=> 'title_tagline',
				'choices' 	=> array(
						'left' 		=> esc_html__( 'Left Align', 'music-lite' ),
						'center' 	=> esc_html__( 'Center Align', 'music-lite' ),
						'right' 	=> esc_html__( 'Right Align', 'music-lite' ),
				),
				'priority' => 20,
		) ) );

		// Site Description Align.
		$wp_customize->add_setting( 'music_lite_desc_align', array(
			'default'						=> 'center',
			'sanitize_callback'	=> 'music_lite_sanitize_align',
		) );
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'music_lite_desc_align', array(
			'type' 		=> 'radio',
			'label' 	=> esc_html__( 'Site Description Alignment', 'music-lite' ),
			'section' => 'title_tagline',
			'choices' => array(
				'left' 		=> esc_html__( 'Left Align', 'music-lite' ),
				'center' 	=> esc_html__( 'Center Align', 'music-lite' ),
				'right' 	=> esc_html__( 'Right Align', 'music-lite' ),
			),
			'priority' => 25,
		) ) );

		/*
		-------------------------------------------------------------------------------------------------------
			Colors Section
		-------------------------------------------------------------------------------------------------------
		*/

		// Nav Background.
		$wp_customize->add_setting( 'music_lite_colors_nav', array(
			'default'						=> '#000000',
			'sanitize_callback'	=> 'sanitize_hex_color',
			'transport'					=> 'postMessage',
		) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'music_lite_colors_nav', array(
			'label'			=> esc_html__( 'Menu Background Color', 'music-lite' ),
			'section'		=> 'colors',
			'settings'	=> 'music_lite_colors_nav',
			'priority'	=> 10,
		) ) );

		// Sidebar Background Color.
		$wp_customize->add_setting( 'music_lite_colors_sidebar', array(
			'default'						=> '#000000',
			'sanitize_callback'	=> 'sanitize_hex_color',
			'transport'					=> 'postMessage',
		) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'music_lite_colors_sidebar', array(
			'label'			=> esc_html__( 'Sidebar Background Color', 'music-lite' ),
			'section'		=> 'colors',
			'settings'	=> 'music_lite_colors_sidebar',
			'priority'	=> 20,
		) ) );

		// Footer Background Color.
		$wp_customize->add_setting( 'music_lite_colors_footer', array(
			'default'						=> '#000000',
			'sanitize_callback'	=> 'sanitize_hex_color',
			'transport'					=> 'postMessage',
		) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'music_lite_colors_footer', array(
			'label'			=> esc_html__( 'Footer Background Color', 'music-lite' ),
			'section'		=> 'colors',
			'settings'	=> 'music_lite_colors_footer',
			'priority'	=> 30,
		) ) );

		// Link Color.
		$wp_customize->add_setting( 'music_lite_colors_links', array(
			'default'						=> '#cc00cc',
			'sanitize_callback'	=> 'sanitize_hex_color',
			'transport'					=> 'postMessage',
		) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'music_lite_colors_links', array(
			'label'			=> esc_html__( 'Link Color', 'music-lite' ),
			'section'		=> 'colors',
			'settings'	=> 'music_lite_colors_links',
			'priority'	=> 40,
		) ) );

		// Link Hover Color.
		$wp_customize->add_setting( 'music_lite_colors_links_hover', array(
			'default'						=> '#ff33cc',
			'sanitize_callback'	=> 'sanitize_hex_color',
		) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'music_lite_colors_links_hover', array(
			'label'			=> esc_html__( 'Link Hover Color', 'music-lite' ),
			'section'		=> 'colors',
			'settings'	=> 'music_lite_colors_links_hover',
			'priority'	=> 50,
		) ) );

		// Heading Link Color.
		$wp_customize->add_setting( 'music_lite_colors_heading_links', array(
			'default'						=> '#ffffff',
			'sanitize_callback'	=> 'sanitize_hex_color',
			'transport'					=> 'postMessage',
		) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'music_lite_colors_heading_links', array(
			'label'			=> esc_html__( 'Heading Link Color', 'music-lite' ),
			'section'		=> 'colors',
			'settings'	=> 'music_lite_colors_heading_links',
			'priority'	=> 60,
		) ) );

		// Heading Link Hover Color.
		$wp_customize->add_setting( 'music_lite_colors_heading_links_hover', array(
			'default' 					=> '#ff33cc',
			'sanitize_callback'	=> 'sanitize_hex_color',
		) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'music_lite_colors_heading_links_hover', array(
			'label'			=> esc_html__( 'Heading Link Hover Color', 'music-lite' ),
			'section'		=> 'colors',
			'settings'	=> 'music_lite_colors_heading_links_hover',
			'priority'	=> 70,
		) ) );

		// Button Color.
		$wp_customize->add_setting( 'music_lite_colors_button', array(
			'default'						=> '#cc00cc',
			'sanitize_callback'	=> 'sanitize_hex_color',
			'transport'					=> 'postMessage',
		) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'music_lite_colors_button', array(
			'label'			=> esc_html__( 'Button Color', 'music-lite' ),
			'section'		=> 'colors',
			'settings'	=> 'music_lite_colors_button',
			'priority'	=> 80,
		) ) );

		// Button Hover Color.
		$wp_customize->add_setting( 'music_lite_colors_button_hover', array(
			'default'						=> '#ff33cc',
			'sanitize_callback'	=> 'sanitize_hex_color',
		) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'music_lite_colors_button_hover', array(
			'label'			=> esc_html__( 'Button Hover Color', 'music-lite' ),
			'section'		=> 'colors',
			'settings'	=> 'music_lite_colors_button_hover',
			'priority'	=> 90,
		) ) );

		/*
		-------------------------------------------------------------------------------------------------------
			Theme Options Panel
		-------------------------------------------------------------------------------------------------------
		*/

		$wp_customize->add_panel( 'music_lite_theme_options', array(
			'priority'				=> 1,
			'capability'			=> 'edit_theme_options',
			'theme_supports'	=> '',
			'title'						=> esc_html__( 'Theme Options', 'music-lite' ),
			'description'			=> esc_html__( 'This panel allows you to customize specific areas of the theme.', 'music-lite' ),
		) );

	//-------------------------------------------------------------------------------------------------------------------//
	// Contact Section
	//-------------------------------------------------------------------------------------------------------------------//

	$wp_customize->add_section( 'music_lite_contact_section' , array(
		'title'       => esc_html__( 'Contact Info', 'organic-business' ),
		'priority'    => 90,
		'panel' => 'music_lite_theme_options',
	) );

		// Contact Email
		$wp_customize->add_setting( 'music_lite_contact_email', array(
			'default' => 'info@myband.com',
			'sanitize_callback' => 'sanitize_email',
		) );
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'music_lite_contact_email', array(
			'label'		=> esc_html__( 'Email Address', 'organic-business' ),
			'section'	=> 'music_lite_contact_section',
			'settings'	=> 'music_lite_contact_email',
			'type'		=> 'text',
			'priority' => 20,
		) ) );

		// Contact Phone
		$wp_customize->add_setting( 'music_lite_contact_phone', array(
			'default' => '941.123.4567',
			'sanitize_callback' => 'music_lite_sanitize_text',
		) );
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'music_lite_contact_phone', array(
			'label'		=> esc_html__( 'Phone Number', 'organic-business' ),
			'section'	=> 'music_lite_contact_section',
			'settings'	=> 'music_lite_contact_phone',
			'type'		=> 'text',
			'priority' => 40,
		) ) );

		/*
		-------------------------------------------------------------------------------------------------------
			Page Templates Section
		-------------------------------------------------------------------------------------------------------
		*/

		$wp_customize->add_section( 'music_lite_templates_section' , array(
			'title'			=> esc_html__( 'Page Template Options', 'music-lite' ),
			'priority'	=> 100,
			'panel'			=> 'music_lite_theme_options',
		) );

		// Featured Link
		$wp_customize->add_setting( 'music_lite_home_link', array(
			'default' => '',
			'sanitize_callback' => 'music_lite_sanitize_text',
		) );
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'music_lite_home_link', array(
			'label'		=> esc_html__( 'Home Featured Link', 'organic-business' ),
			'section'	=> 'music_lite_templates_section',
			'settings'	=> 'music_lite_home_link',
			'type'		=> 'text',
			'priority' => 20,
		) ) );

		// Featured Link Text
		$wp_customize->add_setting( 'music_lite_home_link_text', array(
			'default' => 'Learn More',
			'sanitize_callback' => 'music_lite_sanitize_text',
		) );
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'music_lite_home_link_text', array(
			'label'		=> esc_html__( 'Home Featured Link Text', 'organic-business' ),
			'section'	=> 'music_lite_templates_section',
			'settings'	=> 'music_lite_home_link_text',
			'type'		=> 'text',
			'priority' => 40,
		) ) );

		// Project Category.
		$wp_customize->add_setting( 'music_lite_project_category', array(
			'default' => '1',
			'sanitize_callback' => 'music_lite_sanitize_categories',
		) );
		$wp_customize->add_control( new Music_Lite_Category_Dropdown_Control( $wp_customize, 'music_lite_project_category', array(
			'type'	=> 'dropdown-categories',
			'label' => esc_html__( 'Portfolio Template Category', 'music-lite' ),
			'section' => 'music_lite_templates_section',
			'settings'	=> 'music_lite_project_category',
			'priority' => 60,
		) ) );

		// Testimonials Category.
		$wp_customize->add_setting( 'music_lite_testimonial_category', array(
			'default' => '1',
			'sanitize_callback' => 'music_lite_sanitize_categories',
		) );
		$wp_customize->add_control( new Music_Lite_Category_Dropdown_Control( $wp_customize, 'music_lite_testimonial_category', array(
			'type'	=> 'dropdown-categories',
			'label' => esc_html__( 'Testimonials Template Category', 'music-lite' ),
			'section' => 'music_lite_templates_section',
			'settings'	=> 'music_lite_testimonial_category',
			'priority' => 80,
		) ) );

		/*
		-------------------------------------------------------------------------------------------------------
			Fonts
		-------------------------------------------------------------------------------------------------------
		*/

		$wp_customize->add_section( 'music_lite_fonts_section' , array(
			'title'			=> esc_html__( 'Fonts', 'music-lite' ),
			'priority'	=> 101,
			'panel'			=> 'music_lite_theme_options',
		) );

		// Font Selector
		$wp_customize->add_setting( 'music_lite_fonts', array(
			'default' => 'anton_noto_serif',
			'sanitize_callback' => 'music_lite_sanitize_font_pairing',
		) );
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'music_lite_fonts', array(
			'type'	=> 'select',
			'label' => esc_html__( 'Font Pairing', 'music-lite' ),
			'section' => 'music_lite_fonts_section',
			'choices' => array(
				'anton_noto_serif' 	=> __( 'Anton + Noto Serif', 'music-lite' ),
				'montserrat_merriweather' 	=> __( 'Montserrat + Merriweather', 'music-lite' ),
				'helvetica_neue'				=> __( 'Helvetica Neue', 'music-lite' ),
				'oswald_droid_serif' 		=> __( 'Oswald + Droid Serif', 'music-lite' ),
				'raleway_roboto_slab' 	=> __( 'Raleway + Roboto Slab', 'music-lite' ),
				'playfair_display_source_sans_pro' 	=> __( 'Playfair Display + Source Sans Pro', 'music-lite' ),
				'quicksand_lora' 	=> __( 'Quicksand + Lora', 'music-lite' ),
			),
			'priority' => 40,
		) ) );

		/*
		-------------------------------------------------------------------------------------------------------
			Slideshow Section
		-------------------------------------------------------------------------------------------------------
		*/

		$wp_customize->add_section( 'music_lite_slider_section' , array(
			'title'			=> esc_html__( 'Slideshow Settings', 'music-lite' ),
			'description' => esc_html__( 'Options for changing the slideshow transition time and style.', 'music-lite' ),
			'priority'	=> 102,
			'panel'			=> 'music_lite_theme_options',
		) );

		// Slider Transition Interval.
		$wp_customize->add_setting( 'music_lite_transition_interval', array(
			'default'						=> '12000',
			'sanitize_callback' => 'music_lite_sanitize_transition_interval',
		) );
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'music_lite_transition_interval', array(
			'type' 		=> 'select',
			'label' 	=> esc_html__( 'Transition Interval', 'music-lite' ),
			'section' => 'music_lite_slider_section',
			'choices' => array(
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
			),
			'priority' => 10,
		) ) );

		// Slideshow Transition Style.
		$wp_customize->add_setting( 'music_lite_transition_style', array(
			'default'						=> 'fade',
			'sanitize_callback' => 'music_lite_sanitize_transition_style',
		) );
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'music_lite_transition_style', array(
			'type' 		=> 'select',
			'label' 	=> esc_html__( 'Transition Style', 'music-lite' ),
			'section' => 'music_lite_slider_section',
			'choices' => array(
				'fade' 		=> __( 'Fade', 'music-lite' ),
				'slide' 	=> __( 'Slide', 'music-lite' ),
			),
			'priority' => 20,
		) ) );

		/*
		-------------------------------------------------------------------------------------------------------
			Layout Options
		-------------------------------------------------------------------------------------------------------
		*/

		$wp_customize->add_section( 'music_lite_layout_section' , array(
			'title'			=> esc_html__( 'Layout', 'music-lite' ),
			'description' => esc_html__( 'Toggle the display and layout of various elements throughout the theme.', 'music-lite' ),
			'priority'	=> 104,
			'panel'			=> 'music_lite_theme_options',
		) );

		// Project Columns Option.
		$wp_customize->add_setting( 'project_columns', array(
			'default' => 'two',
			'sanitize_callback' => 'music_lite_sanitize_columns',
		) );
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'project_columns', array(
			'label' => esc_html__( 'Portfolio Project Columns', 'music-lite' ),
			'section' => 'music_lite_layout_section',
			'settings' => 'project_columns',
			'type' => 'radio',
			'choices' => array(
				'one' 		=> esc_html__( 'One Column', 'music-lite' ),
				'two' 		=> esc_html__( 'Two Columns', 'music-lite' ),
				'three' 	=> esc_html__( 'Three Columns', 'music-lite' ),
				'four' 		=> esc_html__( 'Four Columns', 'music-lite' ),
			),
			'priority' => 40,
		) ) );

		// Project Columns Option.
		$wp_customize->add_setting( 'testimonial_columns', array(
			'default' => 'four',
			'sanitize_callback' => 'music_lite_sanitize_columns',
		) );
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'testimonial_columns', array(
			'label' => esc_html__( 'Testimonial Columns', 'music-lite' ),
			'section' => 'music_lite_layout_section',
			'settings' => 'testimonial_columns',
			'type' => 'radio',
			'choices' => array(
				'two' 		=> esc_html__( 'Two Columns', 'music-lite' ),
				'three' 	=> esc_html__( 'Three Columns', 'music-lite' ),
				'four' 		=> esc_html__( 'Four Columns', 'music-lite' ),
				'five' 		=> esc_html__( 'Five Columns', 'music-lite' ),
			),
			'priority' => 60,
		) ) );

		// Display Post Image Title Overlay.
		$wp_customize->add_setting( 'display_img_title_post', array(
			'default'						=> '1',
			'sanitize_callback'	=> 'music_lite_sanitize_checkbox',
		) );
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'display_img_title_post', array(
			'label'			=> esc_html__( 'Overlay Post Title On Featured Image?', 'music-lite' ),
			'section'		=> 'music_lite_layout_section',
			'settings'	=> 'display_img_title_post',
			'type'			=> 'checkbox',
			'priority'	=> 80,
		) ) );

		// Display Page Image Title Overlay.
		$wp_customize->add_setting( 'display_img_title_page', array(
			'default'						=> '1',
			'sanitize_callback'	=> 'music_lite_sanitize_checkbox',
		) );
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'display_img_title_page', array(
			'label'			=> esc_html__( 'Overlay Page Title On Featured Image?', 'music-lite' ),
			'section'		=> 'music_lite_layout_section',
			'settings'	=> 'display_img_title_page',
			'type'			=> 'checkbox',
			'priority'	=> 100,
		) ) );

		/*
		-------------------------------------------------------------------------------------------------------
			Footer Section
		-------------------------------------------------------------------------------------------------------
		*/

		$wp_customize->add_section( 'music_lite_footer_section' , array(
			'title'				=> esc_html__( 'Footer', 'music-lite' ),
			'description' => esc_html__( 'Replace the footer text. The footer social media links can be added by creating a Social Menu in the Menus section.', 'music-lite' ),
			'priority'		=> 120,
		) );

		// Footer Text.
		$wp_customize->add_setting( 'music_lite_footer_text', array(
			'sanitize_callback'	=> 'music_lite_sanitize_text',
			'transport'					=> 'postMessage',
		) );
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'music_lite_footer_text', array(
			'label'			=> esc_html__( 'Footer Text', 'music-lite' ),
			'section'		=> 'music_lite_footer_section',
			'settings'	=> 'music_lite_footer_text',
			'type'			=> 'text',
			'priority'	=> 10,
		) ) );

}
add_action( 'customize_register', 'music_lite_theme_customizer' );

/**
 * Binds JavaScript handlers to make Customizer preview reload changes
 * asynchronously.
 */
function music_lite_customize_preview_js() {
	wp_enqueue_script( 'music-customizer', get_template_directory_uri() . '/customizer/js/customizer.js', array( 'customize-preview' ), '1.0', true );
}
add_action( 'customize_preview_init', 'music_lite_customize_preview_js' );
