<?php

/**
 * External libs for cleanup, registerings scripts, etc.
 */
require_once('lib/cleanup.php');
require_once('lib/scripts.php');
require_once('lib/disable_pingback.php');
require_once('lib/post_types_and_taxonomies.php');
require_once('lib/admin.php');
require_once('lib/navigation.php');


/**
 * Theme feature(s) support.
 */
add_theme_support('automatic-feed-links');
add_theme_support('menus');
add_theme_support('post-thumbnails');
add_theme_support('html5', array('comment-list', 'comment-form', 'search-form'));

// add_post_type_support('page', 'excerpt');

// If you have Articles in use on your site,
// enable this to allow widgets to show.
if ( function_exists('register_sidebar') ) {
  register_sidebar();
}


/**
 * Register menu(s).
 */
register_nav_menu('main', 'main');


?>