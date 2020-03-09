<div class="progressbar_pro_admin_wrapper">
	<div class="wpsm_site_sidebar_widget_title">
		<h4>Designs</h4>
	</div>
	<?php
		$PostId = get_the_ID();
	    $Settings = unserialize(get_post_meta( $PostId, 'progressbar_wp_Shortcode_Settings', true));
        
		//  $templates = $Settings['templates'];
		  $option_names = array(
			    "templates"   	=> "1"
			  );

			 foreach($option_names as $option_name => $default_value) {
				if(isset($Settings[$option_name])) 
					${"" . $option_name}  = $Settings[$option_name];
				else
					${"" . $option_name}  = $default_value;
			} 
			
	
	?>
	<input type="hidden" id="progressbar_wp_setting_save_action" name="progressbar_wp_setting_save_action" value="wpsm_progressbox_setting_save_action">


		<?php for($i=1;$i<=2;$i++){ ?>
			<div class="col-md-3">
				<div class="demoftr">	
					<span class="checked_temp" id="checked_temp_<?php echo $i; ?>" <?php if($templates!=$i) { ?>  style="display:none" <?php } ?> ><i class="fa fa-check"></i></span>
						<div class="wpsm_home_portfolio_showcase">
							<img class="wpsm_img_responsive ftr_img" src="<?php echo progress_bar_wp_directory_url.'assets/images/design/progress-'.$i.'.png'?>">
						</div>
						<div class="wpsm_home_portfolio_links">
							<h3 class="text-center pull-left">Design <?php echo $i; ?></h3>
							<button type="button" <?php if($templates==$i) { ?> disabled="disabled" <?php } ?> class="pull-right btn btn-primary design_btn" id="templates_btn<?php echo $i; ?>" onclick="select_template('<?php echo $i; ?>')"><?php if($templates==$i){  echo "Selected"; } else { echo "Select"; } ?></button>
							<input type="radio" name="templates" id="design<?php echo $i; ?>" value="<?php echo $i; ?>" <?php if($templates==$i){  echo "checked"; } ?> style="display:none">
						</div>		
				
				</div>	
			</div>
		<?php } ?>	
	  <div class="col-md-3">
				<div class="demoftr">	
					<div class="wpsm_home_portfolio_showcase">
							<a target="_blank" href="https://wpshopmart.com/plugins/progress-bar-pro/" ><img class="wpsm_img_responsive ftr_img" src="<?php echo progress_bar_wp_directory_url.'assets/images/design/progress-3.png'; ?>"></a>
						</div>
						<div class="wpsm_home_portfolio_links">
							
						<h3 class="text-center pull-left" style="margin-top: 10px;margin-bottom: 10px;font-weight:900">Pro Templates </h3>
						<a   class="pull-right btn btn-danger " target="_blank" href="http://demo.wpshopmart.com/progress-bar-pro-demo/" >Check Demo</a>
								
						</div>		
				
				</div>	
			</div>

	</div> <!-- cd-panel -->
	
	<script>
	jQuery(document).ready(function($){
	//open the lateral panel
	$('#cd-btn-h').on('click', function(event){
		event.preventDefault();
		$('#cd-panel-h').addClass('is-visible');
	});
	//clode the lateral panel
	$('#cd-panel-h').on('click', function(event){
		if( $(event.target).is('#cd-panel-h') || $(event.target).is('#cd-panel-close-h') ) { 
			$('#cd-panel-h').removeClass('is-visible');
			event.preventDefault();
		}
	});
});
	</script>


<script>

function select_template(id)
{
	
	jQuery(".design_btn").attr('style','');
	jQuery(".design_btn").prop("disabled", false);
	jQuery(".design_btn").text("Select");
	
	jQuery(".checked_temp").hide();
	jQuery("#checked_temp_"+id).show();

	jQuery("#templates_btn"+id).attr('disabled','disabled');
	jQuery("#templates_btn"+id).attr('style','background:#F50000;border-color:#F50000;');
	jQuery("#templates_btn"+id).text("Selected");
	 jQuery("#design"+id).prop( "checked", true );
	
}

</script>