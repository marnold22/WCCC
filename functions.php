<?php
  function wpdocs_WCCC_scripts(){
    // wp_enqueue_style('styles', get_stylesheet_uri());
    echo get_stylesheet_directory_uri();

  }

  function add_my_media_button() {
    echo '<a href="#" id="insert-my-media" class="button">Add my media</a>';
  }

  function include_media_button_js_file(){
    $media_path = '/../wp-content/themes/WCCC/assets/js/media_button.js';
    wp_enqueue_script('media_button', $media_path, array('jquery'), NULL, true);
  }

  function image_slider_page(){
    wp_enqueue_media();
    include_media_button_js_file();
    add_my_media_button();
  }

  function image_slider_menu_item()
  {
  	add_menu_page("Image Slider", "Image Slider", "manage_options", "image-slider", "image_slider_page", null, 99);
  }

  add_action("admin_menu", "image_slider_menu_item");
  add_action('wp_enqueue_media', 'include_media_button_js_file');
  add_action('media_buttons', 'add_my_media_button', 15);

?>
