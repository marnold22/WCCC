<?php
  // function wpdocs_WCCC_scripts(){
  //   // wp_enqueue_style('styles', get_stylesheet_uri());
  //   echo get_stylesheet_directory_uri();
  //
  // }

  // function add_my_media_button() {
  //   echo '<a href="#" id="insert-my-media" class="button">Add my media</a>';
  // }
  //
  // function include_media_button_js_file(){
  //   $media_path = '/../wp-content/themes/WCCC/assets/js/media_button.js';
  //   wp_enqueue_script('media_button', $media_path, array('jquery'), NULL, true);
  // }
  //
  function image_slider_page(){
    media_selector_settings_page_callback();
  }

  function image_slider_menu_item()
  {
  	add_menu_page("Image Slider", "Image Slider", "manage_options", "image-slider", "image_slider_page", null, 99);
  }

  add_action("admin_menu", "image_slider_menu_item");
  add_action('wp_enqueue_media', 'include_media_button_js_file');
  add_action('media_buttons', 'add_my_media_button', 15);

  add_action( 'admin_menu', 'register_media_selector_settings_page' );
  function register_media_selector_settings_page() {
  	add_submenu_page( 'options-general.php', 'Media Selector', 'Media Selector', 'manage_options', 'media-selector', 'media_selector_settings_page_callback' );
  }
  function media_selector_settings_page_callback() {
  	// Save attachment ID
  	if ( isset( $_POST['submit_image_selector'] ) && isset( $_POST['image_attachment_id'] ) ) :
  		update_option( 'media_selector_attachment_id', absint( $_POST['image_attachment_id'] ) );
  	endif;
  	wp_enqueue_media();
  	?><form method='post'>
  		<div id='image-preview-wrapper'>
  			<!-- <img class='image-preview' src='<?php echo wp_get_attachment_url( get_option( 'media_selector_attachment_id' ) ); ?>' height='100'> -->
  		</div>
  		<input id="upload_image_button" type="button" class="button" value="<?php _e( 'Upload image' ); ?>" />
      <div id='post-info' type='hidden'>
  		<!-- <input type='hidden' name='image_attachment_id' id='image_attachment_id' value='<?php echo get_option( 'media_selector_attachment_id' ); ?>'> --></div>
  		<input type="submit" name="submit_image_selector" value="Save" class="button-primary">
  	</form><?php
  }
  add_action( 'admin_footer', 'media_selector_print_scripts' );
  function media_selector_print_scripts() {
  	$my_saved_attachment_post_id = get_option( 'media_selector_attachment_id', 0 );
  	?><script type='text/javascript'>
  		jQuery( document ).ready( function( $ ) {
  			// Uploading files
  			var file_frame;
  			var wp_media_post_id = wp.media.model.settings.post.id; // Store the old id
  			var set_to_post_id = <?php echo $my_saved_attachment_post_id; ?>; // Set this
  			jQuery('#upload_image_button').on('click', function( event ){
  				event.preventDefault();
  				// If the media frame already exists, reopen it.
  				if ( file_frame ) {
  					// Set the post ID to what we want
  					file_frame.uploader.uploader.param( 'post_id', set_to_post_id );
  					// Open frame
  					file_frame.open();
  					return;
  				} else {
  					// Set the wp.media post id so the uploader grabs the ID we want when initialised
  					wp.media.model.settings.post.id = set_to_post_id;
  				}
  				// Create the media frame.
  				file_frame = wp.media.frames.file_frame = wp.media({
  					title: 'Select a image to upload',
  					button: {
  						text: 'Use this image',
  					},
  					multiple: true	// Set to true to allow multiple files to be selected
  				});
  				// When an image is selected, run a callback.
  				file_frame.on( 'select', function() {
  					// We set multiple to false so only get one image from the uploader
  					attachments = file_frame.state().get('selection').toArray();
            var imageWrapper = $('#image-preview-wrapper');
            var postWrapper = $('#post-info');
            for(var i = 0; i < attachments.length; i++){
              console.log(attachments[i]);
              var element = '<img src="'+attachments[i].attributes.url+'" style="height: 100px; width: auto;"></img>';
              $(imageWrapper).append(element);
              var postinfo = "<input type='hidden' name='image_attachment_id' id='image_attachment_id' value='"+ attachments[i].id +"'>";
              $(postWrapper).append(postinfo);
            }
  					// // Do something with attachment.id and/or attachment.url here
  					// $( '#image-preview' ).attr( 'src', attachment.url ).css( 'width', 'auto' );
  					// $( '#image_attachment_id' ).val( attachment.id );
  					// Restore the main post ID
  					wp.media.model.settings.post.id = wp_media_post_id;
  				});
  					// Finally, open the modal
  					file_frame.open();
  			});
  			// Restore the main ID when the add media button is pressed
  			jQuery( 'a.add_media' ).on( 'click', function() {
  				wp.media.model.settings.post.id = wp_media_post_id;
  			});
  		});
  	</script><?php
  }



?>
