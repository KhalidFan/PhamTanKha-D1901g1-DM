<?php
/**
 * Admin Class
 *
 * Handles the Admin side functionality of plugin
 *
 * @package hero-banner-ultimate
 * @since 1.0.0
 */

// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

class Hbu_Admin {

	function __construct() {
		
		// Action to add metabox
		add_action( 'add_meta_boxes', array($this, 'hbu_post_sett_metabox') );

		// Action to save metabox
		add_action( 'save_post', array($this, 'hbu_save_metabox_value') );		

		// Action to add custom column to Slider listing
		add_filter( 'manage_'.HBU_POST_TYPE.'_posts_columns', array($this, 'hbu_manage_posts_columns') );

		// Action to add custom column data to Slider listing
		add_action('manage_'.HBU_POST_TYPE.'_posts_custom_column', array($this, 'hbu_post_columns_data'), 10, 2);

		// Filter to add row data
		add_filter( 'post_row_actions', array($this, 'hbu_add_post_row_action'), 10, 2 );
		
		// Action to register admin menu
		add_action( 'admin_menu', array($this, 'hbu_register_menu'), 9 );

		
	}

	/**
	 * Function to add menu
	 * 
	 * @package Hero Banner
	 * @since 1.0.0
	 */
	function hbu_register_menu() {

		// Register plugin premium page
		add_submenu_page( 'edit.php?post_type='.HBU_POST_TYPE, __('Upgrade to PRO - Hero Banner Ultimate', 'hero-banner-ultimate'), '<span style="color:#2ECC71">'.__('Upgrade to PRO', 'hero-banner-ultimate').'</span>', 'manage_options', 'hbu-premium', array($this, 'hbu_premium_page') );

	}
	
	/**
	 * Getting Started Page Html
	 * 
	 * @package Hero Banner
	 * @since 1.0.0
	 */
	function hbu_premium_page() {
		include_once( HBU_DIR . '/includes/admin/premium.php' );
	}
	
	/**
	 * Post Settings Metabox
	 * 
	 * @package hero-banner-ultimate
	 * @since 1.0.0
	 */
	function hbu_post_sett_metabox() {
		add_meta_box( 'hbu-post-sett', __( 'Hero Banner - Settings', 'hero-banner-ultimate' ), array($this, 'hbu_post_sett_mb_content'), HBU_POST_TYPE, 'normal', 'high' );
	}

	/**
	 * Post Settings Metabox HTML
	 * 
	 * @package hero-banner-ultimate
	 * @since 1.0.0
	 */
	function hbu_post_sett_mb_content() {
		include_once( HBU_DIR .'/includes/admin/metabox/hbu-post-sett-metabox.php');
	}

	/**
	 * Function to save metabox values
	 * 
	 * @package hero-banner-ultimate
	 * @since 1.0.0
	 */
	function hbu_save_metabox_value( $post_id ) {

		global $post_type;
		
		if ( ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE )                	// Check Autosave
		|| ( ! isset( $_POST['post_ID'] ) || $post_id != $_POST['post_ID'] )  	// Check Revision
		|| ( $post_type !=  HBU_POST_TYPE ) )              				// Check if current post type is supported.
		{
		  return $post_id;
		}

		$prefix = HBU_META_PREFIX; // Taking metabox prefix

		// Taking variables
		$banner_type 			= isset($_POST[$prefix.'banner_type']) 				? $_POST[$prefix.'banner_type'] 			: '';		
		$banner_layout 			= isset($_POST[$prefix.'banner_layout']) 			? $_POST[$prefix.'banner_layout'] 			: '';
		$banner_bg_color 		= isset($_POST[$prefix.'banner_bg_color']) 			? $_POST[$prefix.'banner_bg_color'] 		: '';		
		$banner_image_url 		= isset($_POST[$prefix.'banner_image_url']) 		? $_POST[$prefix.'banner_image_url'] 		: '';
		$banner_video_url 		= isset($_POST[$prefix.'banner_video_url']) 		? $_POST[$prefix.'banner_video_url'] 		: '';
		$banner_vmvideo_url 	= isset($_POST[$prefix.'banner_vmvideo_url']) 		? $_POST[$prefix.'banner_vmvideo_url'] 		: '';				
		$banner_ovelay_color 	= isset($_POST[$prefix.'banner_ovelay_color']) 		? $_POST[$prefix.'banner_ovelay_color']		: '';
		$banner_ovelay_opacity	= isset($_POST[$prefix.'banner_ovelay_opacity']) 	? $_POST[$prefix.'banner_ovelay_opacity']	: '';
		$banner_title_color 	= isset($_POST[$prefix.'banner_title_color']) 		? $_POST[$prefix.'banner_title_color'] 		: '';	
		$banner_content_color 	= isset($_POST[$prefix.'banner_content_color']) 	? $_POST[$prefix.'banner_content_color'] 	: '';	
		$banner_title_fontsize 	= isset($_POST[$prefix.'banner_title_fontsize']) 	? $_POST[$prefix.'banner_title_fontsize'] 	: '';
		$banner_subtitle_fontsize= isset($_POST[$prefix.'banner_subtitle_fontsize'])? $_POST[$prefix.'banner_subtitle_fontsize']: '';
		$banner_button_one_name	= isset($_POST[$prefix.'banner_button_one_name']) 	? $_POST[$prefix.'banner_button_one_name']	: '';
		$banner_button_one_link = isset($_POST[$prefix.'banner_button_one_link']) 	? $_POST[$prefix.'banner_button_one_link'] 	: '';	
		$banner_button_two_name = isset($_POST[$prefix.'banner_button_two_name']) 	? $_POST[$prefix.'banner_button_two_name'] 	: '';	
		$banner_button_two_link = isset($_POST[$prefix.'banner_button_two_link']) 	? $_POST[$prefix.'banner_button_two_link'] 	: '';		
		$banner_bg_size 		= isset($_POST[$prefix.'banner_bg_size']) 			? $_POST[$prefix.'banner_bg_size'] 			: '';
		$banner_bg_attachemnt 	= isset($_POST[$prefix.'banner_bg_attachemnt'])		? $_POST[$prefix.'banner_bg_attachemnt'] 	: '';
		$banner_bg_position 	= isset($_POST[$prefix.'banner_bg_position']) 		? $_POST[$prefix.'banner_bg_position'] 		: '';
		$banner_padding_top 	= isset($_POST[$prefix.'banner_padding_top']) 		? $_POST[$prefix.'banner_padding_top'] 		: '';
		$banner_padding_right 	= isset($_POST[$prefix.'banner_padding_right']) 	? $_POST[$prefix.'banner_padding_right'] 	: '';		
		$banner_padding_bottom 	= isset($_POST[$prefix.'banner_padding_bottom']) 	? $_POST[$prefix.'banner_padding_bottom'] 	: '';	
		$banner_padding_left 	= isset($_POST[$prefix.'banner_padding_left']) 		? $_POST[$prefix.'banner_padding_left'] 	: '';
		$banner_wrap_width 		= isset($_POST[$prefix.'banner_wrap_width']) 		? $_POST[$prefix.'banner_wrap_width'] 		: '';	
		$banner_button_one_class = isset($_POST[$prefix.'banner_button_one_class']) ? $_POST[$prefix.'banner_button_one_class'] : '';
		$banner_button_two_class = isset($_POST[$prefix.'banner_button_two_class']) ? $_POST[$prefix.'banner_button_two_class'] : '';


		update_post_meta($post_id, $prefix.'banner_type', $banner_type);		
		update_post_meta($post_id, $prefix.'banner_bg_color', $banner_bg_color);		
		update_post_meta($post_id, $prefix.'banner_layout', $banner_layout);
		update_post_meta($post_id, $prefix.'banner_video_url', $banner_video_url);
		update_post_meta($post_id, $prefix.'banner_vmvideo_url', $banner_vmvideo_url);	
		update_post_meta($post_id, $prefix.'banner_image_url', $banner_image_url);	
		update_post_meta($post_id, $prefix.'banner_ovelay_color', $banner_ovelay_color);
		update_post_meta($post_id, $prefix.'banner_ovelay_opacity', $banner_ovelay_opacity);
		update_post_meta($post_id, $prefix.'banner_title_color', $banner_title_color);
		update_post_meta($post_id, $prefix.'banner_content_color', $banner_content_color);		
		update_post_meta($post_id, $prefix.'banner_title_fontsize', $banner_title_fontsize);
		update_post_meta($post_id, $prefix.'banner_subtitle_fontsize', $banner_subtitle_fontsize);
		update_post_meta($post_id, $prefix.'banner_button_one_name', $banner_button_one_name);
		update_post_meta($post_id, $prefix.'banner_button_one_link', $banner_button_one_link);
		update_post_meta($post_id, $prefix.'banner_button_two_name', $banner_button_two_name);		
		update_post_meta($post_id, $prefix.'banner_button_two_link', $banner_button_two_link);
		update_post_meta($post_id, $prefix.'banner_bg_size', $banner_bg_size);		
		update_post_meta($post_id, $prefix.'banner_bg_attachemnt', $banner_bg_attachemnt);
		update_post_meta($post_id, $prefix.'banner_bg_position', $banner_bg_position);
		update_post_meta($post_id, $prefix.'banner_padding_top', $banner_padding_top);
		update_post_meta($post_id, $prefix.'banner_padding_right', $banner_padding_right);
		update_post_meta($post_id, $prefix.'banner_padding_bottom', $banner_padding_bottom);		
		update_post_meta($post_id, $prefix.'banner_padding_left', $banner_padding_left);
		update_post_meta($post_id, $prefix.'banner_wrap_width', $banner_wrap_width);
		update_post_meta($post_id, $prefix.'banner_button_one_class', $banner_button_one_class);
		update_post_meta($post_id, $prefix.'banner_button_two_class', $banner_button_two_class);		
		
	}
	
	
	/**
	 * Add custom column to Post listing page
	 * 
	 * @package hero-banner-ultimate
	 * @since 1.0.0
	 */
	function hbu_manage_posts_columns( $columns ) {
		
		$new_columns['hbu_shortcode'] 	= __( 'Shortcode', 'hero-banner-ultimate' );	   

	    $columns = hbu_add_array( $columns, $new_columns, 1, true );

	    return $columns;
	}

	/**
	 * Add custom column data to Post listing page
	 * 
	 * @package hero-banner-ultimate
	 * @since 1.0.0
	 */
	function hbu_post_columns_data( $column, $post_id ) {

		$prefix = HBU_META_PREFIX; // Taking metabox prefix

	    switch ($column) {
			case 'hbu_shortcode':			
				$shortcode_string = '';
				$shortcode_string .= '[hbupro_banner id="'.$post_id.'"] ';				
				echo $shortcode_string;
				break;
			
		}
	}

	/**
	 * Function to add custom quick links at post listing page
	 * 
	 * @package hero-banner-ultimate
	 * @since 1.0.0
	 */
	function hbu_add_post_row_action($actions, $post ) {
		if( $post->post_type == HBU_POST_TYPE ) {
			return array_merge( array( 'hbupro_id' => 'ID: ' . $post->ID ), $actions );
		}
		return $actions;
	}
	
	
}

$hbu_admin = new Hbu_Admin();