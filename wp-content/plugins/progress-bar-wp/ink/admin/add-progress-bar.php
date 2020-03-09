<?php if ( ! defined( 'ABSPATH' ) ) exit; ?>
<div style=" overflow: hidden;padding: 10px;">
	<div class="wpsm_site_sidebar_widget_title">
		<h4>Add Progressbar</h4>
	</div>
	<input type="hidden" name="progressbar_save_data_action" value="progressbar_save_data_action" />
	<ul class="clearfix" id="accordion_panel">
	 <style>
    output {
            font-size: 18px;
            font-weight: bold;
        }
  </style>	
	<?php
	   
	    $Settings = unserialize(get_post_meta( $post->ID, 'progressbar_wp_Shortcode_Settings', true));

		
			$i=1;
			$data = unserialize(get_post_meta( $post->ID, 'progressbar_wp_data', true));
			$TotalCount =  get_post_meta( $post->ID, 'progressbar_wp_count', true );
		
			if($TotalCount) 
			{ 
				if($TotalCount!=-1)
				{
					foreach($data as $single_data)
					{
						$progress_title = $single_data['progress_title'];
						$progress_size = $single_data['progress_size'];
						?>
						<li class="wpsm_ac-panel single_acc_box" >
						<span class="ac_label"><?php _e('Progress Title',progress_bar_wp_text_domain); ?></span>
						<input type="text" id="progress_title[]" name="progress_title[]" value="<?php echo  $progress_title; ?>" placeholder="Enter Title Here" class="wpsm_ac_label_text">
						<span class="ac_label"><?php _e('Set ProgressBar Percentage',progress_bar_wp_text_domain); ?></span> 
                        <div>
                        <input type="range" min="1" max="100" name="progress_size[]" value="<?php echo $progress_size; ?>" data-rangeSlider>
                        <output></output>
                        </div>	
                        <div style="margin-bottom: 30px;"></div>
									
						<a class="remove_button" href="#delete" id="remove_bt" ><i class="fa fa-trash-o"></i></a>
						</li>
						<?php 
						$i++;
					} // end of foreach
				}else{
				echo "<h2>No Faq Found</h2>";
				}
			}
			else 
			{
				for($i=1; $i<=2; $i++)
				  {
				  ?>
					 
			  <li class="wpsm_ac-panel single_acc_box" >
						<span class="ac_label"><?php _e('Progress Title',progress_bar_wp_text_domain); ?></span>
						<input type="text" id="progress_title[]" name="progress_title[]" value="Sample Title" placeholder="Enter Progress Title Here" class="wpsm_ac_label_text">
						<br><br>
						<span class="ac_label"><?php _e('Set ProgressBar Percentage',progress_bar_wp_text_domain); ?></span> 
                        <div>
                        <input type="range" min="1" max="100" name="progress_size[]" data-rangeSlider>
                        <output></output>
                        </div>
                    <div style="margin-bottom: 30px;"></div>
                    <a class="remove_button" href="#delete" id="remove_bt" ><i class="fa fa-trash-o"></i></a>
			   </li>
					 <?php
				    }
			}
			?>
	</ul>
</div>
<a class="wpsm_ac-panel add_wpsm_ac_new" id="add_new_ac" onclick="add_new_accordion()">
	<?php _e('Add New Progress Bar', progress_bar_wp_text_domain); ?>
</a>
<a  style="float: left;padding:10px !important;background:#31a3dd;" class=" add_wpsm_ac_new delete_all_acc" id="delete_all_acc"    >
	<i style="font-size:57px;"class="fa fa-trash-o"></i>
	<span style="display:block"><?php _e('Delete All',progress_bar_wp_text_domain); ?></span>
</a>
<div style="clear:left;"></div>

<?php
require('add-progressbar-wp-js.php'); 
require('customRange-js.php');
?>
