    <div class="wpsm_site_sidebar_widget_title">
		<h4>Progressbar Shortcode</h4>
	</div>
		<p><?php _e("Use below shortcode in any Page/Post to publish your Progressbar", progress_bar_wp_text_domain);?></p>
		<input style="width:250px; height:50px; margin-bottom:10px;" readonly="readonly" type="text" value="<?php echo "[PROGRESSBAR_WP id=".get_the_ID()."]"; ?>">
		
		<?php
		 $PostId = get_the_ID();
		$Settings = unserialize(get_post_meta( $PostId, 'progressbar_wp_Shortcode_Settings', true));
		if(isset($Settings['custom_css'])){    
		     $custom_css   = $Settings['custom_css'];
		}
		else{
		$custom_css="";
		}		
		?>
		<h3 class="customcss-title">Custom Css</h3>
		<textarea name="custom_css" id="custom_css" ><?php echo $custom_css ; ?></textarea>
		<p style="
           background: #000;
           margin: 0px;
           text-align: Center;
           color: #fff;
           padding: 10px;"
		>Enter Css without <strong>&lt;style&gt; &lt;/style&gt; </strong> tag</p>
		<br>
		<script>
		  var editor = CodeMirror.fromTextArea(document.getElementById("custom_css"), {
		   lineNumbers: true,
		   styleActiveLine: true,
			matchBrackets: true,
			hint:true,
			theme : 'ambiance',
			extraKeys: {"Ctrl-Space": "autocomplete"},
		  });
		</script>
		