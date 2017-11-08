<?php
/**
 * This template is used to display the banner image on posts and pages.
 *
 * @package Music Lite
 * @since Music Lite 1.0
 */

?>

<?php $front_page = is_front_page(); ?>
<?php $header_image = get_header_image(); ?>
<?php $thumb = ( '' != get_the_post_thumbnail() ) ? wp_get_attachment_image_src( get_post_thumbnail_id(), 'music-featured-large' ) : false; ?>

<?php if ( has_post_thumbnail() ) { ?>

	<!-- BEGIN .row -->
	<div class="row">

		<div class="feature-img banner-img" style="background-image: url(<?php echo esc_url( $thumb[0] ); ?>);">
			<?php if ( is_page() && '1' == get_theme_mod( 'display_img_title_page', '1' ) || is_single() && '1' == get_theme_mod( 'display_img_title_post', '1' ) ) { ?>
				<div class="img-title">
					<h1 class="headline"><?php the_title(); ?></h1>
				</div>
			<?php } ?>
			<?php the_post_thumbnail( 'music-featured-large' ); ?>
		</div>

	<!-- END .row -->
	</div>

<?php } elseif ( $front_page && is_page() && has_custom_header() ) { ?>

	<!-- BEGIN .row -->
	<div class="row">

		<div class="feature-img banner-img" <?php if ( ! empty( $header_image ) ) { ?> style="background-image: url(<?php header_image(); ?>);"<?php } ?>>

			<?php if ( ! empty( $post->post_excerpt ) || '1' == get_theme_mod( 'display_img_title_page', '1' ) ) { ?>
			<div class="img-title">
				<?php if ( is_page_template( 'template-home.php' ) ) { ?>
					<?php the_custom_logo(); ?>
				<?php } ?>
				<?php if ( ! is_page_template( 'template-home.php' ) && '1' == get_theme_mod( 'display_img_title_page', '1' ) ) { ?>
					<h1 class="headline"><?php the_title(); ?></h1>
				<?php } ?>
				<?php if ( ! empty( $post->post_excerpt ) ) { ?>
					<div class="excerpt"><?php the_excerpt(); ?></div>
				<?php } ?>
				<?php if ( is_page_template( 'template-home.php' ) ) { ?>
					<?php if ( '' != get_theme_mod( 'music_lite_home_link', '' ) && get_theme_mod( 'music_lite_home_link', '' ) ) { ?>
						<div class="align-center text-center">
							<a class="button" href="<?php echo get_theme_mod( 'music_lite_home_link', '' ); ?>"><?php echo get_theme_mod( 'music_lite_home_link_text', 'Learn More' ); ?></a>
						</div>
					<?php } ?>
				<?php } ?>
			</div>
			<?php } ?>

			<?php the_custom_header_markup(); ?>

		</div>

		<?php $tour_query = new WP_Query( array( 'post_type' => 'tour-date' ) ); ?>

		<?php if ( is_page_template( 'template-home.php' ) && $tour_query->have_posts() ) { ?>
			<div class="tour-dates">
				<div class="flex-row">
					<?php get_template_part( 'content/loop-tour', 'home' ); ?>
				</div>
			</div>
		<?php } ?>

	<!-- END .row -->
	</div>

<?php } ?>
