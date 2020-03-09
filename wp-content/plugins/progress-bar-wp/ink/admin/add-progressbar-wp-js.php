<?php if ( ! defined( 'ABSPATH' ) ) exit; ?>
<script>
var j = 1000;

	function add_new_accordion(){
	
	var outputPanel = '<li class="wpsm_ac-panel single_acc_box" >'+
							'<span class="ac_label"><?php _e('Progress Title',progress_bar_wp_text_domain); ?></span>'+
							'<input type="text" id="progress_title[]" name="progress_title[]" value="" placeholder="Enter Progress Title Here" class="wpsm_ac_label_text">'+
							'<span class="ac_label"><?php _e('Set ProgressBar Percentage',progress_bar_wp_text_domain); ?></span>'+
                            '<div>'+
						    '<input type="range" min="1" max="100" name="progress_size[]" data-rangeSlider>'+
                            '<output></output>'+
                            '</div>'+
							'<div style="margin-bottom: 30px;"></div>'+
                            '<div class="modal fade"  id="color_modal_'+j+'" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">'+
                            '</div>'+							
							'<a class="remove_button" href="#delete" id="remove_bt" ><i class="fa fa-trash-o"></i></a>'+
							'</li>';
		
	jQuery(outputPanel).hide().appendTo("#accordion_panel").slideDown("slow");

	j++;
	hide_color_setting();
	jQuery('.my-color-field').wpColorPicker();
	
    // script for slider start
        var selector = '[data-rangeSlider]',
                elements = document.querySelectorAll(selector);

        // Example functionality to demonstrate a value feedback
        function valueOutput(element) {
            var value = element.value,
                    output = element.parentNode.getElementsByTagName('output')[0];
            output.innerHTML = value;
        }

        for (var i = elements.length - 1; i >= 0; i--) {
            valueOutput(elements[i]);
        }

        Array.prototype.slice.call(document.querySelectorAll('input[type="range"]')).forEach(function (el) {
            el.addEventListener('input', function (e) {
                valueOutput(e.target);
            }, false);
        });

        // Basic rangeSlider initialization
        rangeSlider.create(elements, {

            // Callback function
            onInit: function () {
            },

            // Callback function
            onSlideStart: function (value, percent, position) {
                //console.info('onSlideStart', 'value: ' + value, 'percent: ' + percent, 'position: ' + position);
            },

            // Callback function
            onSlide: function (value, percent, position) {
               // console.log('onSlide', 'value: ' + value, 'percent: ' + percent, 'position: ' + position);
            },

            // Callback function
            onSlideEnd: function (value, percent, position) {
               // console.warn('onSlideEnd', 'value: ' + value, 'percent: ' + percent, 'position: ' + position);
            }
        });
    // script for slider end
    
	}
	
	jQuery(document).ready(function(){

	  jQuery('#accordion_panel').sortable({
	  
	   revert: true,
	 
	  }); 
	});
	
</script>
<script>
	jQuery(function(jQuery)
		{
			var accordion = 
			{
				accordion_ul: '',
				init: function() 
				{
					this.accordion_ul = jQuery('#accordion_panel');

					this.accordion_ul.on('click', '.remove_button', function() {
					if (confirm('Are you sure you want to delete this?')) {
						jQuery(this).parent().slideUp(600, function() {
							jQuery(this).remove();
						});
					}
					return false;
					});
					 jQuery('#delete_all_acc').on('click', function() {
						if (confirm('Are you sure you want to delete all the Faq?')) {
							jQuery(".single_acc_box").slideUp(600, function() {
								jQuery(".single_acc_box").remove();
							});
							jQuery('html, body').animate({ scrollTop: 0 }, 'fast');
							
						}
						return false;
					});
					
			   }
			};
		accordion.init();
	});
</script>

