<style>
#wpsm_progress_b_row_<?php echo $postId; ?> .wpsm_progress{
    height: 5px;
    border-radius: 0;
    box-shadow: none;
    margin-bottom: 30px;
    overflow: visible;
}
#wpsm_progress_b_row_<?php echo $postId; ?> .wpsm_progress .wpsm_progress-pro-bar {
    background: <?php echo $slider_bg_clr; ?>;
    box-shadow: 0 1px 2px hsla(0, 0%, 0%, 0.1) inset;
    height:4px;
    margin-bottom: 20px;
    margin-top: 25px;
    position: relative;
}

#wpsm_progress_b_row_<?php echo $postId; ?> .wpsm_progress .wpsm_progress-title{
    font-size: <?php echo $progress_title_font_size; ?>px;
    font-weight: <?php echo $progress_title_font_weight; ?>;
	font-family: <?php echo $font_family; ?>;
    color: <?php echo $progress_title_clr; ?>;
    position: relative;
    top: -28px;
    z-index: 1;
}
#wpsm_progress_b_row_<?php echo $postId; ?> .wpsm_progress .wpsm_progress-value{
    float: right;
    margin-top: -30px;
	font-size: <?php echo $progress_title_font_size; ?>px;
    font-weight: <?php echo $progress_title_font_weight; ?>;
    color: <?php echo $slider_op_clr; ?>;
	font-style: normal;
}

#wpsm_progress_b_row_<?php echo $postId; ?> .wpsm_progress .wpsm_progress-bar {
    background-color: <?php echo $slider_clr; ?>;
    display: block;
    width: 0;
    height: 100%;
    position: absolute;
    top: 0;
    left: 0;
    transition: width 1s linear 0s;
	animation: animate-positive 2s;
}
#wpsm_progress_b_row_<?php echo $postId; ?> .wpsm_progress .wpsm_progress-bar:before {
    content: "";
    background-color: hsl(0, 0%, 100%);
    border-radius: 50%;
    width: 4px;
    height: 4px;
    position: absolute;
    right: 1px;
    top: 0;
    z-index: 1;
}
#wpsm_progress_b_row_<?php echo $postId; ?> .wpsm_progress .wpsm_progress-bar:after {
    content: "";
    width: 14px;
    height: 14px;
    background-color : <?php echo $slider_handle_clr; ?>;
    border-radius: 50%;
    position: absolute;
    right: -4px;
    top: -5px;
}

<?php
if($pb_ind_clr_enable=='yes')
	{	
		$k=2;
		 foreach($data as $single_data)
		{
			$indvid_slider_handle_clr = $single_data['indvid_slider_handle_clr'];
			?>
				
			 #wpsm_progress_b_row_<?php echo $postId; ?> .indCol:nth-child(<?php echo $k; ?>) .wpsm_progress-bar:after
			 {
			   background-color:<?php echo $indvid_slider_handle_clr; ?> !important;
			 }
			<?php
			 $k++; 
		}
	}
?>

@-webkit-keyframes animate-positive{
    0% { width: 0%; }
}
@keyframes animate-positive{
    0% { width: 0%; }
}

<?php echo $custom_css; ?>
</style>
