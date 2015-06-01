<?php
/**
 * _frc functions and theme setup
 *
 * @package _frc
 */

/**
 * Theme setup
 */
	require get_template_directory() . '/inc/theme-setup.php';
	require get_template_directory() . '/inc/theme-assets.php';
	require get_template_directory() . '/inc/admin.php';
	# require get_template_directory() . '/inc/customizer.php';
	# require get_template_directory() . '/inc/localize-js.php';
	require get_template_directory() . '/inc/login-redirects.php';
	require get_template_directory() . '/inc/template-tags.php';
	require get_template_directory() . '/inc/wordpress.php';

/**
 * Register custom elements
 */
	require get_template_directory() . '/inc/register-navigation.php';
	require get_template_directory() . '/inc/register-post-types.php';
	require get_template_directory() . '/inc/register-sidebars.php';
	require get_template_directory() . '/inc/register-taxonomies.php';

/**
 * Plugins
 */
	# require get_template_directory() . '/inc/acf.php';
	# require get_template_directory() . '/inc/gravity-forms.php';
	# require get_template_directory() . '/inc/wpml.php';
