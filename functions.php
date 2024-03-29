<?php
/**
 * This file includes the theme functions.
 *
 * @package Music Lite
 * @since Music Lite 1.0
 */

/*
-------------------------------------------------------------------------------------------------------
	Theme Setup
-------------------------------------------------------------------------------------------------------
*/

if ( ! function_exists( 'music_lite_setup' ) ) :

	/** Function music_lite_setup */
	function music_lite_setup() {
		/*
		* Enable support for translation.
		*/
		load_theme_textdomain( 'music-lite', get_template_directory() . '/languages' );

		/*
		* Enable support for RSS feed links to head.
		*/
		add_theme_support( 'automatic-feed-links' );

		/*
		* Enable selective refresh for widgets.
		*/
		add_theme_support( 'customize-selective-refresh-widgets' );

		/*
		* Enable support for wide alignment class for Gutenberg blocks.
		*/
		add_theme_support( 'align-wide' );

		/*
		* Enable support for post thumbnails.
		*/
		add_theme_support( 'post-thumbnails' );

		add_image_size( 'music-lite-featured-large', 2400, 1800, true ); // Large Featured Image.
		add_image_size( 'music-lite-featured-medium', 1200, 800, true ); // Medium Featured Image.
		add_image_size( 'music-lite-featured-small', 640, 640, true ); // Small Featured Image.
		add_image_size( 'music-lite-featured-square', 1800, 1800, true ); // Square Featured Image.

		/*
		* Enable support for site title tag.
		*/
		add_theme_support( 'title-tag' );

		/*
		* Enable support for responsive embed blocks.
		*/
		add_theme_support( 'responsive-embeds' );

		/*
		* Enable support for block styles.
		*/
		add_theme_support( 'wp-block-styles' );

		/*
		* Enable support for HTML5 output.
		*/
		add_theme_support(
			'html5', array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
			)
		);

		/*
		* Enable support for custom logo.
		*/
		add_theme_support(
			'custom-logo', array(
				'height'      => 320,
				'width'       => 320,
				'flex-height' => true,
				'flex-width'  => true,
			)
		);

		/*
		* Enable support for custom menus.
		*/
		register_nav_menus(
			array(
				'main-menu'   => esc_html__( 'Main Menu', 'music-lite' ),
				'social-menu' => esc_html__( 'Social Menu', 'music-lite' ),
			)
		);

		/*
		* Enable support for custom header.
		*/
		register_default_headers(
			array(
				'default' => array(
					'url'           => get_template_directory_uri() . '/images/default-header.jpg',
					'thumbnail_url' => get_template_directory_uri() . '/images/default-header.jpg',
					'description'   => esc_html__( 'Default Custom Header', 'music-lite' ),
				),
			)
		);
		$defaults = array(
			'video'         => true,
			'width'         => 1800,
			'height'        => 480,
			'flex-height'   => true,
			'flex-width'    => true,
			'default-image' => get_template_directory_uri() . '/images/default-header.jpg',
			'header-text'   => false,
			'uploads'       => true,
		);
		add_theme_support( 'custom-header', $defaults );

		/*
		* Enable support for custom background.
		*/
		$defaults = array(
			'default-color' => '111111',
		);
		add_theme_support( 'custom-background', $defaults );

	}
endif; // End function music_lite_setup.
add_action( 'after_setup_theme', 'music_lite_setup' );

/*
-------------------------------------------------------------------------------------------------------
	Register Scripts
-------------------------------------------------------------------------------------------------------
*/

if ( ! function_exists( 'music_lite_enqueue_scripts' ) ) {

	/** Function music_lite_enqueue_scripts */
	function music_lite_enqueue_scripts() {

		// Enqueue Styles.
		wp_enqueue_style( 'music-lite-style', get_stylesheet_uri(), '', '1.0' );
		wp_enqueue_style( 'music-lite-style-conditionals', get_template_directory_uri() . '/css/style-conditionals.css', array( 'music-lite-style' ), '1.0' );
		wp_enqueue_style( 'music-lite-style-mobile', get_template_directory_uri() . '/css/style-mobile.css', array( 'music-lite-style' ), '1.0' );
		wp_enqueue_style( 'music-lite-font-awesome', get_template_directory_uri() . '/css/font-awesome.css', array( 'music-lite-style' ), '5.15.2' );

		// Resgister Scripts.
		wp_register_script( 'jquery-sidr', get_template_directory_uri() . '/js/jquery.sidr.js', array( 'jquery' ), '1.0', true );
		wp_register_script( 'jquery-fitvids', get_template_directory_uri() . '/js/jquery.fitvids.js', array( 'jquery' ), '1.0', true );
		wp_register_script( 'jquery-bg-brightness', get_template_directory_uri() . '/js/jquery.bgBrightness.js', array( 'jquery' ), '1.0', true );

		// Enqueue Scripts.
		wp_enqueue_script( 'hoverIntent' );
		wp_enqueue_script( 'music-lite-custom', get_template_directory_uri() . '/js/jquery.custom.js', array( 'jquery', 'jquery-sidr', 'jquery-fitvids', 'jquery-bg-brightness', 'masonry' ), '1.0', true );

		// Load single scripts only on single pages.
		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}
	}
}
add_action( 'wp_enqueue_scripts', 'music_lite_enqueue_scripts' );

if ( ! function_exists( 'music_lite_enqueue_admin_scripts' ) ) {

	/** Function music_lite_enqueue_admin_scripts */
	function music_lite_enqueue_admin_scripts( $hook ) {
		if ( 'themes.php' !== $hook ) {
			return;
		}
		wp_enqueue_script( 'music-custom-admin', get_template_directory_uri() . '/js/jquery.custom.admin.js', array( 'jquery' ), '1.0', true );
	}
}
add_action( 'admin_enqueue_scripts', 'music_lite_enqueue_admin_scripts' );

/*
-------------------------------------------------------------------------------------------------------
	Gutenberg Editor Styles
-------------------------------------------------------------------------------------------------------
*/

/**
 * Enqueue WordPress theme styles within Gutenberg.
 */
function music_lite_gutenberg_styles() {
	// Load the theme styles within Gutenberg.
	wp_enqueue_style(
		'music-lite-gutenberg',
		get_theme_file_uri( '/css/gutenberg.css' ),
		false,
		'1.0',
		'all'
	);
	wp_enqueue_style(
		'music-lite-font-awesome',
		get_template_directory_uri() . '/css/font-awesome.css',
		array( 'music-lite-gutenberg' ),
		'5.15.2'
	);
}
add_action( 'enqueue_block_editor_assets', 'music_lite_gutenberg_styles' );

/*
-------------------------------------------------------------------------------------------------------
	Admin Support and Upgrade Link
-------------------------------------------------------------------------------------------------------
*/

function music_lite_support_link() {
	global $submenu;
	$support_link            = esc_url( 'https://organicthemes.com/support/' );
	$submenu['themes.php'][] = array( __( 'Theme Support', 'music-lite' ), 'manage_options', $support_link );
}
add_action( 'admin_menu', 'music_lite_support_link' );

function music_lite_upgrade_link() {
	global $submenu;
	$upgrade_link            = esc_url( 'https://organicthemes.com/theme/music-theme/?utm_source=lite_upgrade' );
	$submenu['themes.php'][] = array( __( 'Theme Upgrade', 'music-lite' ), 'manage_options', $upgrade_link );
}
add_action( 'admin_menu', 'music_lite_upgrade_link' );

/*
-------------------------------------------------------------------------------------------------------
	Admin Notice
-------------------------------------------------------------------------------------------------------
*/

/** Function music_lite_admin_notice_discount */
function music_lite_admin_notice_discount() {
	if ( ! PAnD::is_admin_notice_active( 'notice-music-lite-discount-30' ) ) {
		return;
	}
	?>

	<div data-dismissible="notice-music-lite-discount-30" class="notice updated is-dismissible">

		<p><?php printf( wp_kses_post( '🍍 Aloha! Mahalo for using Music Lite. We would like to extend a <b>20&#37; discount</b> towards our <a href="%1$s" target="_blank">Blocks Bundle Plugin</a> or any <a href="%2$s" target="_blank">Organic Themes Membership</a>. Just enter the coupon code "LITEUP20" during checkout.', 'music-lite' ), 'https://organicthemes.com/blocks/', 'https://organicthemes.com/pricing/' ); ?></p>
		<p><b><?php esc_html_e( '&mdash; David Morgan', 'music-lite' ); ?></b><br/>
		<b><?php printf( wp_kses_post( 'Co-founder of <a href="%1$s" target="_blank">Organic Themes</a>', 'music-lite' ), 'https://organicthemes.com/' ); ?></b></p>

	</div>

	<?php
}

add_action( 'admin_init', array( 'PAnD', 'init' ) );
add_action( 'admin_notices', 'music_lite_admin_notice_discount', 10 );

require( get_template_directory() . '/includes/persist-admin-notices-dismissal/persist-admin-notices-dismissal.php' );

/*
-------------------------------------------------------------------------------------------------------
	Category ID to Name
-------------------------------------------------------------------------------------------------------
*/

if ( ! function_exists( 'music_lite_cat_id_to_name' ) ) :

	/**
	 * Changes category IDs to names.
	 *
	 * @param array $id IDs for categories.
	 * @return array
	 */
	function music_lite_cat_id_to_name( $id ) {
		$cat = get_category( $id );
		if ( is_wp_error( $cat ) ) {
			return false; }
		return $cat->cat_name;
	}
endif;

/*
-------------------------------------------------------------------------------------------------------
	Register Sidebars
-------------------------------------------------------------------------------------------------------
*/

if ( ! function_exists( 'music_lite_widgets_init' ) ) :

	/** Function music_lite_widgets_init */
	function music_lite_widgets_init() {
		register_sidebar(
			array(
				'name'          => esc_html__( 'Default Sidebar', 'music-lite' ),
				'id'            => 'sidebar-1',
				'before_widget' => '<aside id="%1$s" class="widget organic-widget %2$s">',
				'after_widget'  => '</aside>',
				'before_title'  => '<h3 class="widget-title">',
				'after_title'   => '</h3>',
			)
		);
		register_sidebar(
			array(
				'name'          => esc_html__( 'Blog Sidebar', 'music-lite' ),
				'id'            => 'sidebar-blog',
				'before_widget' => '<aside id="%1$s" class="widget organic-widget %2$s">',
				'after_widget'  => '</aside>',
				'before_title'  => '<h3 class="widget-title">',
				'after_title'   => '</h3>',
			)
		);
		register_sidebar(
			array(
				'name'          => esc_html__( 'Home Widgets', 'music-lite' ),
				'id'            => 'home-widgets',
				'before_widget' => '<aside id="%1$s" class="widget organic-widget %2$s">',
				'after_widget'  => '</aside>',
				'before_title'  => '<h3 class="widget-title">',
				'after_title'   => '</h3>',
			)
		);
		register_sidebar(
			array(
				'name'          => esc_html__( 'Footer Widgets', 'music-lite' ),
				'id'            => 'footer',
				'before_widget' => '<aside id="%1$s" class="widget organic-widget %2$s"><div class="footer-widget">',
				'after_widget'  => '</div></aside>',
				'before_title'  => '<h3 class="widget-title">',
				'after_title'   => '</h3>',
			)
		);
	}
endif;
add_action( 'widgets_init', 'music_lite_widgets_init' );

/*
-------------------------------------------------------------------------------------------------------
	Posted On Function
-------------------------------------------------------------------------------------------------------
*/

if ( ! function_exists( 'music_lite_posted_on' ) ) :

	/** Function music_lite_posted_on */
	function music_lite_posted_on() {
		if ( get_the_modified_time() !== get_the_time() ) {
			printf(
				__( '<span class="%1$s">Updated:</span> %2$s', 'music-lite' ),
				'meta-prep meta-prep-author',
				sprintf(
					'<a href="%1$s" title="%2$s" rel="bookmark"><span class="entry-date">%3$s</span></a>',
					esc_url( get_permalink() ),
					esc_attr( get_the_modified_time() ),
					esc_attr( get_the_modified_date() )
				)
			);
		} else {
			printf(
				__( '<span class="%1$s">Posted:</span> %2$s', 'music-lite' ),
				'meta-prep meta-prep-author',
				sprintf(
					'<a href="%1$s" title="%2$s" rel="bookmark"><span class="entry-date">%3$s</span></a>',
					esc_url( get_permalink() ),
					esc_attr( get_the_time() ),
					get_the_date()
				)
			);
		}
	}
endif;

/*
------------------------------------------------------------------------------------------------------
	Content Width
------------------------------------------------------------------------------------------------------
*/

if ( ! isset( $content_width ) ) {
	$content_width = 760; }

if ( ! function_exists( 'music_lite_content_width' ) ) :

	/** Function music_lite_content_width */
	function music_lite_content_width() {
		$GLOBALS['content_width'] = apply_filters( 'music_lite_content_width', 760 );
	}
endif;
add_action( 'after_setup_theme', 'music_lite_content_width', 0 );

/*
-------------------------------------------------------------------------------------------------------
	Comments Function
-------------------------------------------------------------------------------------------------------
*/

if ( ! function_exists( 'music_lite_comment' ) ) :

	/**
	 * Setup our comments for the theme.
	 *
	 * @param array $comment IDs for categories.
	 * @param array $args Comment arguments.
	 * @param array $depth Level of replies.
	 */
	function music_lite_comment( $comment, $args, $depth ) {
		switch ( $comment->comment_type ) :
			case 'pingback':
			case 'trackback':
				?>
		<li class="post pingback">
		<p><?php esc_html_e( 'Pingback:', 'music-lite' ); ?> <?php comment_author_link(); ?><?php edit_comment_link( esc_html__( 'Edit', 'music-lite' ), '<span class="edit-link">', '</span>' ); ?></p>
				<?php
				break;
			default:
				?>
		<li <?php comment_class(); ?> id="<?php echo esc_attr( 'li-comment-' . get_comment_ID() ); ?>">

		<article id="<?php echo esc_attr( 'comment-' . get_comment_ID() ); ?>" class="comment">
			<footer class="comment-meta">
				<div class="comment-author vcard">
					<?php
						$avatar_size = 72;
					if ( '0' !== $comment->comment_parent ) {
						$avatar_size = 48; }

						echo get_avatar( $comment, $avatar_size );

						/* translators: 1: comment author, 2: date and time */
						printf(
							__( '%1$s <br/> %2$s <br/>', 'music-lite' ),
							sprintf( '<span class="fn">%s</span>', wp_kses_post( get_comment_author_link() ) ),
							sprintf(
								'<a href="%1$s"><time pubdate datetime="%2$s">%3$s</time></a>',
								esc_url( get_comment_link( $comment->comment_ID ) ),
								get_comment_time( 'c' ),
								/* translators: 1: date, 2: time */
								sprintf( esc_html__( '%1$s, %2$s', 'music-lite' ), get_comment_date(), get_comment_time() )
							)
						);
					?>
					</div><!-- END .comment-author .vcard -->
				</footer>

				<div class="comment-content">
					<?php if ( '0' === $comment->comment_approved ) : ?>
					<em class="comment-awaiting-moderation"><?php esc_html_e( 'Your comment is awaiting moderation.', 'music-lite' ); ?></em>
					<br />
				<?php endif; ?>
					<?php comment_text(); ?>
					<div class="reply">
					<?php
					comment_reply_link(
						array_merge(
							$args, array(
								'reply_text' => esc_html__( 'Reply', 'music-lite' ),
								'depth'      => $depth,
								'max_depth'  => $args['max_depth'],
							)
						)
					);
					?>
					</div><!-- .reply -->
					<?php edit_comment_link( esc_html__( 'Edit', 'music-lite' ), '<span class="edit-link">', '</span>' ); ?>
				</div>

			</article><!-- #comment-## -->

				<?php
				break;
		endswitch;
	}
endif; // Ends check for music_lite_comment().

/*
-------------------------------------------------------------------------------------------------------
	Custom Excerpt
-------------------------------------------------------------------------------------------------------
*/

/**
 * Replaces "[...]" (appended to automatically generated excerpts) with ... and
 * a 'Continue reading' link.
 *
 * @since Music Lite 1.0
 *
 * @return string 'Continue reading' link prepended with an ellipsis.
 */
function music_lite_excerpt_more( $link ) {
	if ( is_admin() ) {
		return $link;
	}

	$link = sprintf(
		'<p class="link-more"><a href="%1$s" class="more-link">%2$s</a></p>',
		esc_url( get_permalink( get_the_ID() ) ),
		/* translators: %s: Name of current post */
		sprintf( __( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'music-lite' ), get_the_title( get_the_ID() ) )
	);
	return ' &hellip; ' . $link;
}
add_filter( 'excerpt_more', 'music_lite_excerpt_more' );

/*
-------------------------------------------------------------------------------------------------------
	Add Excerpt To Pages
-------------------------------------------------------------------------------------------------------
*/

/**
 * Add excerpt to pages.
 */

add_action( 'init', 'music_lite_page_excerpts' );
function music_lite_page_excerpts() {
	add_post_type_support( 'page', 'excerpt' );
}

/*
-------------------------------------------------------------------------------------------------------
	Custom Page Links
-------------------------------------------------------------------------------------------------------
*/

/**
 * Adds custom page links to pages.
 *
 * @param array $args for page links.
 * @return array
 */

if ( ! function_exists( 'music_lite_wp_link_pages_args_prevnext_add' ) ) :

	function music_lite_wp_link_pages_args_prevnext_add( $args ) {
		global $page, $numpages, $more, $pagenow;

		if ( ! $args['next_or_number'] == 'next_and_number' ) {
			return $args; }

		$args['next_or_number'] = 'number'; // Keep numbering for the main part.
		if ( ! $more ) {
			return $args; }

		if ( $page - 1 ) { // There is a previous page.
			$args['before'] .= _wp_link_page( $page - 1 )
			. $args['link_before'] . $args['previouspagelink'] . $args['link_after'] . '</a>'; }

		if ( $page < $numpages ) { // There is a next page.
			$args['after'] = _wp_link_page( $page + 1 )
			. $args['link_before'] . $args['nextpagelink'] . $args['link_after'] . '</a>'
			. $args['after']; }

		return $args;
	}
endif;
add_filter( 'wp_link_pages_args', 'music_lite_wp_link_pages_args_prevnext_add' );

/*
-------------------------------------------------------------------------------------------------------
	Remove First Gallery
-------------------------------------------------------------------------------------------------------
*/

/**
 * Removes first gallery shortcode from slideshow page template.
 *
 * @param array $content Content output on slideshow page template.
 * @return array
 */

if ( ! function_exists( 'music_lite_remove_gallery' ) ) :

	function music_lite_remove_gallery( $content ) {
		if ( is_page_template( 'template-slideshow.php' ) ) {
			$regex   = get_shortcode_regex( array( 'gallery' ) );
			$content = preg_replace( '/' . $regex . '/s', '', $content, 1 );
			$content = wp_kses_post( $content );
		}
		return $content;
	}
endif;
add_filter( 'the_content', 'music_lite_remove_gallery' );

/*
-------------------------------------------------------------------------------------------------------
	Body Class
-------------------------------------------------------------------------------------------------------
*/

if ( ! function_exists( 'music_lite_body_class' ) ) :

	/**
	 * Adds custom classes to the array of body classes.
	 *
	 * @param array $classes Classes for the body element.
	 * @return array
	 */
	function music_lite_body_class( $classes ) {

		$header_image = get_header_image();
		$post_pages   = is_home() || is_archive() || is_search() || is_attachment();

		if ( function_exists( 'the_custom_logo' ) && has_custom_logo() ) {
			$classes[] = 'music-lite-has-logo'; }

		if ( is_page_template( 'template-home.php' ) ) {
			$classes[] = 'music-lite-home-page';
		} else {
			$classes[] = 'music-lite-not-home-page';
		}

		if ( is_page_template( 'template-slideshow.php' ) ) {
			$classes[] = 'music-lite-slideshow'; }

		if ( 'left' === get_theme_mod( 'music_lite_logo_align', 'left' ) ) {
			$classes[] = 'music-lite-logo-left'; }

		if ( 'center' === get_theme_mod( 'music_lite_logo_align', 'left' ) ) {
			$classes[] = 'music-lite-logo-center'; }

		if ( 'right' === get_theme_mod( 'music_lite_logo_align', 'left' ) ) {
			$classes[] = 'music-lite-logo-right'; }

		if ( 'left' === get_theme_mod( 'music_lite_desc_align', 'center' ) ) {
			$classes[] = 'music-lite-desc-left'; }

		if ( 'center' === get_theme_mod( 'music_lite_desc_align', 'center' ) ) {
			$classes[] = 'music-lite-desc-center'; }

		if ( 'right' === get_theme_mod( 'music_lite_desc_align', 'center' ) ) {
			$classes[] = 'music-lite-desc-right'; }

		if ( 'blank' !== get_theme_mod( 'music_lite_site_tagline' ) ) {
			$classes[] = 'music-lite-desc-active';
		} else {
			$classes[] = 'music-lite-desc-inactive';
		}

		if ( is_singular() && ! has_post_thumbnail() ) {
			$classes[] = 'music-lite-no-img'; }

		if ( is_singular() && has_post_thumbnail() ) {
			$classes[] = 'music-lite-has-img'; }

		if ( $post_pages && ! empty( $header_image ) || is_page() && ! has_post_thumbnail() && ! empty( $header_image ) ) {
			$classes[] = 'music-lite-header-active';
		} else {
			$classes[] = 'music-lite-header-inactive';
		}

		if ( is_header_video_active() && has_header_video() ) {
			$classes[] = 'music-lite-header-video-active';
		} else {
			$classes[] = 'music-lite-header-video-inactive';
		}

		if ( is_singular() ) {
			$classes[] = 'music-lite-singular';
		}

		if ( is_active_sidebar( 'sidebar-1' ) ) {
			$classes[] = 'music-lite-sidebar-1';
		}

		if ( is_active_sidebar( 'sidebar-1' ) && ! is_page_template( 'template-full.php' ) ) {
			$classes[] = 'music-lite-sidebar-active';
		} else {
			$classes[] = 'music-lite-sidebar-inactive';
		}

		if ( '' !== get_theme_mod( 'background_image' ) ) {
			// This class will render when a background image is set
			// regardless of whether the user has set a color as well.
			$classes[] = 'music-lite-background-image';
		} elseif ( ! in_array( get_background_color(), array( '', get_theme_support( 'custom-background', 'default-color' ) ), true ) ) {
			// This class will render when a background color is set
			// but no image is set. In the case the content text will
			// Adjust relative to the background color.
			$classes[] = 'music-lite-relative-text';
		}

		return $classes;
	}
endif;
add_action( 'body_class', 'music_lite_body_class' );

/*
-------------------------------------------------------------------------------------------------------
	Includes
-------------------------------------------------------------------------------------------------------
*/

require_once get_template_directory() . '/customizer/customizer.php';
require_once get_template_directory() . '/includes/style-options.php';
require_once get_template_directory() . '/includes/typefaces.php';
require_once get_template_directory() . '/includes/plugin-activation.php';
require_once get_template_directory() . '/includes/plugin-activation-class.php';

/*
-------------------------------------------------------------------------------------------------------
	Load Jetpack File
-------------------------------------------------------------------------------------------------------
*/

if ( class_exists( 'Jetpack' ) ) {
	require get_template_directory() . '/jetpack/jetpack-setup.php';
}
