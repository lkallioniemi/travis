<?php

/*
 * Add all your Custom Post Types and Custom Taxonomies here.
 * You might want to use an online tool in http://generatewp.com/post-type/ to
 * create Custom Post Types scripts.
 *
 * If you have multiple languages, you might be better off using WPML's Types
 * add on. It makes translating Custom Post Types and Taxonomies easier.
 * If you choose to do so, just comment out a reference in functions.php to this file.
 *
*/


/*

// An example implementation of custom post type called Tapahtumat.

function init_events() {

    $labels = array(
        'name'                => 'Tapahtumat',
        'singular_name'       => 'Tapahtuma',
        'menu_name'           => 'Tapahtumat',
        'parent_item_colon'   => 'Ylätason tapahtuma:',
        'all_items'           => 'Kaikki tapahtumat',
        'view_item'           => 'Katso tapahtuman tiedot',
        'add_new_item'        => 'Lisää uusi tapahtuma',
        'add_new'             => 'Uusi tapahtuma',
        'edit_item'           => 'Muokkaa tapahtumaa',
        'update_item'         => 'Päivitä tapahtuma',
        'search_items'        => 'Etsi tapahtumista',
        'not_found'           => 'Yhtään tapahtumaa ei löytynyt',
        'not_found_in_trash'  => 'Yhtään tapahtumaa ei löytynyt roskakorista',
    );
    $rewrite = array(
        'slug'                => 'tapahtumat',
        'with_front'          => true,
        'pages'               => true,
        'feeds'               => true,
    );
    $args = array(
        'label'               => 'event',
        'description'         => 'Tapahtumat',
        'labels'              => $labels,
        'supports'            => array( 'title', 'editor', 'excerpt', 'thumbnail', 'custom-fields', ),
        'taxonomies'          => array( 'event_categories' ),
        'menu_icon'           => 'dashicons-calendar',
        'hierarchical'        => false,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        'menu_position'       => 1,
        'can_export'          => true,
        'has_archive'         => true,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'rewrite'             => $rewrite,
        'capability_type'     => 'post',
    );
    register_post_type( 'events', $args );
}

    // Register Custom Taxonomy
    function init_event_taxonomies()  {

        $labels = array(
            'name'                       => 'Tapahtumien kategoriat',
            'singular_name'              => 'Tapahtumien kategoria',
            'menu_name'                  => 'Tapahtumien kategoriat',
            'all_items'                  => 'Kaikki kategoriat',
            'parent_item'                => 'Ylätason kategoria',
            'parent_item_colon'          => 'Ylätason kategoria:',
            'new_item_name'              => 'Uusi kategoria',
            'add_new_item'               => 'Lisää uusi kategoria',
            'edit_item'                  => 'Muokkaa kategoriaa',
            'update_item'                => 'Päivitä kategoriaa',
            'separate_items_with_commas' => 'Erota kategoriat pilkulla',
            'search_items'               => 'Etsi kategorioista',
            'add_or_remove_items'        => 'Lisää tai poista kategorioita',
            'choose_from_most_used'      => 'Valitse useimmin käytetyistä',
        );
        $args = array(
            'labels'                     => $labels,
            'hierarchical'               => true,
            'public'                     => true,
            'show_ui'                    => true,
            'show_admin_column'          => true,
            'show_in_nav_menus'          => true,
            'show_tagcloud'              => true,
        );
        register_taxonomy( 'event_categories', 'custom_post_type', $args );

    }
*/
?>