jQuery(document).ready(function($) {
	
	$('.hbupro-color-box').wpColorPicker();

	 // Media Uploader
    $( document ).on( 'click', '.banner-img-uploader', function() {
        
        var imgfield,showfield;
        imgfield = jQuery(this).prev('input').attr('id');
        showfield = jQuery(this).parents('td').find('.banner-imgs-preview');
        
        if(typeof wp == "undefined" || HbuproAdmin.new_ui != '1' ){ // Check for media uploader
            
            tb_show('', 'media-upload.php?type=image&amp;TB_iframe=true');
            
            window.original_send_to_editor = window.send_to_editor;
            window.send_to_editor = function(html) {
                
                if(imgfield) {
                    
                    var mediaurl = $('img',html).attr('src');
                    $('#'+imgfield).val(mediaurl);
                    showfield.html('<img src="'+mediaurl+'" />');
                    tb_remove();
                    imgfield = '';
                    
                } else {
                    
                    window.original_send_to_editor(html);
                    
                }
            };
            return false;
            
              
        } else {
            
            var file_frame;
            
            //new media uploader
            var button = jQuery(this);
        
            // If the media frame already exists, reopen it.
            if ( file_frame ) {
                file_frame.open();
              return;
            }
    
            // Create the media frame.
            file_frame = wp.media.frames.file_frame = wp.media({
                frame: 'post',
                state: 'insert',
                title: button.data( 'uploader-title' ),
                button: {
                    text: button.data( 'uploader-button-text' ),
                },
                multiple: false  // Set to true to allow multiple files to be selected
            });
    
            file_frame.on( 'menu:render:default', function(view) {
                // Store our views in an object.
                var views = {};
    
                // Unset default menu items
                view.unset('library-separator');
                view.unset('gallery');
                view.unset('featured-image');
                view.unset('embed');
    
                // Initialize the views in our view object.
                view.set(views);
            });
    
            // When an image is selected, run a callback.
            file_frame.on( 'insert', function() {
    
                // Get selected size from media uploader
                var selected_size = $('.attachment-display-settings .size').val();
                
                var selection = file_frame.state().get('selection');
                selection.each( function( attachment, index ) {
                    attachment = attachment.toJSON();
                    
                    // Selected attachment url from media uploader
                    var attachment_url = attachment.sizes[selected_size].url;
                    
                    if(index == 0){
                        // place first attachment in field
                        $('#'+imgfield).val(attachment_url);
                        showfield.html('<img src="'+attachment_url+'" />');
                        
                    } else{
                        $('#'+imgfield).val(attachment_url);
                        showfield.html('<img src="'+attachment_url+'" />');
                    }
                });
            });
    
            // Finally, open the modal
            file_frame.open();
        }
    });
    
    // Clear Media
    $( document ).on( 'click', '.banner-image-clear', function() {
        $(this).parent().find('.banner-img-upload-input').val('');
        $(this).parent().find('.banner-imgs-preview').html('');
    });
	

	// On change of button type
	$(document).on('change', '.hbupro-post-sett-tbl .banner-btn-type', function() { 
		var selected_button = $(this).val();		
		if(selected_button == 'bgcolor') {
			$('.hbupro-video').hide();	
			$('.hbupro-image').hide();
			$('.hbupro-bgcolor').fadeIn();
		}
		if(selected_button == 'bgcolor_image') {
			$('.hbupro-video').hide();	
			$('.hbupro-image').fadeIn();
			$('.hbupro-bgcolor').fadeIn();
		}
		if(selected_button =='image') {	
			$('.hbupro-bgcolor').hide();
			$('.hbupro-video').hide();
			$('.hbupro-image').fadeIn();
		}
		if(selected_button == 'video') {
			$('.hbupro-bgcolor').hide();	
			$('.hbupro-image').hide();
			$('.hbupro-video').fadeIn();
		}
		if(selected_button == 'video_image') {
			$('.hbupro-bgcolor').hide();	
			$('.hbupro-image').fadeIn();
			$('.hbupro-video').fadeIn();
		}
	});
	// On change of button type
	$(document).on('change', '.hbupro-post-sett-tbl .banner-color-type', function() { 
		var selected_button = $(this).val();		
		if(selected_button == 'gradient') {			
			$('.gradientcolor-type').fadeIn();
		}	else {
			$('.gradientcolor-type').hide();
		}
	});
});