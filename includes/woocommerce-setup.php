<?php
/**
 * WooCommerce Setup Functions
 * See: http:///woothemes.com/woocommerce/
 *
 * @package Music Lite
 * @since Music Lite 1.0
 */

// Declare WooCommerce support.
add_theme_support( 'woocommerce' );

// Remove WC sidebar.
remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10 );

// WooCommerce content wrappers.
function music_lite_prepare_woocommerce_wrappers() {
	remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10 );
	remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10 );
}
add_action( 'wp_head', 'music_lite_prepare_woocommerce_wrappers' );

function music_lite_open_woocommerce_content_wrappers() {
	?>
	<div class="row">
		<div class="content">
		<?php if ( is_active_sidebar( 'sidebar-1' ) ) { ?>
			<div class="eleven columns">
		<?php } else { ?>
      <div class="sixteen columns">
		<?php } ?>
				<div class="post-area clearfix">
	<?php
}
function music_lite_close_woocommerce_content_wrappers() {
	?>
				</div>
			</div>

		<?php if ( is_active_sidebar( 'sidebar-1' ) ) { ?>
			<div class="five columns">
				<?php get_sidebar(); ?>
			</div>
		<?php } ?>

		</div>
	</div>
	<?php
}
add_action( 'woocommerce_before_main_content', 'music_lite_open_woocommerce_content_wrappers', 10 );
add_action( 'woocommerce_after_main_content', 'music_lite_close_woocommerce_content_wrappers', 10 );

// Add the WC sidebar in the right place.
add_action( 'woo_main_after', 'woocommerce_get_sidebar', 10 );

// WooCommerce remove related products.
remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );
