<?php

/**
 * Customizations to admin
 *
 * Disable update message
 * Reorder admin menu
 * Customize admin menu entires
 * Custom styles to editor
 *
 */

    // Removes Update Core message from Dashboard
    add_action( 'admin_menu', 'hide_wordpress_update_notices' );
    function hide_wordpress_update_notices() {
        remove_action( 'admin_notices', 'update_nag', 3 );
    }

/**
 * Reorder admin menu.
 */
function custom_menu_order($menu_ord) {
    if (!$menu_ord) return true;

    return array(
        'index.php', // Dashboard
        'separator1', // First separator
        'edit.php?post_type=page', // Pages
        'edit.php', // Posts
        // Add custom post types here like this:
        // 'edit.php?post_type=event',
        // Gravity forms:
        // 'gf_edit_forms',
        'upload.php', // Media
        'edit-comments.php', // Comments
        'separator2', // Second separator
        'themes.php', // Appearance
        'plugins.php', // Plugins
        'users.php', // Users
        'tools.php', // Tools
        'options-general.php', // Settings
        'separator-last', // Last separator
    );
}
add_filter('custom_menu_order', 'custom_menu_order'); // Activate custom_menu_order
add_filter('menu_order', 'custom_menu_order');

/**
 * Customize admin menu entires
 * @url http://codex.wordpress.org/Function_Reference/current_user_can
 * @url http://codex.wordpress.org/Function_Reference/remove_menu_page
 * @url http://codex.wordpress.org/Function_Reference/remove_submenu_page
 */

    add_action( 'admin_menu', 'customize_admin_menu', 9999 );
    function customize_admin_menu() {

        /*
         * For: Allow access to these pages only to @frantic.com users
         * Debug: echo '<pre>' . print_r( $GLOBALS[ 'menu' ], TRUE) . '</pre>';
         *  - Look for [2] and use remove_menu_page()
        */
        if ( ! strpos( get_userdata( get_current_user_id() )->user_email, 'frantic.com' ) ) {

            // Hide Advanced Custom Fields
            remove_menu_page( 'edit.php?post_type=acf-field-group' );

            // Hide "Updates" under Dashboard menu
            remove_submenu_page( 'index.php', 'update-core.php' );

            // Hide General Settings
            remove_menu_page( 'options-general.php' );

            // Hide Plugins
            remove_menu_page( 'plugins.php' );

            // Hide Themes, but keep Menus visible
            remove_submenu_page( 'themes.php', 'themes.php' );
            remove_submenu_page( 'themes.php', 'customize.php?return=' . urlencode( $_SERVER['REQUEST_URI'] ) );

            // Comment out the following to show widgets if they are in fact used in your project.
            remove_submenu_page( 'themes.php', 'widgets.php' );

            // Hide Tools
            remove_menu_page( 'tools.php' );

            // Hide AWS plugin
            remove_menu_page( 'amazon-web-services' );

        }

    }

/**
 * CUSTOM LOGIN SCREEN
 */
/*
function custom_login_css() {
    // Use the style.css that's already at theme root
    echo '<link rel="stylesheet" href="' . get_theme_root_uri() . '/style.css">';
}
function custom_login_url() {  return home_url(); }
function custom_login_title() { return get_option('blogname'); }
add_action('login_head', 'custom_login_css');
add_filter('login_headerurl', 'custom_login_url');
add_filter('login_headertitle', 'custom_login_title');
*/


/**
 * Custom styles dropdown to editor
 */

/*add_filter( 'mce_buttons_2', 'my_mce_buttons_2' );

function my_mce_buttons_2( $buttons ) {
    array_unshift( $buttons, 'styleselect' );
    return $buttons;
}


// add styles - more info: http://alisothegeek.com/2011/05/tinymce-styles-dropdown-wordpress-visual-editor/
add_filter( 'tiny_mce_before_init', 'my_mce_before_init' );

function my_mce_before_init( $settings ) {

    $style_formats = array(
      array(
        'title' => 'Lead text',
        'selector' => 'p',
        'classes' => 'lead'
      ),
      array(
        'title' => 'Button',
        'selector' => 'a',
        'classes' => 'btn'
      )
    );

    $settings['style_formats'] = json_encode( $style_formats );

    return $settings;

}*/



/**
 * Custom styles to editor
 */

/*function my_theme_add_editor_styles() {
    add_editor_style( 'assets/css/custom-editor-style.css' );
}
add_action( 'init', 'my_theme_add_editor_styles' );*/
