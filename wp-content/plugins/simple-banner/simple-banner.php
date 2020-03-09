<?php
/**
 * Plugin Name: Simple Banner
 * Plugin URI: https://github.com/rpetersen29/simple-banner
 * Description: Display a simple banner at the top of your website.
 * Version: 2.2.2
 * Author: Ryan Petersen
 * Author URI: http://rpetersen29.github.io/
 * License: GPL2
 *
 * @package Simple Banner
 * @version 2.2.2
 * @author Ryan Petersen <rpetersen.dev@gmail.com>
 */
define ('VERSION', '2.2.2');

add_action( 'wp_enqueue_scripts', 'simple_banner' );
function simple_banner() {
    // Enqueue the style
		wp_register_style('simple-banner-style',  plugin_dir_url( __FILE__ ) .'simple-banner.css', '', VERSION);
    wp_enqueue_style('simple-banner-style');
		// Set Script parameters
		$script_params = array(
			// script specific parameters
			'simple_banner_text' => get_option('simple_banner_text'),
			'pro_version_enabled' => get_option('pro_version_enabled'),
			'in_array' => in_array(get_the_ID(), explode(",", get_option('disabled_pages_array'))),
			// debug specific parameters
			'debug_mode' => get_option('debug_mode'),
			'id' => get_the_ID(),
			'disabled_pages_array' => explode(",", get_option('disabled_pages_array')),
			'simple_banner_color' => get_option('simple_banner_color'),
			'simple_banner_text_color' => get_option('simple_banner_text_color'),
			'simple_banner_link_color' => get_option('simple_banner_link_color'),
			'simple_banner_text' => get_option('simple_banner_text'),
			'simple_banner_custom_css' => get_option('simple_banner_custom_css'),
			'site_custom_css' => get_option('site_custom_css'),
			'site_custom_js' => get_option('site_custom_js')
		);
		// Enqueue the script
    wp_register_script('simple-banner-script', plugin_dir_url( __FILE__ ) . 'simple-banner.js', array( 'jquery' ), VERSION);
		wp_localize_script('simple-banner-script', 'scriptParams', $script_params);
    wp_enqueue_script('simple-banner-script');
}

//add custom CSS colors
add_action( 'wp_head', 'simple_banner_custom_color');
function simple_banner_custom_color()
{
	if (get_option('simple_banner_color') != ""){
		echo '<style type="text/css" media="screen">.simple-banner{background:' . get_option('simple_banner_color') . "};</style>";
	}

	if (get_option('simple_banner_text_color') != ""){
		echo '<style type="text/css" media="screen">.simple-banner .simple-banner-text{color:' . get_option('simple_banner_text_color') . "};</style>";
	}

	if (get_option('simple_banner_link_color') != ""){
		echo '<style type="text/css" media="screen">.simple-banner .simple-banner-text a{color:' . get_option('simple_banner_link_color') . "};</style>";
	}

	if (get_option('simple_banner_custom_css') != ""){
		echo '<style type="text/css" media="screen">.simple-banner{'. get_option('simple_banner_custom_css') . "};</style>";
	}

	if (get_option('site_custom_css') != "" && get_option('pro_version_enabled')) {
		echo '<style type="text/css" media="screen">'. get_option('site_custom_css') . "</style>";
	}

	if (get_option('site_custom_js') != "" && get_option('pro_version_enabled')) {
		echo '<script type="text/javascript">'. get_option('site_custom_js') . "</script>";
	}
}

add_action('admin_menu', 'simple_banner_menu');
function simple_banner_menu() {
	add_menu_page('Simple Banner Settings', 'Simple Banner', 'administrator', 'simple-banner-settings', 'simple_banner_settings_page', 'dashicons-admin-generic');
}

add_action( 'admin_init', 'simple_banner_settings' );
function simple_banner_settings() {
	register_setting( 'simple-banner-settings-group', 'simple_banner_color' );
	register_setting( 'simple-banner-settings-group', 'simple_banner_text_color' );
	register_setting( 'simple-banner-settings-group', 'simple_banner_link_color' );
	register_setting( 'simple-banner-settings-group', 'simple_banner_text' );
	register_setting( 'simple-banner-settings-group', 'simple_banner_custom_css' );
	register_setting( 'simple-banner-settings-group', 'pro_version_activation_code' );
	register_setting( 'simple-banner-settings-group', 'pro_version_enabled' );
	register_setting( 'simple-banner-settings-group', 'disabled_pages_array' );
	register_setting( 'simple-banner-settings-group', 'site_custom_css' );
	register_setting( 'simple-banner-settings-group', 'site_custom_js' );
	register_setting( 'simple-banner-settings-group', 'debug_mode' );
}

function simple_banner_settings_page() {
	?>
	<?php
		if (esc_attr( get_option('pro_version_activation_code') ) == "SBPROv1-14315") {
			update_option('pro_version_enabled', true);
		} else {
			update_option('pro_version_enabled', false);
		}
	?>

	<div class="wrap">
		<div style="display: flex;justify-content: space-between;">
			<h2>Simple Banner Settings</h2>
			<a class="button button-primary button-hero" style="font-weight: 700;" href="https://www.paypal.me/rpetersenDev" target="_blank">DONATE</a>
		</div>


		<p>Use Hex color values for the color fields.</p>
		<p>Links in the banner text must be typed in with HTML <code>&lt;a&gt;</code> tags.
		<br />e.g. <code>This is a &lt;a href=&#34;http:&#47;&#47;www.wordpress.com&#34;&gt;Link to Wordpress&lt;&#47;a&gt;</code>.</p>

		<!-- Preview Banner -->
		<div id="preview_banner" class="simple-banner" style="width: 100%;text-align: center;">
			<div id="preview_banner_text" class="simple-banner-text" style="font-size: 1.1em;font-weight: 700;padding: 10px;">
				<span>This is what your banner will look like with a <a href="/">link</a>.</span>
			</div>
		</div>
		<br>
		<span><b>*Note: Font and text styles subject to change based on chosen theme CSS.</b></span>

		<!-- Settings Form -->
		<form method="post" action="options.php">
			<?php settings_fields( 'simple-banner-settings-group' ); ?>
			<?php do_settings_sections( 'simple-banner-settings-group' ); ?>
			<table class="form-table">
				<!-- Background Color -->
				<tr valign="top">
					<th scope="row">Simple Banner Background Color<br><span style="font-weight:400;">(Leaving this blank sets the color to the default value #024985)</span></th>
					<td style="vertical-align:top;">
						<input type="text" id="simple_banner_color" name="simple_banner_color" placeholder="Hex value"
										value="<?php echo esc_attr( get_option('simple_banner_color') ); ?>" />
						<input style="height: 30px;width: 100px;" type="color" id="simple_banner_color_show"
										value="<?php echo ((get_option('simple_banner_color') == '') ? '#024985' : esc_attr( get_option('simple_banner_color') )); ?>">
					</td>
				</tr>
				<!-- Text Color -->
				<tr valign="top">
					<th scope="row">Simple Banner Text Color<br><span style="font-weight:400;">(Leaving this blank sets the color to the default value white)</span></th>
					<td style="vertical-align:top;">
						<input type="text" id="simple_banner_text_color" name="simple_banner_text_color" placeholder="Hex value"
										value="<?php echo esc_attr( get_option('simple_banner_text_color') ); ?>" />
						<input style="height: 30px;width: 100px;" type="color" id="simple_banner_text_color_show"
										value="<?php echo ((get_option('simple_banner_text_color') == '') ? '#ffffff' : esc_attr( get_option('simple_banner_text_color') )); ?>">
					</td>
				</tr>
				<!-- Link Color-->
				<tr valign="top">
					<th scope="row">Simple Banner Link Color<br><span style="font-weight:400;">(Leaving this blank sets the color to the default value #f16521)</span></th>
					<td style="vertical-align:top;">
						<input type="text" id="simple_banner_link_color" name="simple_banner_link_color" placeholder="Hex value"
										value="<?php echo esc_attr( get_option('simple_banner_link_color') ); ?>" />
						<input style="height: 30px;width: 100px;" type="color" id="simple_banner_link_color_show"
										value="<?php echo ((get_option('simple_banner_link_color') == '') ? '#f16521' : esc_attr( get_option('simple_banner_link_color') )); ?>">
					</td>
				</tr>
				<!-- Text Contents -->
				<tr valign="top">
					<th scope="row">
						Simple Banner Text
						<br><span style="font-weight:400;">(Leaving this blank removes the banner)</span>
					</th>
						<td>
							<textarea id="simple_banner_text" style="height: 150px;width: 75%;" name="simple_banner_text"><?php echo get_option('simple_banner_text'); ?></textarea>
						</td>
				</tr>
				<!-- Custom CSS -->
				<tr valign="top">
					<th scope="row">
						Simple Banner Custom CSS
						<br><span style="font-weight:400;">CSS will be applied directly to the <code>simple-banner</code> class.</span>
						<br><span style="font-weight:400;color:red;">Be very careful, bad CSS can break the banner.</span>
					</th>
					<td>
						<div>.simple-banner {</div>
						<textarea id="simple_banner_custom_css" style="height: 150px;width: 75%;" name="simple_banner_custom_css"><?php echo get_option('simple_banner_custom_css'); ?></textarea>
						<div>}</div>
					</td>
				</tr>
			</table>

			<!-- Pro Features -->
			<div style="padding: 0 10px;border: 1px solid #24282e;border-radius: 10px;background-color: #fafafa;">
				<h2>Pro Features
					<?php
						if (!get_option('pro_version_enabled')) {
							echo '<a class="button-primary" href="https://simple-banner.square.site/" target="_blank">Purchase Pro Version</a>';
						}
					?>
				</h2>

				<table class="form-table">
					<!-- Activation Code -->
					<tr valign="top" style="<?php if (get_option('pro_version_enabled')) { echo 'display: none;'; } ?>">
						<th scope="row">
							Activation Code
						</th>
						<td>
							<input type="text" style="border: 2px solid gold;border-radius: 5px;" id="pro_version_activation_code" name="pro_version_activation_code" value="<?php echo get_option('pro_version_activation_code'); ?>" />
						</td>
					</tr>
					<!-- Disabled Pages -->
					<tr valign="top">
						<th scope="row">
							Disabled Pages
							<br><span style="font-weight:400;">Disable Simple Banner on the following pages.</span>
						</th>
						<td>
							<div id="simple_banner_pro_disabled_pages">
								<?php
									$pages = get_pages();
									$disabled = !get_option('pro_version_enabled');
									$disabled_pages_array = get_option('disabled_pages_array');
									$parent_checkbox = '<input type="checkbox" ';
									$parent_checkbox .= $disabled ? 'disabled ' : '';
									$parent_checkbox .= (!$disabled && in_array(1, explode(",", $disabled_pages_array))) ? 'checked ' : '';
									$parent_checkbox .= 'value="1">';
									$parent_checkbox .= get_option( 'blogname' ) . ' | ' . get_site_url() . ' ';
									$parent_checkbox .= '</input><br>';
									echo $parent_checkbox;
									foreach ( $pages as $page ) {
										$checkbox = '<input type="checkbox"';
										$checkbox .= $disabled ? 'disabled ' : '';
										$checkbox .= (!$disabled && in_array($page->ID, explode(",", $disabled_pages_array))) ? 'checked ' : '';
										$checkbox .= 'value="' . $page->ID . '">';
										$checkbox .= $page->post_title . ' | ' . get_page_link( $page->ID ) . ' ';
										$checkbox .= '</input><br>';
										echo $checkbox;
									}
								?>
							</div>
							<?php
								if (get_option('pro_version_enabled')) {
									echo '<input type="text" hidden id="disabled_pages_array" name="disabled_pages_array" value="'. get_option('disabled_pages_array') . '" />';
								}
							?>
						</td>
					</tr>
					<!-- Website Custom CSS -->
					<tr valign="top">
						<th scope="row">
							Website Custom CSS
							<br><span style="font-weight:400;">CSS will be applied to the entire website</span>
						</th>
						<td>
							<?php
								if (get_option('pro_version_enabled')) {
									echo '<textarea id="site_custom_css" style="height: 150px;width: 75%;" name="site_custom_css">'. get_option('site_custom_css') . '</textarea>';
								} else {
									echo '<textarea style="height: 150px;width: 75%;" disabled></textarea>';
								}
							?>
						</td>
					</tr>
					<!-- Website Custom JS -->
					<tr valign="top">
						<th scope="row">
							Website Custom JS
							<br><span style="font-weight:400;">JavaScript will be applied to the entire website</span>
						</th>
						<td>
							<?php
								if (get_option('pro_version_enabled')) {
									echo '<textarea id="site_custom_js" style="height: 150px;width: 75%;" name="site_custom_js">'. get_option('site_custom_js') . '</textarea>';
								} else {
									echo '<textarea style="height: 150px;width: 75%;" disabled></textarea>';
								}
							?>
						</td>
					</tr>
					<!-- Debug Mode -->
					<tr valign="top">
						<th scope="row">
							Debug Mode
							<br><span style="font-weight:400;">If enabled, will log all variables in the console of your browser</span>
						</th>
						<td>
							<?php
								if (get_option('pro_version_enabled')) {
									$checked = get_option('debug_mode') ? 'checked ' : '';
									echo '<input type="checkbox" id="debug_mode" '. $checked . ' name="debug_mode" />';
								} else {
									echo '<input type="checkbox" disabled />';
								}
							?>
						</td>
					</tr>
				</table>
			</div>

			<!-- Save Changes Button -->
			<?php submit_button(); ?>
		</form>
	</div>

	<!-- Script to apply styles to Preview Banner -->
	<script type="text/javascript">
		var style_background_color = document.createElement('style');
		var style_link_color = document.createElement('style');
		var style_text_color = document.createElement('style');
		var style_custom_css = document.createElement('style');

		// Banner Text
		document.getElementById('preview_banner_text').innerHTML = document.getElementById('simple_banner_text').value != "" ? '<span>'+document.getElementById('simple_banner_text').value+'</span>' : '<span>This is what your banner will look like with a <a href="/">link</a>.</span>';
		document.getElementById('simple_banner_text').onchange=function(e){
			document.getElementById('preview_banner_text').innerHTML = e.target.value != "" ? '<span>'+e.target.value+'</span>' : '<span>This is what your banner will look like with a <a href="/">link</a>.</span>';
		};

		// Background Color
		style_background_color.type = 'text/css';
		style_background_color.id = 'preview_banner_background_color'
		style_background_color.appendChild(document.createTextNode('.simple-banner{background:' + (document.getElementById('simple_banner_color').value || '#024985') + '}'));
		document.getElementsByTagName('head')[0].appendChild(style_background_color);

		document.getElementById('simple_banner_color').onchange=function(e){
			document.getElementById('simple_banner_color_show').value = e.target.value || '#024985';
			var child = document.getElementById('preview_banner_background_color');
			if (child){child.innerText = "";child.id='';}

			var style_dynamic = document.createElement('style');
			style_dynamic.type = 'text/css';
			style_dynamic.id = 'preview_banner_background_color';
			style_dynamic.appendChild(
				document.createTextNode(
					'.simple-banner{background:' + (document.getElementById('simple_banner_color').value || '#024985') + '}'
				)
			);
			document.getElementsByTagName('head')[0].appendChild(style_dynamic);
		};
		document.getElementById('simple_banner_color_show').onchange=function(e){
			document.getElementById('simple_banner_color').value = e.target.value;
			document.getElementById('simple_banner_color').dispatchEvent(new Event('change'));
		};

		// Text Color
		style_text_color.type = 'text/css';
		style_text_color.id = 'preview_banner_text_color'
		style_text_color.appendChild(document.createTextNode('.simple-banner .simple-banner-text{color:' + (document.getElementById('simple_banner_text_color').value || '#ffffff') + '}'));
		document.getElementsByTagName('head')[0].appendChild(style_text_color);

		document.getElementById('simple_banner_text_color').onchange=function(e){
			document.getElementById('simple_banner_text_color_show').value = e.target.value || '#ffffff';
			var child = document.getElementById('preview_banner_text_color');
			if (child){child.innerText = "";child.id='';}

			var style_dynamic = document.createElement('style');
			style_dynamic.type = 'text/css';
			style_dynamic.id = 'preview_banner_text_color';
			style_dynamic.appendChild(
				document.createTextNode(
					'.simple-banner .simple-banner-text{color:' + (document.getElementById('simple_banner_text_color').value || '#ffffff') + '}'
				)
			);
			document.getElementsByTagName('head')[0].appendChild(style_dynamic);
		};
		document.getElementById('simple_banner_text_color_show').onchange=function(e){
			document.getElementById('simple_banner_text_color').value = e.target.value;
			document.getElementById('simple_banner_text_color').dispatchEvent(new Event('change'));
		};

		// Link Color
		style_link_color.type = 'text/css';
		style_link_color.id = 'preview_banner_link_color'
		style_link_color.appendChild(document.createTextNode('.simple-banner .simple-banner-text a{color:' + (document.getElementById('simple_banner_link_color').value || '#f16521') + '}'));
		document.getElementsByTagName('head')[0].appendChild(style_link_color);

		document.getElementById('simple_banner_link_color').onchange=function(e){
			document.getElementById('simple_banner_link_color_show').value = e.target.value || '#f16521';
			var child = document.getElementById('preview_banner_link_color');
			if (child){child.innerText = "";child.id='';}

			var style_dynamic = document.createElement('style');
			style_dynamic.type = 'text/css';
			style_dynamic.id = 'preview_banner_link_color';
			style_dynamic.appendChild(
				document.createTextNode(
					'.simple-banner .simple-banner-text a{color:' + (document.getElementById('simple_banner_link_color').value || '#f16521') + '}'
				)
			);
			document.getElementsByTagName('head')[0].appendChild(style_dynamic);
		};
		document.getElementById('simple_banner_link_color_show').onchange=function(e){
			document.getElementById('simple_banner_link_color').value = e.target.value;
			document.getElementById('simple_banner_link_color').dispatchEvent(new Event('change'));
		};

		// Custom CSS
		style_custom_css.type = 'text/css';
		style_custom_css.id = 'preview_banner_custom_stylesheet'
		style_custom_css.appendChild(document.createTextNode('.simple-banner{'+document.getElementById('simple_banner_custom_css').value+'}'));
		document.getElementsByTagName('head')[0].appendChild(style_custom_css);

		document.getElementById('simple_banner_custom_css').onchange=function(){
			var child = document.getElementById('preview_banner_custom_stylesheet');
			if (child){child.innerText = "";child.id='';}

			var style_dynamic = document.createElement('style');
			style_dynamic.type = 'text/css';
			style_dynamic.id = 'preview_banner_custom_stylesheet';
			style_dynamic.appendChild(
				document.createTextNode(
					'.simple-banner{'+document.getElementById('simple_banner_custom_css').value+'}'
				)
			);
			document.getElementsByTagName('head')[0].appendChild(style_dynamic);
		};

		// Disabled Pages
		document.getElementById('simple_banner_pro_disabled_pages').onclick=function(e){
			let disabledPagesArray = [];
			Array.from(document.getElementById('simple_banner_pro_disabled_pages').getElementsByTagName('input')).forEach(function(e) {
				if (e.checked) {
					disabledPagesArray.push(e.value);
				}
			});
			document.getElementById('disabled_pages_array').value = disabledPagesArray;
		};

		// remove banner text newlines on submit
		document.getElementById('submit').onclick=function(e){
			document.getElementById('simple_banner_text').value = document.getElementById('simple_banner_text').value.replace(/\n/g, "");
		};
	</script>
	<?php
}
?>
