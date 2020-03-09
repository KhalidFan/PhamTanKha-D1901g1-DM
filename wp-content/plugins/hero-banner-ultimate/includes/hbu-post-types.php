<?php
/**
 * Register Post type functionality 
 * @package hero-banner-ultimate
 * @since 1.0.0
 */

// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

/**
 * Function to register post type
 * 
 * @package hero-banner-ultimate
 * @since 1.0.0
 */
function hbu_register_post_type() {

	$hbu_post_lbls = apply_filters( 'hbu_post_labels', array(
								'name'                 	=> __('Hero Banner', 'hero-banner-ultimate'),
								'singular_name'        	=> __('Hero Banner', 'hero-banner-ultimate'),
								'add_new'              	=> __('Add Hero Banner', 'hero-banner-ultimate'),
								'add_new_item'         	=> __('Add New Hero Banner', 'hero-banner-ultimate'),
								'edit_item'            	=> __('Edit Hero Banner', 'hero-banner-ultimate'),
								'new_item'             	=> __('New Hero Banner', 'hero-banner-ultimate'),
								'view_item'            	=> __('View Hero Banner', 'hero-banner-ultimate'),
								'search_items'         	=> __('Search Hero Banner', 'hero-banner-ultimate'),
								'not_found'            	=> __('No Hero Banner found', 'hero-banner-ultimate'),
								'not_found_in_trash'   	=> __('No Hero Banner found in trash', 'hero-banner-ultimate'),
								'parent_item_colon'    	=> '',
								'menu_name'            	=> __('Hero Banner', 'hero-banner-ultimate')
							));

	$hbu_args = array(
		'labels'				=> $hbu_post_lbls,
		'public'              	=> false,
		'show_ui'             	=> true,
		'query_var'           	=> false,
		'rewrite'             	=> false,
		'capability_type'     	=> 'post',
		'hierarchical'        	=> false,
		'menu_icon'				=> 'dashicons-welcome-view-site',
		'supports'            	=> apply_filters('hbu_post_supports', array('title','editor')),
	);

	// Register slick slider post type
	register_post_type( HBU_POST_TYPE, apply_filters( 'hbu_registered_post_type_args', $hbu_args ) );
}

// Action to register plugin post type
add_action('init', 'hbu_register_post_type');
