<?php

  //IMAGE SLIDER------------------------------------------------------------------------
  add_action("admin_menu", "image_slider_menu_item");
  add_action('wp_enqueue_media', 'image_slider_include_media_button_js_file');
  add_action( 'admin_menu', 'image_slider_register_media_selector_settings' );
  add_action( 'admin_footer', 'image_slider_media_selector_print_scripts' );

  function image_slider_menu_item(){
  	add_menu_page("Image Slider", "Image Slider", "administrator", __FILE__, "image_slider_settings_page", null);
    add_action('admin_init', 'register_image_slider_settings');
  }
  function image_slider_register_media_selector_settings(){
    register_setting('image-slider-settings-group', 'image_selection');
    register_setting('image-slider-settings-group', 'logo_selection');
    register_setting('image-slider-settings-group', 'slogan_selection');
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

        <input id="image-selection" type="hidden" name="image_selection" value="<?php echo esc_attr( get_option('image_selection')); ?>"/>
        <input id="upload-image-button" type="button" name="select-image" value="Choose Images">

        <h1>Logo Selection</h1>
        <div class="logo-container" style="display: block; width: 100%;">
          <?php
              $image_url_string = get_option('logo_selection');
              $image_url_array = explode(" , ", $image_url_string);
              if(sizeof($image_url_array) > 0) {
                echo "<img src=\"".$image_url_array[0]."\" style='height:100px; width:auto; padding:5px;'>";
              }
          ?>
        </div>
        <input id="logo-selection" type="hidden" name="logo_selection" value="<?php echo esc_attr( get_option('logo_selection')); ?>"/>
        <input id="upload-logo-button" type="button" name="select-logo" value="Choose Logo">


        <h1>Slogan Selection</h1>
        <input id="slogan-selection" type="text" name="slogan_selection" value="<?php echo esc_attr( get_option('slogan_selection')); ?>"/>

        <?php submit_button(); ?>
      </form>
    </div>
    <!-- This is where the HTML ends -->
    <?php
  }
  function image_slider_media_selector_print_scripts() {
  	$my_saved_attachment_post_id = get_option( 'media_selector_attachment_id', 0 );
  	?>
    <script type='text/javascript'>
  		jQuery( document ).ready( function( $ ) {
  			// Uploading files
  			var file_frame;
  			var set_to_post_id = <?php echo $my_saved_attachment_post_id; ?>; // Set this
  			jQuery('#upload-image-button, #upload-logo-button').on('click', function( event ){
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

            var id = $(event.target).attr('id');
            if(id === 'upload-image-button'){
              var imageIDs = "";
              for(var i = 0; i < attachments.length; i++){
                imageIDs += attachments[i].attributes.url;
                //if we haven't hit the last item, append a comma for deliminating
                if(i <= attachments.length - 2){
                  imageIDs += " , ";
                }
              }
              $('#image-selection').val(imageIDs);
            }else if(id === 'upload-logo-button'){
              if(attachments.length > 0){
                $('#logo-selection').val(attachments[0].attributes.url);
              }
            }



            // var imageWrapper = $('#image-preview-wrapper');
            // var postWrapper = $('#image-selection');
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

  //GOOGLE MAPS PLUGIN------------------------------------------------------------------------

  add_action("admin_menu", "google_maps_menu_item");


  //WIDGETS PLUGIN------------------------------------------------------------------------

    /**
   * Register our sidebars and widgetized areas.
   *
   */
  function arphabet_widgets_init() {

  	register_sidebar( array(
  		'name'          => 'Home right sidebar',
  		'id'            => 'home_right_1',
  		'before_widget' => '<div>',
  		'after_widget'  => '</div>',
  		'before_title'  => '<h2 class="rounded">',
  		'after_title'   => '</h2>',
  	) );
    
    register_sidebar( array(
      'name'          => 'Footer',
      'id'            => 'footer',
      'before_widget' => '<div>',
      'after_widget'  => '</div>',
      'before_title'  => '<h2 class="rounded">',
      'after_title'   => '</h2>',
    ) );

  }
  add_action( 'widgets_init', 'arphabet_widgets_init' );

  //Category Catcher------------------------------------------------------------------------

  function get_posts_for_category($category) {
    $args = array('category_name' => $category);
    return get_posts( $args );
  }

?>
