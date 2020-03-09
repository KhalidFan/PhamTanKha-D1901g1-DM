<?php if ( ! defined( 'ABSPATH' ) ) exit;
if(isset($PostID) && isset($_POST['progressbar_save_data_action']) ) {
			$TotalCount = count($_POST['progress_title']);
			$ShortcodeArray = array();
			if($TotalCount) {
				for($i=0; $i < $TotalCount; $i++) {
					$progress_title            = stripslashes(sanitize_text_field($_POST['progress_title'][$i]));
					$progress_size             = stripslashes(sanitize_text_field($_POST['progress_size'][$i]));
			        	
					$ShortcodeArray[] = array(
						
						'progress_title'            => $progress_title,
						'progress_size'             => $progress_size,
						);
				}
				update_post_meta($PostID, 'progressbar_wp_data', serialize($ShortcodeArray));
				update_post_meta($PostID, 'progressbar_wp_count', $TotalCount);
			} else {
				$TotalCount = -1;
				update_post_meta($PostID, 'progressbar_wp_count', $TotalCount);
				$ShortcodeArray = array();
				update_post_meta($PostID, 'progressbar_wp_data', serialize($ShortcodeArray));
			}
		}
 ?>