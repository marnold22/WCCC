<?php

//REQUIRES----------
require_once(get_template_directory().'/assets/partials/full-width-image.php');
require_once(get_template_directory().'/assets/partials/contact-form-7.php');
require_once(get_template_directory().'/assets/partials/text-image.php');
require_once(get_template_directory().'/assets/partials/call-to-action.php');

//-------------------
//CONSTANTS----------
$http = 'http://';
//-------------------




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
      'before_widget' => '<div class="widget">',
      'after_widget'  => '</div>',
      'before_title'  => '',
      'after_title'   => '',
    ) );

  }
  add_action( 'widgets_init', 'arphabet_widgets_init' );

  //Category Catcher------------------------------------------------------------------------

  function get_posts_for_category($category) {
    $args = array('category_name' => $category);
    return get_posts( $args );
  }

  //Content Fetcher------------------------------------------------------------------------
  function print_post_array($array){
    foreach ($array as $post) {
      echo $post->post_content;
    }
  }

  function get_posts_for_category_and_tags($category, $tags) {
    $cat = get_cat_id($category);
    $args = "cat=". $cat;
    foreach ($tags as $tag) {
        $args .= "&tag=" . $tag;
    }
    $posts = get_posts($args);
    return $posts;
  }

  function get_gallery_images_for_post($args){
      $image_refs = array();
      //set the max amount of posts to display
      $numPostsToDisplay = ($args['number_desired'] ? $args['number_desired'] : count($posts));
      $counter = 0;
      //get images from the gallery associated with the post
      $gallery = get_post_gallery_images( $args['post_id'] );
      foreach ($gallery as $image) {
          array_push($image_refs, $image);
          $counter++;
          if($counter >= $numPostsToDisplay){
              break;
          }
      }
      return $image_refs;
  }

?>
