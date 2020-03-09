<?php
 if ( ! defined( 'ABSPATH' ) ) exit;
$labels = array(
				'name'                => _x( 'ProgressBar', 'ProgressBar', progress_bar_wp_text_domain ),
				'singular_name'       => _x( 'ProgressBar', 'ProgressBar', progress_bar_wp_text_domain ),
				'menu_name'           => __( 'ProgressBar WP', progress_bar_wp_text_domain ),
				'parent_item_colon'   => __( 'Parent Item:', progress_bar_wp_text_domain ),
				'all_items'           => __( 'All ProgressBar', progress_bar_wp_text_domain ),
				'view_item'           => __( 'View ProgressBar', progress_bar_wp_text_domain ),
				'add_new_item'        => __( 'Add New ProgressBar', progress_bar_wp_text_domain ),
				'add_new'             => __( 'Add New ProgressBar', progress_bar_wp_text_domain ),
				'edit_item'           => __( 'Edit ProgressBar', progress_bar_wp_text_domain ),
				'update_item'         => __( 'Update ProgressBar', progress_bar_wp_text_domain ),
				'search_items'        => __( 'Search ProgressBar', progress_bar_wp_text_domain ),
				'not_found'           => __( 'No ProgressBar Found', progress_bar_wp_text_domain ),
				'not_found_in_trash'  => __( 'No ProgressBar found in Trash', progress_bar_wp_text_domain ),
			);
			$args = array(
				'label'               => __( 'ProgressBar Panels', progress_bar_wp_text_domain ),
				'description'         => __( 'ProgressBar Panels', progress_bar_wp_text_domain ),
				'labels'              => $labels,
				'supports'            => array( 'title', '', '', '', '', '', '', '', '', '', '', ),
				//'taxonomies'          => array( 'category', 'post_tag' ),
				 'hierarchical'        => false,
				'public'              => false,
				'show_ui'             => true,
				'show_in_menu'        => true,
				'show_in_nav_menus'   => false,
				'show_in_admin_bar'   => false,
				'menu_position'       => 5,
				'menu_icon'           => 'dashicons-admin-tools',
				'can_export'          => true,
				'has_archive'         => true,
				'exclude_from_search' => false,
				'publicly_queryable'  => false,
				'capability_type'     => 'page',
			);
			register_post_type( 'progressbar_wp_r', $args );
			
 ?>