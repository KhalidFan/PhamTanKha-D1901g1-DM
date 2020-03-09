<?php
/**
 * Plugin Premium Offer Page
 *
 * @package Hero Banner Ultimate
 * @since 1.1.2
 */

if ( !defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
?>
<div class="wrap">

	<h2><?php _e( 'Hero Banner Ultimate :- Features', 'hero-banner-ultimate' ); ?></h2><br />

	<style>
		.wprps-notice{padding: 10px; color: #3c763d; background-color: #dff0d8; border:1px solid #d6e9c6; margin: 0 0 20px 0;}
		.wpos-plugin-pricing-table thead th h2{font-weight: 400; font-size: 2.4em; line-height:normal; margin:0px; color: #2ECC71;}
		.wpos-plugin-pricing-table thead th h2 + p{font-size: 1.25em; line-height: 1.4; color: #999; margin:5px 0 5px 0;}

		table.wpos-plugin-pricing-table{width:90%; text-align: left; border-spacing: 0; border-collapse: collapse; -webkit-box-sizing: border-box; -moz-box-sizing: border-box; box-sizing: border-box;}

		.wpos-plugin-pricing-table th, .wpos-plugin-pricing-table td{font-size:14px; line-height:normal; color:#444; vertical-align:middle; padding:12px;}

		.wpos-plugin-pricing-table colgroup:nth-child(1) { width: 31%; border: 0 none; }
		.wpos-plugin-pricing-table colgroup:nth-child(2) { width: 22%; border: 1px solid #ccc; }
		.wpos-plugin-pricing-table colgroup:nth-child(3) { width: 25%; border: 10px solid #2ECC71; }

		/* Tablehead */
		.wpos-plugin-pricing-table thead th {background-color: #fff; background:linear-gradient(to bottom, #ffffff 0%, #ffffff 100%); text-align: center; position: relative; border-bottom: 1px solid #ccc; padding: 1em 0 1em; font-weight:400; color:#999;}
		.wpos-plugin-pricing-table thead th:nth-child(1) {background: transparent;}
		.wpos-plugin-pricing-table thead th:nth-child(3) {padding:1em 2px 3.5em 2px; }	
		.wpos-plugin-pricing-table thead th:nth-child(3) p{color:#000;}	
		.wpos-plugin-pricing-table thead th p.promo {font-size: 14px; color: #fff; position: absolute; bottom:0; left: -17px; z-index: 1000; width: 100%; margin: 0; padding: .625em 17px .75em; background-color: #ca4a1f; box-shadow: 0 2px 4px rgba(0,0,0,.25); border-bottom: 1px solid #ca4a1f;}
		.wpos-plugin-pricing-table thead th p.promo:before {content: ""; position: absolute; display: block; width: 0px; height: 0px; border-style: solid; border-width: 0 7px 7px 0; border-color: transparent #900 transparent transparent; bottom: -7px; left: 0;}
		.wpos-plugin-pricing-table thead th p.promo:after {content: ""; position: absolute; display: block; width: 0px; height: 0px; border-style: solid; border-width: 7px 7px 0 0; border-color: #900 transparent transparent transparent; bottom: -7px; right: 0;}

		/* Tablebody */
		.wpos-plugin-pricing-table tbody th{background: #fff; border-left: 1px solid #ccc; font-weight: 600;}
		.wpos-plugin-pricing-table tbody th span{font-weight: normal; font-size: 87.5%; color: #999; display: block;}

		.wpos-plugin-pricing-table tbody td{background: #fff; text-align: center;}
		.wpos-plugin-pricing-table tbody td .dashicons{height: auto; width: auto; font-size:30px;}
		.wpos-plugin-pricing-table tbody td .dashicons-no-alt{color: #ca4a1f;}
		.wpos-plugin-pricing-table tbody td .dashicons-yes{color: #2ECC71;}

		.wpos-plugin-pricing-table tbody tr:nth-child(even) th,
		.wpos-plugin-pricing-table tbody tr:nth-child(even) td { background: #f5f5f5; border: 1px solid #ccc; border-width: 1px 0 1px 1px; }
		.wpos-plugin-pricing-table tbody tr:last-child td {border-bottom: 0 none;}

		/* Table Footer */
		.wpos-plugin-pricing-table tfoot th, .wpos-plugin-pricing-table tfoot td{text-align: center; border-top: 1px solid #ccc;}
		.wpos-plugin-pricing-table tfoot a{font-weight: 600; color: #fff; text-decoration: none; text-transform: uppercase; display: inline-block; padding: 1em 2em; background: #ca4a1f; border-radius: .2em;}
		
		.essential-plugin-bundle{clear:both; margin-bottom:15px;}
		.essential-plugin-bundle img{max-width:100%;}
	</style>
	<div class="essential-plugin-bundle">
		<a href="https://www.wponlinesupport.com/pricing/?ref=WposPratik&utm_source=WP&utm_medium=WP-Plugins&utm_campaign=Essential-Plugin-Banner" target="_blank"><img src="https://www.wponlinesupport.com/plugin-data-api/images/plugin-bundle-banner.png?time=<?php echo current_time('timestamp'); ?>" alt="essential-plugin-bundle" /></a>
	</div>

	<table class="wpos-plugin-pricing-table">
		<colgroup></colgroup>
		<colgroup></colgroup>
		<colgroup></colgroup>	
	   	    <thead>
	    	<tr>
	    		<th></th>
	    		<th>
	    			<h2>Free</h2>
	    			<p>$0 USD</p>
	    		</th>
	    		<th>
	    			<h2>Premium</h2>
	    			<p>Gain access to <strong>Hero Banner Ultimate</strong> included in <br /><strong>Essential Plugin Bundle</p>
	    			
	    			<p class="promo">Our most valuable package!</p>
	    		</th>	    		
	    	</tr>
	    </thead>

	    <tfoot>
	    	<tr>
	    		<th></th>
	    		<td></td>
	    		<td><p>Gain access to <strong>Hero Banner Ultimate</strong> included in <br /><strong>Essential Plugin Bundle</p>
				<a href="https://www.wponlinesupport.com/pricing/?ref=WposPratik&utm_source=WP&utm_medium=WP-Plugins&utm_campaign=Upgrade-PRO" target="_blank">View Buying Options</a></td>
	    	</tr>
	    </tfoot>
		<tbody>
			<tr>
				<th>Layout  <span class="subtext">Select Layout and make website better.</span></th>
				<td>4 </td>
				<td>10</td>
			</tr>			
			
			<tr>
				<th>Banner Type<span>You can set Banner Type.</span></th>
				<td><i class="dashicons dashicons-yes"></i></td>
				<td><i class="dashicons dashicons-yes"></i></td>
			</tr>
			<tr>
				<th>Background Color & Image <span>You can set background color and image for slider.</span></th>
				<td><i class="dashicons dashicons-yes"></i></td>
				<td><i class="dashicons dashicons-yes"></i></td>
			</tr>
			<tr>
				<th>Background Video and Poster <span>You can upload video background in slider.</span></th>
				<td><i class="dashicons dashicons-yes"></i></td>
				<td><i class="dashicons dashicons-yes"></i></td>
			</tr>
			<tr>
				<th>Banner Width, Font Size  <span>Set Slider banner width and font size.</span></th>
				<td><i class="dashicons dashicons-yes"></i></td>
				<td><i class="dashicons dashicons-yes"></i></td>
			</tr>
			
			<tr>
				<th>Uppercase Title and Sub-Title  <span class="subtext">Make Title and Sub-Title Uppercase or not.</span></th>
				<td><i class="dashicons dashicons-no-alt"> </i></td>
				<td><i class="dashicons dashicons-yes"> </i></td>
			</tr>
			<tr>
				<th>Banner Title & Content Color  <span>Set Banner Title and Content color.</span></th>
				<td><i class="dashicons dashicons-yes"></i></td>
				<td><i class="dashicons dashicons-yes"></i></td>
			</tr>
			<tr>
				<th>Call to Action Button  <span>Set call to action button link and class. </span></th>
				<td><i class="dashicons dashicons-yes"></i></td>
				<td><i class="dashicons dashicons-yes"></i></td>
			</tr>
			<tr>
				<th>Mobile Responsive Settings   <span class="subtext">You can set font size and set image size for mobile.</span></th>
				<td><i class="dashicons dashicons-no-alt"> </i></td>
				<td><i class="dashicons dashicons-yes"> </i></td>
			</tr>
			
			
			<tr>
	    		<th>Automatic Update <span>Get automatic  plugin updates </span></th>
	    		<td>Lifetime</td>
	    		<td>Lifetime</td>
	    	</tr>
			<tr>
			<th>Support <span class="subtext">Get support for plugin</span></th>
			<td>Limited</td>
			<td>1 Year</td>
			</tr>
			</tbody>
	</table>
</div>