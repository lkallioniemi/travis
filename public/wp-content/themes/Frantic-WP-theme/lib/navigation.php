<?php
// As of WP 3.1.1 addition of classes for css styling to parents of custom post types doesn't exist.
// We want the correct classes added to the correct custom post type parent in the wp-nav-menu for
// css styling and highlighting, so we're modifying each individually...
// The id of each link is required for each one you want to modify.
//
// Note: this is a hack and should be removed once WP handles this stuff properly.
/*
function remove_parent_classes($class)
{
    // check for current page classes, return false if they exist.
    return ($class == 'current_page_item' || $class == 'current_page_parent' || $class == 'current_page_ancestor'  || $class == 'current-menu-item') ? FALSE : TRUE;
}

function add_class_to_wp_nav_menu($classes)
{
    switch (get_post_type())
    {
        case 'event':
            // we're viewing a custom post type, so remove the 'current_page_xxx and current-menu-item' from all menu items.
            $classes = array_filter($classes, "remove_parent_classes");

            // add the current page class to a specific menu item (replace ###).
            if (in_array('menu-item-51', $classes))
            {
                $classes[] = 'current_page_parent';
            }
        break;

        // add more cases if necessary and/or a default
    }
    return $classes;
}
add_filter('nav_menu_css_class', 'add_class_to_wp_nav_menu');
*/


/*
 * Get only the children of 'submenu' in wp_nav_menu.
 *
 * Usage:
 * $args = array(
 *   'menu'    => 'Menu Name',
 *   'submenu' => 'About Us', // OR 'submenu' => 1234
 * );
 * wp_nav_menu( $args );
 *
 * Original: http://wordpress.stackexchange.com/questions/2802/display-a-portion-branch-of-the-menu-tree-using-wp-nav-menu/2809#2809
 * Modified to support ID's by Tuomas Arokanto
 *
 */
add_filter( 'wp_nav_menu_objects', 'submenu_limit', 10, 2 );
function submenu_limit( $items, $args ) {

    if ( empty( $args->submenu ) ) {
        return $items;
    }

    if ( intval( $args->submenu ) > 0 ) {
        // This is an ID
        $ids = wp_filter_object_list( $items, array( 'object_id' => $args->submenu ), 'and', 'ID' );
    } else {
        // Let's assume it's a name
        $ids = wp_filter_object_list( $items, array( 'title' => $args->submenu ), 'and', 'ID' );
    }

    $parent_id = array_pop( $ids );
    $children = submenu_get_children_ids( $parent_id, $items );

    foreach ( $items as $key => $item ) {
        if ( ! in_array( $item->ID, $children ) ) {
            unset( $items[$key] );
        }
    }

    return $items;
}

function submenu_get_children_ids( $id, $items ) {
    $ids = wp_filter_object_list( $items, array( 'menu_item_parent' => $id ), 'and', 'ID' );

    foreach ( $ids as $id ) {
        $ids = array_merge( $ids, submenu_get_children_ids( $id, $items ) );
    }

    return $ids;
}

?>