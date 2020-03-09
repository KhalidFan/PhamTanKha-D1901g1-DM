<?php
/**
 * Plugin Name: Progress Bar WP
 * Version: 1.3.1
 * Description:  Progress bar plugin will help you to add skill bar graph or percentage bar on your website. 
 * Author: wpshopmart
 * Author URI: https://www.wpshopmart.com
 * Plugin URI: https://www.wpshopmart.com/plugins/
 */
 
 /**
 * DEFINE PATHS
 */
 
if ( ! defined( 'ABSPATH' ) ) exit; 
define("progress_bar_wp_directory_url", plugin_dir_url(__FILE__));
define("progress_bar_wp_text_domain", "wp_progressbar");
 

/**
 *  progress bar  add menu require
 */
require_once("ink/admin/menu.php");

require_once("ink/install/installation.php");

/**
 * SHORTCODE
 */
require_once("template/shortcode.php"); 

// plugin default data 
function wpsm_pb_wp_default_data() {

	$Settings_Array = serialize( array(
		'progress_title_clr' 		        => "#000000",
		'progress_title_font_size'	        => "18",
		'progress_title_font_weight'        => "300",
		'margin_size'                       => "",
		'slider_bg_clr'                     => "#000000",
		'slider_bg_size'                    => "18",
		'slider_clr'                        => "#000000",
		'slider_clr_two'                    => "#000000",
		'slider_handle_clr'                 => "#000000",
		'slider_handle_size'                => "18",
		'slider_op_clr'                     => "#000000",
		'slider_op_font_size'               => "18",
		'slider_op_font_weight'             => "300",
		'font_family' 			            => "Open Sans",
		'pb_layout'  						=> "12",
		"templates"   						=> "2",
		'pb_web_link_label' 			    => "",
		'custom_css' 			            => "",
	
	) );

	add_option('wpsm_progressbar_wp_default_settings', $Settings_Array);
}
?>