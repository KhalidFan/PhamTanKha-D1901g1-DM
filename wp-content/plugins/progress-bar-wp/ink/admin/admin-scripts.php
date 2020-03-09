 <?php
 //    wp_enqueue_media();
			wp_enqueue_script('jquery');
			//color-picker css n js
			wp_enqueue_style( 'wp-color-picker' );
			wp_enqueue_script( 'wpsm_progress_wp-color-pic', progress_bar_wp_directory_url.'assets/js/color-picker.js', array( 'wp-color-picker' ), false, true );
			wp_enqueue_style('wpsm_progress_wp-panel-style', progress_bar_wp_directory_url.'assets/css/panel-style.css');
			wp_enqueue_style('wpsm_progress_wp-rangeslide-style', progress_bar_wp_directory_url.'assets/css/rangeSlider.css');
		    wp_enqueue_style('wpsm_progress_wp-sidebar', progress_bar_wp_directory_url.'assets/css/sidebar.css');
			  
			//font awesome css
			wp_enqueue_style('wpsm_progress_wp_bootstrap', progress_bar_wp_directory_url.'assets/css/bootstrap.css');
			wp_enqueue_style('wpsm_progress_wp-font-awesome', progress_bar_wp_directory_url.'assets/css/font-awesome/css/font-awesome.min.css');	
			//wp_enqueue_style('wpsm_progress_wp_font-awesome-picker', progress_bar_wp_directory_url.'assets/css/fontawesome-iconpicker.css');
		
			
		    wp_enqueue_script( 'wpsm_progress_wp-rangeslide-js', progress_bar_wp_directory_url.'assets/js/rangeSlider.min.js');
			wp_enqueue_script( 'wpsm_progress_wp-bootstrap-js', progress_bar_wp_directory_url.'assets/js/bootstrap.min.js');
			
			//tooltip
			wp_enqueue_style('wpsm_progress_wp_tooltip', progress_bar_wp_directory_url.'assets/tooltip/darktooltip.css');
			wp_enqueue_script( 'wpsm_progress_wp-tooltip-js', progress_bar_wp_directory_url.'assets/tooltip/jquery.darktooltip.js');
			// settings
			wp_enqueue_style('wpsm_progress_wp_settings-css', progress_bar_wp_directory_url.'assets/css/settings.css');
			//wp_enqueue_script('wpsm_progress_wp_font-icon-picker-js', progress_bar_wp_directory_url.'assets/js/fontawesome-iconpicker.js',array('jquery'));
		    
			//css editor 
	        wp_enqueue_style('wpsm_progress_wp_codemirror-css', progress_bar_wp_directory_url.'assets/codex/codemirror.css');
	        wp_enqueue_style('wpsm_progress_wp_ambiance', progress_bar_wp_directory_url.'assets/codex/ambiance.css');
	        wp_enqueue_style('wpsm_progress_wp_show-hint-css', progress_bar_wp_directory_url.'assets/codex/show-hint.css');
			wp_enqueue_script('wpsm_progress_wp_codemirror-js',progress_bar_wp_directory_url.'assets/codex/codemirror.js',array('jquery'));
	        wp_enqueue_script('wpsm_progress_wp_css-js',progress_bar_wp_directory_url.'assets/codex/css.js',array('jquery'));
	        wp_enqueue_script('wpsm_progress_wp_css-hint-js',progress_bar_wp_directory_url.'assets/codex/css-hint.js',array('jquery'));

?>			