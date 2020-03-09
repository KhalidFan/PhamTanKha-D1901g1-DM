<?php
if ( ! defined( 'ABSPATH' ) ) exit;
add_shortcode( 'PROGRESSBAR_WP', 'PROGRESSBAR_WP_REG_ShortCode' );
function PROGRESSBAR_WP_REG_ShortCode( $Id ) {
	ob_start();	
	if(!isset($Id['id'])) 
	 {
		$PROGRESS_WP_ID = "";
	 } 
	else 
	{
		$PROGRESS_WP_ID = $Id['id'];
	}
	// echo $PROGRESS_WP_ID;
	require("content.php"); 
	wp_reset_query();
    return ob_get_clean();
}
?>