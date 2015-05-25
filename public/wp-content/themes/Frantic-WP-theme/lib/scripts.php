<?php

function queue_scripts() {
    /**
     * NOTE: IE only scripts are included manually in the head.
     */

    if (!is_admin()) {

        // Deregister scripts.
        wp_deregister_script('jquery');


        // Scripts in header.
        wp_register_script('modernizr-js', get_stylesheet_directory_uri() . '/assets/js/vendor/modernizr-2.7.1.min.js', array(), '2.7.1', false);


        // Scripts in footer.
        wp_register_script('jquery', get_stylesheet_directory_uri() . '/assets/js/vendor/jquery-1.10.2.min.js', array(), '1.10.2', true);
        wp_register_script('main-js', get_stylesheet_directory_uri() . '/assets/js/main.min.js', array(), '', true);


        // Queue scripts.
        wp_enqueue_script('modernizr-js');
        // wp_enqueue_script('jquery');
        // wp_enqueue_script('main-js');

    }
}
add_action('wp_enqueue_scripts', 'queue_scripts', 999);

?>