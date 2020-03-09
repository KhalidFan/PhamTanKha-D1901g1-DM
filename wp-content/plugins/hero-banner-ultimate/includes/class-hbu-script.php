<?php
/**
 * Script Class
 * Handles the script and style functionality of plugin
 *
 * @package hero-banner-ultimate
 * @since 1.0.0
 */

// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

class Hbu_Script {

	function __construct() {

		// Action to add script at front side
		add_action( 'wp_enqueue_scripts', array($this, 'hbu_front_style') );
		
		// Action to add script at front side
		add_action( 'wp_enqueue_scripts', array($this, 'hbu_front_script') );

		// Action to add style in backend
		add_action( 'admin_enqueue_scripts', array($this, 'hbu_admin_style') );		
		
		// Action to add script in backend
		add_action( 'admin_enqueue_scripts', array($this, 'hbu_admin_script') );		
		
	}
	
	/**
	 * Function to add style at front side
	 * 
	 * @package hero-banner-ultimate
	 * @since 1.0.0
	 */
	function hbu_front_style() {			
		
		// Registring and enqueing button with style pro css
		wp_register_style( 'hbu-public-style', HBU_URL.'assets/css/hbu-public-style.css', array(), HBU_VERSION );
		wp_enqueue_style( 'hbu-public-style' );

	}	
	
	/**
	 * Function to add style at front side
	 * 
	 * @package hero-banner-ultimate
	 * @since 1.0.0
	 */
	function hbu_front_script() {		

		wp_register_script( 'hbu-video-script', HBU_URL.'assets/js/hbu-ultimate-bg.js', array('jquery'), HBU_VERSION, true );		

	}	

	/**
	 * Enqueue admin styles
	 * 
	 * @package hero-banner-ultimate
	 * @since 1.0.0
	 */
	function hbu_admin_style( $hook ) {

		global $typenow;

		// Taking pages array
		$pages_arr = array( HBU_POST_TYPE );

		if( in_array($typenow, $pages_arr) ) {
			wp_register_style( 'hbu-admin-style', HBU_URL.'assets/css/hbu-admin-style.css', array(), HBU_VERSION );
			wp_enqueue_style( 'hbu-admin-style' );
			
		// Enqueu built in style for color picker
			if( wp_style_is( 'wp-color-picker', 'registered' ) ) { // Since WordPress 3.5
				wp_enqueue_style( 'wp-color-picker' );
			}	
		}		
		
	}

	/**
	 * Enqueue admin script
	 * 
	 * @package hero-banner-ultimate
	 * @since 1.0.0
	 */
	function hbu_admin_script( $hook ) {

		global $typenow, $wp_version;
		$new_ui = $wp_version >= '3.5' ? '1' : '0'; // Check wordpress version for older scripts
		// Taking pages array
		$pages_arr = array( HBU_POST_TYPE );

		if( in_array($typenow, $pages_arr) ) {
			
			// Enqueu built-in script for color picker
			if( wp_script_is( 'wp-color-picker', 'registered' ) ) { // Since WordPress 3.5
				wp_enqueue_script( 'wp-color-picker' );
			}
			
			// Registring admin script
			wp_register_script( 'hbu-admin-script', HBU_URL.'assets/js/hbu-admin-script.js', array('jquery'), HBU_VERSION, true );
			wp_enqueue_script( 'hbu-admin-script' );
			wp_localize_script( 'hbu-admin-script', 'HbuproAdmin', array(
																		'new_ui' 	=>	$new_ui,
																		'sry_msg' => __('Sorry, One entry should be there.', 'hero-banner-ultimate'),			
			
			));			
		}
		
	}

}

$hbu_script = new Hbu_Script();