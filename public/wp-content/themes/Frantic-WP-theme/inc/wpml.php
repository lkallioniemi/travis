<?php
/**
 * WPML Compatibility File
 *
 * @package _frc
 */

/**
 * Remove general WPML features
 */

	add_action( 'init', 'remove_wpml_features' );
function remove_wpml_features() {

	global $sitepress;

	// Remove WPML styles
	define( 'ICL_DONT_LOAD_LANGUAGE_SELECTOR_CSS', true );

	// Silence is golden
	define( 'ICL_DONT_PROMOTE', true );
	remove_action( 'admin_notices', array( $sitepress, 'icl_reminders' ) );

	// Removes WPML Dashboard metabox
	remove_action( 'wp_dashboard_setup', array( $sitepress, 'dashboard_widget_setup' ) );

}

/**
 * Remove WPML's translation queue from subscribers
 */
	add_action( 'admin_menu', 'remove_wpml_admin_menu_entries', 9999 );
function remove_wpml_admin_menu_entries() {
	if ( ! current_user_can( 'edit_posts' ) ) {
		remove_menu_page( 'wpml-translation-management/menu/translations-queue.php' );
	}
}

/**
 * Remove WPML's Multilingual Content Setup metabox
 *
 * @link http://codex.wordpress.org/Function_Reference/remove_meta_box
 */
	add_action( 'admin_head', 'remove_wpml_metaboxes' );
function remove_wpml_metaboxes() {
	$screen = get_current_screen();
	remove_meta_box( 'icl_div_config', $screen->post_type, 'normal' );
}
