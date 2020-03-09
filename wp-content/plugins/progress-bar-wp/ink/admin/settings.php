<?php 
 if ( ! defined( 'ABSPATH' ) ) exit;
 $PostID = $post->ID;
 $Settings = unserialize(get_post_meta( $PostID, 'progressbar_wp_Shortcode_Settings', true));

		$option_names = array(
			    'progress_title_clr' 		        => "#000000",
	            'progress_title_font_size'	        => "18",
				'progress_title_font_weight'        => "300",
				'margin_size'                       => "",
				'slider_bg_clr'                     => "#e5e5e5",
				'slider_bg_size'                    => "18",
				'slider_clr'                        => "#3398da",
				'slider_handle_clr'                 => "#c1c1c1",
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
        
		?>

<style>
.ac_tooltip{
	display:none;
}

.modal-body{
position: relative;
padding: 15px;
overflow: hidden;
}
				
</style>

<input type="hidden" id="progressbar_wp_setting_save_action" name="progressbar_wp_setting_save_action" value="wpsm_progressbox_setting_save_action">
		
<table class="form-table acc_table">
	<tbody>
	
	   
		<tr class="pb_ind_clr_enable_class">
			<th scope="row"><label><?php _e('Title Color',progress_bar_wp_text_domain); ?></label>
			<a  class="ac_tooltip" href="#help" data-tooltip="#acc_title_bg_clr_tp"><i class="fa fa-lightbulb-o"></i></a>
				
			</th>
			<td>
				<input id="progress_title_clr" name="progress_title_clr" type="text" value="<?php echo $progress_title_clr; ?>" class="my-color-field" data-default-color="#e8e8e8" />
				<!-- Tooltip -->
				<div id="acc_title_bg_clr_tp" style="display:none;">
					<div style="color:#fff !important;padding:10px;">
						<h2 style="color:#fff !important;"><?php _e('Faq Title Background Colour',progress_bar_wp_text_domain); ?></h2>
						<img src="<?php echo wpshopmart_progress_bar_pro_directory_url.'assets/tooltip/img/test.png'; ?>">
					</div>
		    	</div>
			</td>
		</tr>
		
		<tr>
		    <th>
		    <span><?php _e('Title Font Size',progress_bar_wp_text_domain); ?></span> 
            </th>               
		    <td><div>
                <input type="range" min="1" max="100" name="progress_title_font_size" value="<?php echo $progress_title_font_size; ?>" data-rangeSlider>
                <output></output>
            </div></td>
		</tr>
		
		<tr>
		    <th>
		    <span><?php _e('Title Font Weight',progress_bar_wp_text_domain); ?></span> 
            </th>               
		    <td><div>
                <input type="range" min="100" step="100" max="900" name="progress_title_font_weight" value="<?php echo $progress_title_font_weight; ?>" data-rangeSlider>
                <output></output>
            </div></td>
		</tr>
	
		<tr class="pb_ind_clr_enable_class">
			<th scope="row"><label><?php _e('Slider background Color',progress_bar_wp_text_domain); ?></label>
			<a  class="ac_tooltip" href="#help" data-tooltip="#acc_title_bg_clr_tp"><i class="fa fa-lightbulb-o"></i></a>
				
			</th>
			<td>
				<input id="slider_bg_clr" name="slider_bg_clr" type="text" value="<?php echo $slider_bg_clr; ?>" class="my-color-field" data-default-color="#e8e8e8" />
				<!-- Tooltip -->
				<div id="acc_title_bg_clr_tp" style="display:none;">
					<div style="color:#fff !important;padding:10px;">
						<h2 style="color:#fff !important;"><?php _e('Faq Title Background Colour',progress_bar_wp_text_domain); ?></h2>
						<img src="<?php echo wpshopmart_progress_bar_pro_directory_url.'assets/tooltip/img/test.png'; ?>">
					</div>
		    	</div>
			</td>
		</tr>
		
				<tr class="pb_ind_clr_enable_class">
			<th scope="row"><label><?php _e('fore Slider Color',progress_bar_wp_text_domain); ?></label>
			<a  class="ac_tooltip" href="#help" data-tooltip="#acc_title_bg_clr_tp"><i class="fa fa-lightbulb-o"></i></a>
				
			</th>
			<td>
				<input id="slider_clr" name="slider_clr" type="text" value="<?php echo $slider_clr; ?>" class="my-color-field" data-default-color="#e8e8e8" />
				<!-- Tooltip -->
				<div id="acc_title_bg_clr_tp" style="display:none;">
					<div style="color:#fff !important;padding:10px;">
						<h2 style="color:#fff !important;"><?php _e('Faq Title Background Colour',progress_bar_wp_text_domain); ?></h2>
						<img src="<?php echo wpshopmart_progress_bar_pro_directory_url.'assets/tooltip/img/test.png'; ?>">
					</div>
		    	</div>
			</td>
		</tr>
		
				<tr class="pb_ind_clr_enable_class">
			<th scope="row"><label><?php _e('Slider handle Color',progress_bar_wp_text_domain); ?></label>
			<a  class="ac_tooltip" href="#help" data-tooltip="#acc_title_bg_clr_tp"><i class="fa fa-lightbulb-o"></i></a>
				
			</th>
			<td>
				<input id="slider_handle_clr" name="slider_handle_clr" type="text" value="<?php echo $slider_handle_clr; ?>" class="my-color-field" data-default-color="#e8e8e8" />
				<!-- Tooltip -->
				<div id="acc_title_bg_clr_tp" style="display:none;">
					<div style="color:#fff !important;padding:10px;">
						<h2 style="color:#fff !important;"><?php _e('Faq Title Background Colour',progress_bar_wp_text_domain); ?></h2>
						<img src="<?php echo wpshopmart_progress_bar_pro_directory_url.'assets/tooltip/img/test.png'; ?>">
					</div>
		    	</div>
			</td>
		</tr>
		
				<tr class="pb_ind_clr_enable_class">
			<th scope="row"><label><?php _e('% Color',progress_bar_wp_text_domain); ?></label>
			<a  class="ac_tooltip" href="#help" data-tooltip="#acc_title_bg_clr_tp"><i class="fa fa-lightbulb-o"></i></a>
				
			</th>
			<td>
				<input id="slider_op_clr" name="slider_op_clr" type="text" value="<?php echo $slider_op_clr; ?>" class="my-color-field" data-default-color="#e8e8e8" />
				<!-- Tooltip -->
				<div id="acc_title_bg_clr_tp" style="display:none;">
					<div style="color:#fff !important;padding:10px;">
						<h2 style="color:#fff !important;"><?php _e('Faq Title Background Colour',progress_bar_wp_text_domain); ?></h2>
						<img src="<?php echo wpshopmart_progress_bar_pro_directory_url.'assets/tooltip/img/test.png'; ?>">
					</div>
		    	</div>
			</td>
		</tr>
		
		<tr >
			<th><?php _e('Font Style/Family',progress_bar_wp_text_domain); ?> 
			<a  class="ac_tooltip" href="#help" data-tooltip="#font_family_tp"><i class="fa fa-lightbulb-o"></i></a>
				
			</th>
			<td>	
				<select name="font_family" id="font_family" class="standard-dropdown" style="width:100%" >
					<optgroup label="Default Fonts">
						<option value="Arial"           <?php if($font_family == 'Arial' ) { echo "selected"; } ?>>Arial</option>
						<option value="Arial Black"    <?php if($font_family == 'Arial Black' ) { echo "selected"; } ?>>Arial Black</option>
						<option value="Courier New"     <?php if($font_family == 'Courier New' ) { echo "selected"; } ?>>Courier New</option>
						<option value="Georgia"         <?php if($font_family == 'Georgia' ) { echo "selected"; } ?>>Georgia</option>
						<option value="Grande"          <?php if($font_family == 'Grande' ) { echo "selected"; } ?>>Grande</option>
						<option value="Helvetica" 	<?php if($font_family == 'Helvetica' ) { echo "selected"; } ?>>Helvetica Neue</option>
						<option value="Impact"         <?php if($font_family == 'Impact' ) { echo "selected"; } ?>>Impact</option>
						<option value="Lucida"         <?php if($font_family == 'Lucida' ) { echo "selected"; } ?>>Lucida</option>
						<option value="Lucida Grande"         <?php if($font_family == 'Lucida Grande' ) { echo "selected"; } ?>>Lucida Grande</option>
						<option value="Open Sans"   <?php if($font_family == 'Open Sans' ) { echo "selected"; } ?>>Open Sans</option>
						<option value="OpenSansBold"   <?php if($font_family == 'OpenSansBold' ) { echo "selected"; } ?>>OpenSansBold</option>
						<option value="Palatino Linotype"       <?php if($font_family == 'Palatino Linotype' ) { echo "selected"; } ?>>Palatino</option>
						<option value="Sans"           <?php if($font_family == 'Sans' ) { echo "selected"; } ?>>Sans</option>
						<option value="sans-serif"           <?php if($font_family == 'sans-serif' ) { echo "selected"; } ?>>Sans-Serif</option>
						<option value="Tahoma"         <?php if($font_family == 'Tahoma' ) { echo "selected"; } ?>>Tahoma</option>
						<option value="Times New Roman"          <?php if($font_family == 'Times New Roman' ) { echo "selected"; } ?>>Times New Roman</option>
						<option value="Trebuchet"      <?php if($font_family == 'Trebuchet' ) { echo "selected"; } ?>>Trebuchet</option>
						<option value="Verdana"        <?php if($font_family == 'Verdana' ) { echo "selected"; } ?>>Verdana</option>
						<option value="0"        <?php if($font_family == '0' ) { echo "selected"; } ?>>Theme Default Font Style</option>
					</optgroup>
				</select>
				<!-- Tooltip -->
				<div id="font_family_tp" style="display:none;">
					<div style="color:#fff !important;padding:10px;max-width: 300px;">
						<h2 style="color:#fff !important;">You can update Title and Description Font Family/Style from here. Select any one form these options.</h2>
					
					</div>
		    	</div>
				
			</td>
		</tr>
		<tr>
			<th><label><?php _e('progress Box Column Display layout ',progress_bar_wp_text_domain); ?> </label>
				<a  class="ac_tooltip" href="#help" data-tooltip="#pb_layout_tp"><i class="fa fa-lightbulb-o"></i></a>
			</th>
			<td>
			    
				<select name="pb_layout" id="pb_layout" class="standard-dropdown" style="width:100%" >
						<option value="12"  <?php if($pb_layout == '12' ) { echo "selected"; } ?>>1 Column Layout</option>
						<option value="6"  <?php if($pb_layout == '6' ) { echo "selected"; } ?>>2 Column Layout</option>
						<option value="4"  <?php if($pb_layout == '4' ) { echo "selected"; } ?>>3 Column Layout</option>
						<option value="3"  <?php if($pb_layout == '3' ) { echo "selected"; } ?>>4 Column Layout</option>

				</select>
				<div id="pb_layout_tp" style="display:none;">
					<div style="color:#fff !important;padding:10px;max-width: 300px;">
						<h2 style="color:#fff !important;">Testimonial Column Display layout</h2>
					</div>
		    	</div>
			</td>
		</tr>
	
		
		<script>
		jQuery('.ac_tooltip').darkTooltip({
				opacity:1,
				gravity:'east',
				size:'small'
			});
			
			function hide_color_setting(){
				
			 value = jQuery("input[name=pb_ind_clr_enable]:checked").val();
			 
			 if(value=="no"){
				jQuery(".pb_ind_clr_enable_class").show(500);
				jQuery(".pb_ind_clr_option_class").hide(500);
				
			}else{
				
				jQuery(".pb_ind_clr_enable_class").hide(500);
				jQuery(".pb_ind_clr_option_class").show(500);
			}
			
		}
		</script>
	</tbody>
</table>
