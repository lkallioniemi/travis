<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */


$url = parse_url(getenv("CLEARDB_DATABASE_URL"));

define("DB_NAME", trim($url["path"], "/"));
define("DB_USER", trim($url["user"]));
define("DB_PASSWORD", trim($url["pass"]));
define("DB_HOST", trim($url["host"]));
// define("DB_PORT", trim($url["port"]));
define("DB_CHARSET", "utf8");
define("DB_COLLATE", "utf8_swedish_ci");

define("FORCE_SSL_LOGIN", getenv("FORCE_SSL_LOGIN") == "true");
define("FORCE_SSL_ADMIN", getenv("FORCE_SSL_ADMIN") == "true");
if ($_SERVER["HTTP_X_FORWARDED_PROTO"] == "https") $_SERVER["HTTPS"] = "on";
if ($_SERVER['SERVER_PORT'] == '443') $_SERVER["HTTPS"] = "on";

$hosturl = ( $_SERVER['HTTPS'] == 'on' ? 'https://' : 'http://' ) . $_SERVER['HTTP_HOST'];
define( 'WP_HOME',        "$hosturl");
define( 'WP_SITEURL',     "$hosturl/wordpress");
define( 'WP_CONTENT_URL', "$hosturl/wp-content" );
$docroot = ( $_SERVER['DOCUMENT_ROOT'] ? $_SERVER['DOCUMENT_ROOT'] : '/app/public/' );
define( 'WP_CONTENT_DIR', "$docroot/wp-content" );

/**
 * If wordpress-unsecure-auth-cookie plug-in is enabled, we'll set COOKIEHASH without http:// or https:// in the beginning.
 */
 define('FORCE_UNSECURE_AUTH_COOKIE', getenv('FORCE_UNSECURE_AUTH_COOKIE') == 'true');
if (defined('FORCE_UNSECURE_AUTH_COOKIE')) {
    define('COOKIEHASH', md5( strtolower($_SERVER["HTTP_HOST"]) ) );
}

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define("AUTH_KEY",         "put your unique phrase here");
define("SECURE_AUTH_KEY",  "put your unique phrase here");
define("LOGGED_IN_KEY",    "put your unique phrase here");
define("NONCE_KEY",        "put your unique phrase here");
define("AUTH_SALT",        "put your unique phrase here");
define("SECURE_AUTH_SALT", "put your unique phrase here");
define("LOGGED_IN_SALT",   "put your unique phrase here");
define("NONCE_SALT",       "put your unique phrase here");

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = "frc_";

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to "de_DE" to enable German
 * language support.
 */
define("WPLANG", "");

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define("WP_DEBUG", getenv("WP_DEBUG") == "true");

/**
 * Enable the WordPress Object Cache
 */
define('WP_CACHE', getenv('WP_CACHE') == 'true');

/**
 * Disable the built-in cron job
 */
define("DISABLE_WP_CRON", getenv("DISABLE_WP_CRON") == "true");

/**
 * Disable automatic updates, they won't survive restarting and scaling dynos
 */
define( 'AUTOMATIC_UPDATER_DISABLED', true );

/**
 * Disable file editing from the admin view.
 */
define('DISALLOW_FILE_EDIT', true);

/**
 * Use Direct File I/O from within PHP for WordPress Upgrades
 */
define('FS_METHOD', 'direct');

/**
 * Specify the Number of Post Revisions
 */
define("WP_POST_REVISIONS", 10);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined("ABSPATH") )
  define("ABSPATH", dirname(__FILE__) . "/");

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . "wp-settings.php");
