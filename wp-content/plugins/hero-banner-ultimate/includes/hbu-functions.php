<?php
/**
 * Plugin generic functions file
 *
 * @package hero-banner-ultimate
 * @since 1.0.0
 */

 // Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

/**
 * Function to get unique value number
 * 
 * @package hero-banner-ultimate
 * @since 1.0
 */
function hbu_get_unique() {
	static $unique = 0;
	$unique++;
	return $unique;
}

/**
 * Function to get Banner style type
 * 
 * @package hero-banner-ultimate
 * @since 1.0.0
 */
function hbu_banner_type() {
	$banner_type = array(
						'bgcolor'		=> __('Background Color','hero-banner-ultimate'),
						'bgcolor_image'	=> __('Background Color and Image','hero-banner-ultimate'),
						'image'			=> __('Background Image','hero-banner-ultimate'),
						'video'			=> __('Background Video','hero-banner-ultimate'),
						'video_image'	=> __('Background Video and Image','hero-banner-ultimate'),	
					);
	return apply_filters('hbu_banner_type', $banner_type );
}


/**
 * Function to get button style type
 * 
 * @package hero-banner-ultimate
 * @since 1.0.0
 */
function hbu_button_type() {
	$button_type = array(
						'hbupro-black'					=> __('Black','hero-banner-ultimate'),
						'hbupro-white'					=> __('White','hero-banner-ultimate'),
						'hbupro-grey'					=> __('Gray','hero-banner-ultimate'),
						'hbupro-azure'					=> __('Azure','hero-banner-ultimate'),
						'hbupro-moderate-green'			=> __('Moderate Green','hero-banner-ultimate'),	
						'hbupro-soft-red'				=> __('Soft Red','hero-banner-ultimate'),
						'hbupro-red'					=> __('Moderate Red','hero-banner-ultimate'),
						'hbupro-green'					=> __('Green','hero-banner-ultimate'),
						'hbupro-bright-yellow'			=> __('Bright Yellow','hero-banner-ultimate'),
						'hbupro-orange'					=> __('Cyan','hero-banner-ultimate'),
						'hbupro-orange'					=> __('Orange','hero-banner-ultimate'),
						'hbupro-moderate-violet'		=> __('Moderate Violet','hero-banner-ultimate'),
						'hbupro-dark-magenta'			=> __('Dark Magenta','hero-banner-ultimate'),
						'hbupro-moderate-blue'			=> __('Moderate Blue','hero-banner-ultimate'),
						'hbupro-blue'					=> __('Blue','hero-banner-ultimate'),						
						'hbupro-magenta'				=> __('Magenta','hero-banner-ultimate'),
						'hbupro-lime'					=> __('Lime','hero-banner-ultimate'),
						'hbupro-pink'					=> __('Pink','hero-banner-ultimate'),
						'hbupro-vivid-yellow'			=> __('Vivid Yellow','hero-banner-ultimate'),
						'hbupro-lime-green'				=> __('Lime Green','hero-banner-ultimate'),
						'hbupro-yellow'					=> __('Yellow','hero-banner-ultimate'),
						
					);
	return apply_filters('hbu_button_type', $button_type );
}

/**
 * Function to get button style type
 * 
 * @package hero-banner-ultimate
 * @since 1.0.0
 */
function hbu_banner_layout() {
	$banner_layout = array(
						'layout-1'			 => __('Layout 1','hero-banner-ultimate'),
						'layout-2'			 => __('Layout 2','hero-banner-ultimate'),
						'layout-3'			 => __('Layout 3','hero-banner-ultimate'),
						'layout-4'			 => __('Layout 4','hero-banner-ultimate'),										
						
					);
	return apply_filters('hbu_banner_layout', $banner_layout );
}


/**
 * Escape Tags & Slashes
 *
 * Handles escapping the slashes and tags
 *
 * @package hero-banner-ultimate
 * @since 1.0.0
 */
function hbu_esc_attr($data) {
    return esc_attr( stripslashes($data) );
}

/**
 * Strip Slashes From Array
 *
 * @package hero-banner-ultimate
 * @since 1.0.0
 */
function hbu_slashes_deep($data = array(), $flag = false) {
  
    if($flag != true) {
        $data = hbu_nohtml_kses($data);
    }
    $data = stripslashes_deep($data);
    return $data;
}

/**
 * Strip Html Tags 
 * 
 * It will sanitize text input (strip html tags, and escape characters)
 * 
 * @package hero-banner-ultimate
 * @since 1.0.0
 */

function hbu_nohtml_kses($data = array()) {
  
  if ( is_array($data) ) {
    
    $data = array_map('hbu_nohtml_kses', $data);
    
  } elseif ( is_string( $data ) ) {
    $data = trim( $data );
    $data = wp_filter_nohtml_kses($data);
  }
  
  return $data;
}

/**
 * Function to add array after specific key
 * 
 * @package hero-banner-ultimate
 * @since 1.0.0
 */
function hbu_add_array(&$array, $value, $index, $from_last = false) {

    if( is_array($array) && is_array($value) ) {

        if( $from_last ) {
            $total_count    = count($array);
            $index          = (!empty($total_count) && ($total_count > $index)) ? ($total_count-$index): $index;
        }
        
        $split_arr  = array_splice($array, max(0, $index));
        $array      = array_merge( $array, $value, $split_arr);
    }
    
    return $array;
}


/**
 * Function to get  Image background size
 * 
 * @package hero-banner-ultimate
 * @since 1.0.0
 */
function hbu_bg_size() {
	$bgsize_arr = array(
		'auto'		=> __('Auto', 'post-grid-and-filter-ultimate'),
		'cover'		=> __('Cover', 'post-grid-and-filter-ultimate'),
		'contain'	=> __('Contain', 'post-grid-and-filter-ultimate'),		
		);	
	return apply_filters('hbu_bg_size', $bgsize_arr );
}

/**
 * Function to get  Image background Attachment
 * 
 * @package hero-banner-ultimate
 * @since 1.0.0
 */
function hbu_bg_attachemnt() {
	$attachemnt_arr = array(
		'fixed'	=> __('Fixed', 'post-grid-and-filter-ultimate'),
		'scroll'	=> __('Scroll', 'post-grid-and-filter-ultimate'),		
		);	
	return apply_filters('hbu_bg_attachemnt', $attachemnt_arr );
}

/**
 * Convert color hex value to rgb format
 * 
 * @package hero-banner-ultimate
 * @since 1.0.0
 */
function hbu_hex2rgb( $hex = '', $format = 'string' ) {

	if( empty($hex) ) return false;

	$hex = str_replace("#", "", $hex);

	if(strlen($hex) == 3) {
		$r = hexdec(substr($hex,0,1).substr($hex,0,1));
		$g = hexdec(substr($hex,1,1).substr($hex,1,1));
		$b = hexdec(substr($hex,2,1).substr($hex,2,1));
	} else {
		$r = hexdec(substr($hex,0,2));
		$g = hexdec(substr($hex,2,2));
		$b = hexdec(substr($hex,4,2));
	}

	$rgb = array($r, $g, $b);

	if( $format == 'string' ) {
		$rgb = implode(",", $rgb);
	}

	return $rgb;
}
