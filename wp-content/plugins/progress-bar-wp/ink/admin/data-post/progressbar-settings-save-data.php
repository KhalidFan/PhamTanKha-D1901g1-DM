<?php  if ( ! defined( 'ABSPATH' ) ) exit;
if(isset($PostID) && isset($_POST['progressbar_wp_setting_save_action'])) {
					
			
			$pb_ind_clr_enable 		         = sanitize_option('pb_ind_clr_enable', $_POST['pb_ind_clr_enable']);
			$progress_title_clr        		 = sanitize_text_field($_POST['progress_title_clr']);
		    $progress_title_font_size        = sanitize_text_field($_POST['progress_title_font_size']);
		    $progress_title_font_weight      = sanitize_text_field($_POST['progress_title_font_weight']);
			$margin_size                     = sanitize_text_field($_POST['margin_size']);
			$slider_bg_clr                   = sanitize_text_field($_POST['slider_bg_clr']);
			$slider_bg_size                  = sanitize_text_field($_POST['slider_bg_size']);
			$slider_clr                      = sanitize_text_field($_POST['slider_clr']);
		    $slider_clr_two                  = sanitize_text_field($_POST['slider_clr_two']);
			$slider_handle_clr               = sanitize_text_field($_POST['slider_handle_clr']);
			$slider_handle_size              = sanitize_text_field($_POST['slider_handle_size']);
			$slider_op_clr                   = sanitize_text_field($_POST['slider_op_clr']);
			$slider_op_font_size             = sanitize_text_field($_POST['slider_op_font_size']);
			$slider_op_font_weight           = sanitize_text_field($_POST['slider_op_font_weight']);
			$pb_web_link_label      		 = sanitize_text_field($_POST['pb_web_link_label']);
			$pb_layout      				 = sanitize_text_field($_POST['pb_layout']);
			$font_family            		 = sanitize_text_field($_POST['font_family']);
			$templates                       = sanitize_option('templates', $_POST['templates']);
			$custom_css             		 = stripslashes($_POST['custom_css']);
			
				
			
			$Shortcode_Settings_Array = serialize( array(
				'pb_ind_clr_enable' 		        => $pb_ind_clr_enable,
				'progress_title_clr' 		        => $progress_title_clr,
				'progress_title_font_size'	        => $progress_title_font_size,
				'progress_title_font_weight'        => $progress_title_font_weight,
				'margin_size'                       => $margin_size,
				'slider_bg_clr'                     => $slider_bg_clr,
				'slider_bg_size'                    => $slider_bg_size,
				'slider_clr'                        => $slider_clr,
				'slider_clr_two'                    => $slider_clr_two,
                'slider_handle_clr'                 => $slider_handle_clr,
				'slider_handle_size'                => $slider_handle_size,
				'slider_op_clr'                     => $slider_op_clr,
				'slider_op_font_size'               => $slider_op_font_size,
				'slider_op_font_weight'             => $slider_op_font_weight,
				'font_family' 			            => $font_family,
				'pb_layout' 			            => $pb_layout,
				'pb_web_link_label' 			    => $pb_web_link_label,
				'templates' 			            => $templates,
				'custom_css' 			            => $custom_css,
				
				) );

			update_post_meta($PostID, 'progressbar_wp_Shortcode_Settings', $Shortcode_Settings_Array);
		
			}
?>