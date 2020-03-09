<?php
/**
 * Plugin Name: Hero Banner Ultimate
 * Plugin URI: https://www.wponlinesupport.com/plugins
 * Text Domain: hero-banner-ultimate
 * Description: Add hero banner with the help of background image OR background color OR background video. Also work with Gutenberg shortcode block. 
 * Domain Path: /languages/
 * Version: 1.1
 * Author: WP OnlineSupport
 * Author URI: https://www.wponlinesupport.com
 * Contributors: WP OnlineSupport
*/

if( !defined( 'HBU_VERSION' ) ) {
	define( 'HBU_VERSION', '1.1' ); // Version of plugin
}
if( !defined( 'HBU_DIR' ) ) {
    define( 'HBU_DIR', dirname( __FILE__ ) ); // Plugin dir
}
if( !defined( 'HBU_URL' ) ) {
    define( 'HBU_URL', plugin_dir_url( __FILE__ )); // Plugin url
}
if( !defined( 'HBU_PLUGIN_BASENAME' ) ) {
	define( 'HBU_PLUGIN_BASENAME', plugin_basename( __FILE__ ) ); // plugin base name
}
if(!defined( 'HBU_POST_TYPE' ) ) {
	define('HBU_POST_TYPE', 'hbupro_banner'); // Plugin post type
}
if(!defined( 'HBU_META_PREFIX' ) ) {
	define('HBU_META_PREFIX','_hbupro_'); // Plugin metabox prefix
}


/**
 * Load Text Domain
 * This gets the plugin ready for translation
 * 
 * @package hero-banner-ultimate
 * @since 1.0.0
 */
function hbu_pro_load_textdomain() {

    global $wp_version;

    // Set filter for plugin's languages directory
    $hbu_lang_dir = dirname( plugin_basename( __FILE__ ) ) . '/languages/';
    $hbu_lang_dir = apply_filters( 'hbu_languages_directory', $hbu_lang_dir );

    // Traditional WordPress plugin locale filter.
    $get_locale = get_locale();

    if ( $wp_version >= 4.7 ) {
        $get_locale = get_user_locale();
    }

    // Traditional WordPress plugin locale filter
    $locale = apply_filters( 'plugin_locale',  $get_locale, 'hero-banner-ultimate' );
    $mofile = sprintf( '%1$s-%2$s.mo', 'hero-banner-ultimate', $locale );

    // Setup paths to current locale file
    $mofile_global  = WP_LANG_DIR . '/plugins/' . basename( HBU_DIR ) . '/' . $mofile;

    if ( file_exists( $mofile_global ) ) { // Look in global /wp-content/languages/plugin-name folder
        load_textdomain( 'hero-banner-ultimate', $mofile_global );
    } else { // Load the default language files
        load_plugin_textdomain( 'hero-banner-ultimate', false, $hbu_lang_dir );
    }
}
add_action('plugins_loaded', 'hbu_pro_load_textdomain');

// Funcions File
require_once( HBU_DIR .'/includes/hbu-functions.php' );

// Post Type File
require_once( HBU_DIR . '/includes/hbu-post-types.php' );

// Script Class File
require_once( HBU_DIR . '/includes/class-hbu-script.php' );

// Admin Class File
require_once( HBU_DIR . '/includes/admin/class-hbu-admin.php' );

// Shortcode file
require_once( HBU_DIR . '/includes/shortcode/hbu-banner-shortcode.php' );
