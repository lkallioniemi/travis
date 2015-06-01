<?php
/**
 * Transient management
 *
 * @link http://codex.wordpress.org/Function_Reference/delete_transient
 *
 * @package _frc
 */

	add_action( 'edit_category', 'theme_transient_flusher' );
	add_action( 'edit_term', 'theme_transient_flusher' );
	add_action( 'save_post', 'theme_transient_flusher' );
	add_action( 'wp_update_nav_menu', 'theme_transient_flusher' );
	function theme_transient_flusher() {

		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;

		delete_transient( '_frc_transient_name' );
	}

/**
 * Use WPML's icl_get_languages() to delete different language versions of transients
 *
 * @link http://codex.wordpress.org/Transients_API
 */
/*
	add_action( 'wp_update_nav_menu', 'theme_update_nav_menu' );
	function theme_update_nav_menu() {
		if ( function_exists( 'icl_get_languages' ) ) {
			$languages = icl_get_languages( 'skip_missing=0&orderby=code' );
			if ( ! empty( $languages ) ) {
				foreach ( $languages as $language ) {
					delete_transient( 'header-menu-' . $language['language_code'] );
					delete_transient( 'footer-menu-' . $language['language_code'] );
				}
			}
		}
	}
}
