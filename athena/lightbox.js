jQuery(document).ready(function() {
    var fileInput = '',
        upload_field_name = '',
        tb_interval;

    jQuery('.close-btn').click(function() {
        jQuery('#lightbox').hide();
        jQuery( '#deity_lb' ).attr( 'src', function ( i, val ) { return val; });
    });

    jQuery('.upload_image_trigger').click(function() {
        fileInput = jQuery(this).parent().children('.submit_url')
        upload_field_name = jQuery(this).parent().attr('field_value')

        tb_interval = setInterval( function() {
            jQuery('#deity_lb').contents().find('.savesend .button').val('Use for ' + upload_field_name);
        }, 2000 );

        post_id = jQuery('#post_ID').val();
        jQuery('#lightbox').show();
        return false;
    });

    jQuery('.upload_image_reset').click(function() {
        jQuery(this).parent().prev('input.uploadfield').val('');
    });

    window.original_send_to_editor = window.send_to_editor;
    window.send_to_editor = function(html){
        if (fileInput) {
            clearInterval(tb_interval);
            fileurl = jQuery('img',html).attr('src');
            fileInput.val(fileurl);

            jQuery('#lightbox').hide();
            jQuery( '#deity_lb' ).attr( 'src', function ( i, val ) { return val; });
        } else {
            window.original_send_to_editor(html);
        }
    };

});