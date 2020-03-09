<?php 
 if ( ! defined( 'ABSPATH' ) ) exit;

 function progressbar_wp_front_script() {
		wp_enqueue_style('progress_wp_br_bootstrap', progress_bar_wp_directory_url.'assets/css/bootstrap.css');
	    wp_enqueue_style('progr_wp_b-font-awesome', progress_bar_wp_directory_url.'assets/css/font-awesome/css/font-awesome.min.css');
		wp_enqueue_style('progr_wp_jq-ae', progress_bar_wp_directory_url.'assets/css/meanmenu.min.css');
		wp_enqueue_style('progr_wp_animate-ae', progress_bar_wp_directory_url.'assets/css/animate.min.css');
		
		wp_enqueue_script('jquery');
	    wp_enqueue_script( 'progress_wp_br-home-js', progress_bar_wp_directory_url.'assets/js/jquery.meanmenu.js',array('jquery'), false, true);
	    wp_enqueue_script('pb_wp_wow-min-js',progress_bar_wp_directory_url.'assets/js/wow.min.js',array('jquery'), false, true);
        wp_enqueue_script( 'pbwp_scroll-js', progress_bar_wp_directory_url.'assets/js/jquery.scrollUp.min.js',array('jquery'), false, true);
		wp_enqueue_script('pbwp_way-min-js',progress_bar_wp_directory_url.'assets/js/waypoints.min.js',array('jquery'), false, true);		
	    wp_enqueue_script('pbwp_main-min-js',progress_bar_wp_directory_url.'assets/js/main.js',array('jquery'), false, true);
     }

 add_action('wp_enqueue_scripts', 'progressbar_wp_front_script');
 
add_action( 'admin_notices', 'dazz_pb_b_review' );
function dazz_pb_b_review() {

	// Verify that we can do a check for reviews.
	$review = get_option( 'dazz_pb_b_review' );
	$time	= time();
	$load	= false;
	if ( ! $review ) {
		$review = array(
			'time' 		=> $time,
			'dismissed' => false
		);
		add_option('dazz_pb_b_review', $review);
		//$load = true;
	} else {
		// Check if it has been dismissed or not.
		if ( (isset( $review['dismissed'] ) && ! $review['dismissed']) && (isset( $review['time'] ) && (($review['time'] + (DAY_IN_SECONDS * 2)) <= $time)) ) {
			$load = true;
		}
	}
	// If we cannot load, return early.
	if ( ! $load ) {
		return;
	}

	// We have a candidate! Output a review message.
	?>
	<div class="notice notice-info is-dismissible dazz-pb-b-review-notice">
		<div style="float:left;margin-right:10px;margin-bottom:5px;">
			<img style="width:100%;width: 150px;height: auto;" src="<?php echo progress_bar_wp_directory_url.'assets/images/pb.jpg'; ?>" />
		</div>
		<p style="font-size:18px;">'Hi! We saw you have been using <strong>Progress Bar plugin</strong> for a few days and wanted to ask for your help to <strong>make the plugin better</strong>.We just need a minute of your time to rate the plugin. Thank you!</p>
		<p style="font-size:18px;"><strong><?php _e( '~ Dazzlersoft', '' ); ?></strong></p>
		<p style="font-size:19px;"> 
			<a style="color: #fff;background: #ef4238;padding: 5px 7px 4px 6px;border-radius: 4px;" href="https://wordpress.org/support/plugin/progress-bar-wp/reviews/?filter=5#new-post" class="dazz-pb-b-dismiss-review-notice dazz-pb-b-review-out" target="_blank" rel="noopener">Rate the plugin</a>&nbsp; &nbsp;
			<a style="color: #fff;background: #27d63c;padding: 5px 7px 4px 6px;border-radius: 4px;" href="#"  class="dazz-pb-b-dismiss-review-notice dazz-rate-later" target="_self" rel="noopener"><?php _e( 'Nope, maybe later', '' ); ?></a>&nbsp; &nbsp;
			<a style="color: #fff;background: #31a3dd;padding: 5px 7px 4px 6px;border-radius: 4px;" href="#" class="dazz-pb-b-dismiss-review-notice dazz-rated" target="_self" rel="noopener"><?php _e( 'I already did', '' ); ?></a>
		</p>
	</div>
	<script type="text/javascript">
		jQuery(document).ready( function($) {
			$(document).on('click', '.dazz-pb-b-dismiss-review-notice, .dazz-pb-b-dismiss-notice .notice-dismiss', function( event ) {
				if ( $(this).hasClass('dazz-pb-b-review-out') ) {
					var dazz_rate_data_val = "1";
				}
				if ( $(this).hasClass('dazz-rate-later') ) {
					var dazz_rate_data_val =  "2";
					event.preventDefault();
				}
				if ( $(this).hasClass('dazz-rated') ) {
					var dazz_rate_data_val =  "3";
					event.preventDefault();
				}

				$.post( ajaxurl, {
					action: 'dazz_pb_b_dismiss_review',
					dazz_rate_data_pb_b : dazz_rate_data_val
				});
				
				$('.dazz-pb-b-review-notice').hide();
				//location.reload();
			});
		});
	</script>
	<?php
}

add_action( 'wp_ajax_dazz_pb_b_dismiss_review', 'dazz_pb_b_dismiss_review' );
function dazz_pb_b_dismiss_review() {
	if ( ! $review ) {
		$review = array();
	}
	
	if($_POST['dazz_rate_data_pb_b']=="1"){
		
	}
	if($_POST['dazz_rate_data_pb_b']=="2"){
		$review['time'] 	 = time();
		$review['dismissed'] = false;
		update_option( 'dazz_pb_b_review', $review );
	}
	if($_POST['dazz_rate_data_pb_b']=="3"){
		$review['time'] 	 = time();
		$review['dismissed'] = true;
		update_option( 'dazz_pb_b_review', $review );
	}
	die;
}


function dazz_progress_hi() {
 	if(get_post_type()=="progressbar_wp_r") {
		?>
		<style>
		@media screen and (max-width: 760px){
			.dazz_achi{
				display:none;
				
			}
		}
		.dazz_achi{
			    background-color: #4625a7;
    background: -webkit-linear-gradient(60deg, #4625a7, #915aff);
    background: linear-gradient(60deg, #4625a7, #915aff);
			-webkit-box-shadow: 0px 13px 21px -10px rgba(128,128,128,1);
			-moz-box-shadow: 0px 13px 21px -10px rgba(128,128,128,1);
			box-shadow: 0px 13px 21px -10px rgba(128,128,128,1);			
			margin-left: -20px;
			cursor: pointer;
			padding-top:20px;
			    overflow: HIDDEN;
			text-align: center;
		}
		.dazz_achi .wpsm_ac_h_b{
			color: white;
			font-size: 30px;
			font-weight: bolder;
			padding: 0 0 0px 0;
		}
		.dazz_achi .wpsm_ac_h_b .dashicons{
			font-size: 40px;
			position: absolute;
			margin-left: -45px;
			margin-top: -10px;
		}
		 .wpsm_ac_h_small{
			font-weight: bolder;
			color: white;
			font-size: 18px;
			padding: 0 0 15px 15px;
		}
		.dazz_achi a{
			text-decoration: none;
		}
		@media screen and ( max-width: 600px ) {
			.dazz_achi{ padding-top: 60px; margin-bottom: -50px; }
			.dazz_achi .WlTSmall { display: none; }
		}
		.texture-layer {
			background: rgba(0,0,0,0);
			padding-top: 0px;
			padding: 0px 0 23px 0;
		}
		.dazz_achi  ul{
			padding:0px 0px 0px 0px;
		}
		.dazz_achi  li {
			text-align:left;
			color:#fff;
			font-size: 16px;
			line-height: 26px;
			font-weight: 600;
			
		}
		.dazz_achi  li i{
			margin-right:6px ;
			margin-bottom:10px;	
			font-size: 12px;			
		}
		 
		.dazz_achi .btn-danger{
			font-size: 29px;
			background-color: #000000;
			border-radius:1px;
			margin-right:10px;
			margin-top: 0px;
			border-color:#000;
			 
		}
		.dazz_achi .btn-success{
			font-size: 28px;
			border-radius:1px;
			background-color: #ffffff;
			border-color: #ffffff;
			color:#000;
		}
		.btn-danger {
			color: #fff;
    background-color: #e0bf1b !important;
    border-color: #e0bf1b !important;
		}
		.pad-o{
			padding:0px;
			
		}

		
		</style>
		
		
		<div class="dazz_achi ">
				<div class="texture-layer">
					
				
					
					
						<div class="col-md-12">
							<div class="wpsm_ac_h_b col-md-6" style="text-align:left">
								<a class="btn btn-danger btn-lg " href="https://wpshopmart.com/plugins/progress-bar-pro/" target="_blank">Get Pro Version</a><a class="btn btn-success btn-lg " href="http://demo.wpshopmart.com/progress-bar-pro-demo/" target="_blank">View Demo</a>
							</div>								
							<div class="col-md-6" style="text-align:left">							
								<h1 style="color:#fff;font-size:34px;font-weight:800">ProgressBar/SkillBar Pro Plugin Features</h1>							
							</div>					
						
							<div class="col-md-12" style="padding-bottom:20px;">
								<a href="https://wpshopmart.com/plugins/tabs-pro-plugin/" target="_blank">
									<div class="col-md-3 pad-o">
										<ul>
											<li> <i class="fa fa-check"></i>32+ Design Templates </li>
											<li> <i class="fa fa-check"></i>Individual Color Scheme </li>
											<li> <i class="fa fa-check"></i>4+ Column Layout </li>
											<li> <i class="fa fa-check"></i>500+ Google Fonts </li>
										</ul>
										</ul>
									</div>
									<div class="col-md-3 pad-o">
										<ul>
								<li> <i class="fa fa-check"></i>Circular Pie Progress bar </li>
								<li> <i class="fa fa-check"></i>Skin Builder </li>
								<li> <i class="fa fa-check"></i>Widget Option </li>
								<li> <i class="fa fa-check"></i>Advance Animation  </li>
							</ul>
									</div>
									<div class="col-md-3 pad-o">
										<ul>	<li> <i class="fa fa-check"></i>Tested with 500+ Themes </li>
								<li> <i class="fa fa-check"></i>Gutenberg Comaptible </li>
								<li> <i class="fa fa-check"></i>Unlimited Shortcode </li>								
								<li> <i class="fa fa-check"></i>Drag And Drop Builder </li>
								
							</ul>
									</div>
									<div class="col-md-3 pad-o">
									<ul>		<li> <i class="fa fa-check"></i>Fully Color Customization </li>
								<li> <i class="fa fa-check"></i>Unlimited Color Scheme </li>
								<li> <i class="fa fa-check"></i>High Priority Support </li>
								<li> <i class="fa fa-check"></i>All Browser Compatible </li>
							</ul>
									</div>
								</a>
							</div>				
						</div>				
				</div>
			
			</div>
		<?php  
	}
}
add_action('in_admin_header','dazz_progress_hi'); 
?>