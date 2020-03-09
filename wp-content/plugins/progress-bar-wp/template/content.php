<?php 
	if ( ! defined( 'ABSPATH' ) ) exit;
   // echo $WPSM_PROGRESS_ID;
	$pb_post_type = "progressbar_wp_r";
	$args = array(  'p' => $PROGRESS_WP_ID, 'post_type' => $pb_post_type, 'orderby' => 'ASC');
    $loop = new WP_Query( $args );
    while ( $loop->have_posts() ) : $loop->the_post();
     
    $postId = get_the_ID();
    $Settings = unserialize(get_post_meta( $postId, 'progressbar_wp_Shortcode_Settings', true));

	$option_names = array(
			       'progress_title_clr' 		        => "#000000",
					'progress_title_font_size'	        => "18",
					'progress_title_font_weight'        => "300",
					'margin_size'                       => "",
					'slider_bg_clr'                     => "#000000",
					'slider_bg_size'                    => "18",
					'slider_clr'                        => "#000000",
					'slider_handle_clr'                 => "#000000",
					'slider_handle_size'                => "18",
					'slider_op_clr'                     => "#000000",
					'slider_op_font_size'               => "18",
					'slider_op_font_weight'             => "300",
					'font_family' 			            => "Open Sans",
					'pb_layout'  						=> "12",
					"templates"   						=> "1",
					'pb_web_link_label' 			    => "",
					'custom_css' 			            => ""  
			
			);
			
			 foreach($option_names as $option_name => $default_value) {
				if(isset($Settings[$option_name])) 
					${"" . $option_name}  = $Settings[$option_name];
				else
					${"" . $option_name}  = $default_value;
			} 
	
	    $data = unserialize(get_post_meta(get_the_ID(), 'progressbar_wp_data', true));
		$TotalCount =  get_post_meta(get_the_ID(), 'progressbar_wp_count', true );
		
		// echo $TotalCount;
		?>
		<style>
		#wpsm_progress_b_row_<?php echo $postId; ?>{
	    overflow:hidden;
	    display:block;
	    width:100%;
	    border:0px solid #000;
	    margin-bottom:20px;
        }
		
		</style>
		
		<div class="wpsm_progress_b_row" id="wpsm_progress_b_row_<?php echo $postId; ?>">
			<?php 
			if($TotalCount>0) 
			{
				// echo "my design";
				require('designs/design'.$templates.'/index.php');
			}
			else{
				echo "<h3> No Progressbar Found </h3>";
			}
			
			?>
		</div>
		
	<?php	
	endwhile; ?>
	
	