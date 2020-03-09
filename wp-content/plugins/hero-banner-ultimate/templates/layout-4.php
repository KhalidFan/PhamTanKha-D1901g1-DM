<div class="hbupro-hero-banner-inner hbupro-clearfix">
	<div class="hbupro-hero-banner-inner-wrap">	
		<div class=" hbupro-medium-6 hbupro-offest-medium-6 hbupro-columns hbupro-hero-content-position hbupro-text-left">
			<h2 class="hbupro-hero-banner-title"><?php echo esc_html($banner_title); ?></h2>
			<div class="hbupro-hero-banner-sub-title"><?php echo $hbupro_content; ?></div>			
			<?php if (!empty($banner_button_one_name) || !empty($banner_button_two_name)) 
				{ ?>
				<div class="hbupro-hero-banner-links">
					<?php if (!empty($banner_button_one_name)) { ?>
					<a class="hbupro-button <?php echo esc_attr($banner_button_one_class); ?>" href="<?php echo esc_url($banner_button_one_link); ?>"><?php echo esc_html($banner_button_one_name); ?></a>
					<?php }
					if (!empty($banner_button_two_name)) { ?>
					<a class="hbupro-button <?php echo esc_attr($banner_button_two_class); ?>" href="<?php echo esc_url($banner_button_two_link) ; ?>"><?php echo esc_html($banner_button_two_name); ?></a>
					<?php } ?>				
				</div>
				<?php } ?>
		</div>		
	</div>	
</div>