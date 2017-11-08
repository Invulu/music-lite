<?php

/*
-----------------------------------------------------------------------------------------------------
	Theme License and Updater
-----------------------------------------------------------------------------------------------------
*/

// Includes the files needed for the theme updater.
if ( ! class_exists( 'EDD_Theme_Updater_Admin' ) ) {
	include( dirname( __FILE__ ) . '/theme-updater-admin.php' );
}

// Loads the updater classes.
$updater = new EDD_Theme_Updater_Admin(
	// Config settings.
	$config = array(
		'remote_api_url' => 'https://organicthemes.com', // Site where EDD is hosted.
		'item_name' => 'Music Theme', // Name of theme.
		'theme_slug' => 'music-lite', // Theme slug.
		'version' => '2.0.1', // The current version of this theme.
		'author' => 'Organic Themes', // The author of this theme.
		'download_id' => '2470', // Optional, used for generating a license renewal link.
		'renew_url' => '', // Optional, allows for a custom license renewal link.
	),
	// Strings.
	$strings = array(
		'theme-license' => __( 'Theme License', 'music-lite' ),
		'enter-key' => __( 'Enter your theme license key.', 'music-lite' ),
		'license-key' => __( 'License Key', 'music-lite' ),
		'license-action' => __( 'License Action', 'music-lite' ),
		'deactivate-license' => __( 'Deactivate License', 'music-lite' ),
		'activate-license' => __( 'Activate License', 'music-lite' ),
		'status-unknown' => __( 'License status is unknown.', 'music-lite' ),
		'renew' => __( 'Renew?', 'music-lite' ),
		'unlimited' => __( 'unlimited', 'music-lite' ),
		'license-key-is-active' => __( 'License key is active.', 'music-lite' ),
		'expires%s' => __( 'Expires %s.', 'music-lite' ),
		'%1$s/%2$-sites' => __( 'You have %1$s / %2$s sites activated.', 'music-lite' ),
		'license-key-expired-%s' => __( 'License key expired %s.', 'music-lite' ),
		'license-key-expired' => __( 'License key has expired.', 'music-lite' ),
		'license-keys-do-not-match' => __( 'License keys do not match.', 'music-lite' ),
		'license-is-inactive' => __( 'License is inactive.', 'music-lite' ),
		'license-key-is-disabled' => __( 'License key is disabled.', 'music-lite' ),
		'site-is-inactive' => __( 'Site is inactive.', 'music-lite' ),
		'license-status-unknown' => __( 'License status is unknown.', 'music-lite' ),
		'update-notice' => __( "Updating this theme will lose any customizations you have made. 'Cancel' to stop, 'OK' to update.", 'music-lite' ),
		'update-available' => __( '<strong>%1$s %2$s</strong> is available. <a href="%3$s" class="thickbox" title="%4s">Check out what\'s new</a> or <a href="%5$s"%6$s>update now</a>.', 'music-lite' ),
	)
);
