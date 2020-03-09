<style>

#wpsm_progress_b_row_<?php echo $postId; ?> .wpsm_progress .wpsm_progress-pro-bar {
    background: <?php echo $slider_bg_clr; ?>;
    margin:5px 0 20px 0;
}

#wpsm_progress_b_row_<?php echo $postId; ?> .wpsm_progress .wpsm_progress-title{
    font-size: <?php echo $progress_title_font_size; ?>px;
    font-weight: <?php echo $progress_title_font_weight; ?>;
	font-family: <?php echo $font_family; ?>;
    color: <?php echo $progress_title_clr; ?>;
    line-height: 22px;
}
#wpsm_progress_b_row_<?php echo $postId; ?> .wpsm_progress .wpsm_progress-value{
    line-height: 22px;
    position: absolute;
    top: 0;
    right: 0;
	font-style: normal;
	font-size: <?php echo $progress_title_font_size; ?>px;
    font-weight: <?php echo $progress_title_font_weight; ?>;
    color: <?php echo $slider_op_clr; ?>;
}

#wpsm_progress_b_row_<?php echo $postId; ?> .wpsm_progress .wpsm_progress-bar {
	background-color: <?php echo $slider_clr; ?>;
    animation: animate-positive 2s;
    height:4px;
}

@-webkit-keyframes animate-positive{
    0% { width: 0%; }
}
@keyframes animate-positive{
    0% { width: 0%; }
}

<?php echo $custom_css; ?>
</style>
