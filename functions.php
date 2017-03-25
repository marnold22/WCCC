<?php

  add_action("admin_menu", "image_slider_menu_item");
  add_action('wp_enqueue_media', 'include_media_button_js_file');
  add_action('media_buttons', 'add_my_media_button', 15);

  add_action( 'admin_menu', 'register_media_selector_settings' );
  add_action( 'admin_footer', 'media_selector_print_scripts' );

  function image_slider_menu_item()
  {
  	add_menu_page("Image Slider", "Image Slider", "administrator", __FILE__, "image_slider_settings_page", null);
    add_action('admin_init', 'register_image_slider_settings');
  }

  function register_media_selector_settings() {
    register_setting('image-slider-settings-group', 'image_selection');
  }

  function image_slider_settings_page(){
    wp_enqueue_media();
    ?>
    <!-- This is where the HTML begins -->
    <div class="wrap">
      <h1>Image Slider</h1>
      <form method="post" action="options.php">
        <?php settings_fields('image-slider-settings-group'); ?>
        <?php do_settings_sections('image-slider-settings-group'); ?>

        <div class="image-container" style="display: block; width: 100%;">
        <?php
            $image_url_string = get_option('image_selection');
            $image_url_array = explode(" , ", $image_url_string);
            for ($i=0; $i < sizeof($image_url_array); $i++) {
              echo "<img src=\"".$image_url_array[$i]."\" style='height:100px; width:auto; padding:5px;'>";
            }
        ?>
      </div>

        <input id="post-info" type="hidden" name="image_selection" value="<?php echo esc_attr( get_option('image_selection')); ?>"/>
        <input id="upload_image_button" type="button" name="select-image" value="Choose Images">
        <?php submit_button(); ?>
      </form>
    </div>
    <!-- This is where the HTML ends -->
    <?php
  }


  function media_selector_print_scripts() {
  	$my_saved_attachment_post_id = get_option( 'media_selector_attachment_id', 0 );
  	?>
    <script type='text/javascript'>
  		jQuery( document ).ready( function( $ ) {
  			// Uploading files
  			var file_frame;
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
  				} //else {
  				// 	// Set the wp.media post id so the uploader grabs the ID we want when initialised
  				// 	wp.media.model.settings.post.id = set_to_post_id;
  				// }
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
            var imageIDs = "";
            for(var i = 0; i < attachments.length; i++){
              imageIDs += attachments[i].attributes.url;
              //if we haven't hit the last item, append a comma for deliminating
              if(i <= attachments.length - 2){
                imageIDs += " , ";
              }
            }
            console.log(imageIDs);
            $('#post-info').val(imageIDs);


            // var imageWrapper = $('#image-preview-wrapper');
            // var postWrapper = $('#post-info');
            // for(var i = 0; i < attachments.length; i++){
            //   console.log(attachments[i]);
            //   var element = '<img src="'+attachments[i].attributes.url+'" style="height: 100px; width: auto;"></img>';
            //   $(imageWrapper).append(element);
            //   var postinfo = "<input type='hidden' name='image_attachment_id' id='image_attachment_id' value='"+ attachments[i].id +"'>";
            //   $(postWrapper).append(postinfo);
            // }


  				});
  					// Finally, open the modal
  					file_frame.open();
  			});
  		});
  	</script>
    <?php
  }



?>
