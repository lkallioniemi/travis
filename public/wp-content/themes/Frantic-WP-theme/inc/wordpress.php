<?php
/**
 * WordPress Compatibility File
 *
 * @package _frc
 */

	add_action( 'init', 'remove_wordpress_features' );
function remove_wordpress_features() {

	// Remove RSS feeds
	# remove_action( 'wp_head', 'feed_links', 2 );
	# remove_action( 'wp_head', 'feed_links_extra', 3 );

	remove_action( 'wp_head', 'rsd_link' );
	remove_action( 'wp_head', 'wlwmanifest_link' );
	# remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0 );
	# remove_action( 'wp_head', 'parent_post_rel_link', 10, 0 );
	# remove_action( 'wp_head', 'index_rel_link' );
	# remove_action( 'wp_head', 'start_post_rel_link', 10, 0 );

	// Remove WordPress version and shortlink
	add_action( 'the_generator', 'remove_version_info' );
	function remove_version_info() { return ''; }
	remove_action( 'wp_head', 'wp_generator' );
	remove_action( 'wp_head', 'wp_shortlink_wp_head', 10, 0 );

	// Remove inline styles from Tag cloud
	add_filter( 'wp_generate_tag_cloud', 'xf_tag_cloud', 10, 3 );
	function xf_tag_cloud( $tag_string ) {
		return preg_replace( "/style='font-size:.+pt;'/", '', $tag_string );
	}

}

	/**
	 * Disable XMLRPC functionalities
	 *
	 * @link http://codex.wordpress.org/Function_Reference/bloginfo
	 * @link http://codex.wordpress.org/Plugin_API/Action_Reference/wp
	 * @link https://developer.wordpress.org/reference/hooks/wp_headers/
	 * @link https://developer.wordpress.org/reference/hooks/xmlrpc_call/
	 * @link https://developer.wordpress.org/reference/hooks/xmlrpc_enabled/
	 * @link https://developer.wordpress.org/reference/hooks/xmlrpc_methods/
	 */

		// Disable XMLRPC completely
		# add_filter( 'xmlrpc_enabled', '__return_false' );

		// Disable X-Pingback HTTP Header
		add_filter( 'wp_headers', 'disable_pingback_header', 11, 2 );
function disable_pingback_header( $headers, $wp_query ) {
	if ( isset( $headers['X-Pingback'] ) ) { unset( $headers['X-Pingback'] ); }
	return $headers;
}

		// Hijack pingback_url for get_bloginfo (<link rel="pingback" />)
		add_filter( 'bloginfo_url', 'disable_pingback_url', 11, 2 );
function disable_pingback_url( $output, $property ) {
	return ( $property == 'pingback_url' ) ? null : $output;
}

		// Remove Pingback method
		add_filter( 'xmlrpc_methods', 'remove_xmlrpc_pingback_ping' );
function remove_xmlrpc_pingback_ping( $methods ) {
	unset( $methods['pingback.ping'] );
	return $methods;
}

		// Remove rsd_link from filters (<link rel="EditURI" />)
		add_action( 'wp', 'disable_rsd_link', 9 );
function disable_rsd_link() {
	remove_action( 'wp_head', 'rsd_link' );
}

		// Disable specific XMLRPC calls
		add_action( 'xmlrpc_call', function( $method ) {
			switch ( $method ) {

				case 'pingback.ping':
					wp_die(
						'Pingback functionality is disabled on this site',
						'Pingback disabled', array( 'response' => 403 )
					);
					break;

				default:
					return;
			}
		});

		/**
	 * Removes Update Core message from Dashboard
	 */
		add_action( 'admin_menu', 'hide_wordpress_update_notices' );
function hide_wordpress_update_notices() {
	remove_action( 'admin_notices', 'update_nag', 3 );
}

		/**
	 * Remove admin bar from subscribers
	 */
if ( ! current_user_can( 'edit_posts' ) ) {
	show_admin_bar( false );
	add_filter( 'show_admin_bar', '__return_false' );
}

		/**
	 * Remove Dashboard widgets
	 * Use 'dashboard-network' to remove widgets from a network dashboard.
	 * @link http://codex.wordpress.org/Function_Reference/remove_meta_box
	 */
		add_action( 'wp_dashboard_setup', 'remove_dashboard_widgets' );
function remove_dashboard_widgets() {

	// Right Now
	# remove_meta_box( 'dashboard_right_now', 'dashboard', 'normal' );

	// Recent Comments
	remove_meta_box( 'dashboard_recent_comments', 'dashboard', 'normal' );

	// Incoming Links
	remove_meta_box( 'dashboard_incoming_links', 'dashboard', 'normal' );

	// Plugins
	remove_meta_box( 'dashboard_plugins', 'dashboard', 'normal' );

	// Quick Press
	remove_meta_box( 'dashboard_quick_press', 'dashboard', 'side' );

	// Recent Drafts
	remove_meta_box( 'dashboard_recent_drafts', 'dashboard', 'side' );

	// Remove WordPress news for all other user except @frantic.com
	if ( ! strpos( get_userdata( get_current_user_id() )->user_email, 'frantic.com' ) ) {

		// WordPress blog
		remove_meta_box( 'dashboard_primary', 'dashboard', 'side' );

		// Other WordPress News
		remove_meta_box( 'dashboard_secondary', 'dashboard', 'side' );

	}
}

		/**
	 * Remove metaboxes
	 * Use 'dashboard-network' to remove widgets from a network dashboard.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/remove_meta_box
	 */
		add_action( 'admin_head', 'remove_metaboxes' );
function remove_metaboxes() {

	$screen = get_current_screen();

	// Author metabox
	remove_meta_box( 'authordiv', $screen->post_type, 'normal' );

	// Categories metabox
	# remove_meta_box( 'categorydiv', $screen->post_type, 'normal' );

	// Comments status metabox (discussion)
	remove_meta_box( 'commentstatusdiv', $screen->post_type, 'normal' );

	// Comments metabox
	remove_meta_box( 'commentsdiv', $screen->post_type, 'normal' );

	// Formats metabox
	remove_meta_box( 'formatdiv', $screen->post_type, 'normal' );

	// Attributes metabox
	# remove_meta_box( 'pageparentdiv', $screen->post_type, 'normal' );

	// Custom fields metabox
	remove_meta_box( 'postcustom', $screen->post_type, 'normal' );

	// Excerpt metabox
	# remove_meta_box( 'postexcerpt', $screen->post_type, 'normal' );

	// Featured image metabox
	# remove_meta_box( 'postimagediv', $screen->post_type, 'normal' );

	// Revisions metabox
	# remove_meta_box( 'revisionsdiv', $screen->post_type, 'normal' );

	// Slug metabox
	remove_meta_box( 'slugdiv', $screen->post_type, 'normal' );

	// Date, status, and update/save metabox
	# remove_meta_box( 'submitdiv', $screen->post_type, 'normal' );

	// Tags metabox
	remove_meta_box( 'tagsdiv-post_tag', $screen->post_type, 'normal' );

	// Trackbacks metabox
	remove_meta_box( 'trackbacksdiv', $screen->post_type, 'normal' );

}

		/**
	 * Rearrange default metaboxes
	 *
	 * @link http://wordpress.stackexchange.com/a/103924
	 */
		add_action( 'user_register', 'set_user_metaboxes' );
		add_action( 'admin_init', 'set_user_metaboxes' );
function set_user_metaboxes( $user_id = null ) {

	// Apply to all post formats
	$post_types = get_post_types();

	foreach ( $post_types as $post_type ) {

		// These are the metakeys we will need to update
		$meta_key = array(
			'order' => "meta-box-order_$post_type",
			'hidden' => "metaboxhidden_$post_type",
		);

		// So this can be used without hooking into user_register
		if ( ! $user_id ) { $user_id = get_current_user_id(); }

		// Re-set the default order if user hasn't already done it
		if ( ! get_user_option( $meta_key['order'], $user_id ) ) {
			$meta_value = array(
				'side' => 'postimagediv, submitdiv, formatdiv, categorydiv',
				'normal' => 'postexcerpt, tagsdiv-post_tag, commentstatusdiv, commentsdiv, trackbacksdiv, postcustom, slugdiv, authordiv, revisionsdiv',
				'advanced' => '',
			);
			update_user_option( $user_id, $meta_key['order'], $meta_value, true );
		}

		// Set the default hiddens if it has not been set yet
		if ( ! get_user_option( $meta_key['hidden'], $user_id ) ) {
			$meta_value = array(
				'postcustom',
				'trackbacksdiv',
				'commentstatusdiv',
				'commentsdiv',
				'slugdiv',
				'authordiv',
				'revisionsdiv'
			);
			update_user_option( $user_id, $meta_key['hidden'], $meta_value, true );
		}
	}
}
