/**
 * Theme Options Scripts
 */
 
jQuery( document ).ready( function() {
 
    /* WP Media Uploader */
    var _shr_media = true;
    var _orig_send_attachment = wp.media.editor.send.attachment;
 
    jQuery( '.shr-image' ).click( function() {
 
        var button = jQuery( this ),
                textbox_id = jQuery( this ).attr( 'data-id' ),
                image_id = jQuery( this ).attr( 'data-src' ),
                _shr_media = true;
 
        wp.media.editor.send.attachment = function( props, attachment ) {
 
            if ( _shr_media && ( attachment.type === 'image' ) ) {
                if ( image_id.indexOf( "," ) !== -1 ) {
                    image_id = image_id.split( "," );
                    $image_ids = '';
                    jQuery.each( image_id, function( key, value ) {
                        if ( $image_ids )
                            $image_ids = $image_ids + ',#' + value;
                        else
                            $image_ids = '#' + value;
                    } );
 
                    var current_element = jQuery( $image_ids );
                } else {
                    var current_element = jQuery( '#' + image_id );
                }
 
                jQuery( '#' + textbox_id ).val( attachment.id );
                //console.log(textbox_id)
                current_element.attr( 'src', attachment.url ).show();
            } else {
                alert( 'Please select a valid image file' );
                return false;
            }
        }
 
        wp.media.editor.open( button );
        return false;
    } );
	
	jQuery( '#product_image_meta_button' ).click( function() {
	
		var button = $(this);
                var image_src = $('#get_img');
				var image_id = $('#image_id');
                wp.media.editor.send.attachment = function(props, attachment) {
                    //image_src.attr('src', attachment.url);
					//image_id.val(attachment.id);
					console.log(attachment.id + ' ' + attachment.url);
					jQuery(".my_product_images").append('<input type="hidden" name="image_id[]" id="image_id" value="'+attachment.id+'"/--><li class="my_image_id" name="image_id" data-attachment_id="'+attachment.id+'"><img width="150" height="150" src="'+attachment.url+'" class="attachment-thumbnail size-thumbnail" alt="" srcset="'+attachment.url+'" /></li>');
							
                };
                wp.media.editor.open(button);
                return false;
            
	
	
	});
 
} );
