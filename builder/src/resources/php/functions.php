<?php



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

  function get_posts_for_category_and_tag($category, $tag) {
    $cat = get_cat_id($category);
    $args = "cat=". $cat . "&tag=" . $tag;
    $posts = get_posts($args);
    return $posts;
  }

  //who-we-are--------------------------------------------------------------------------------
  add_action("admin_menu", "who_we_are_menu_item");

  function who_we_are_menu_item(){
    add_menu_page("Who We Are", "Who We Are", "administrator", __FILE__, "who_we_are_settings_page", null);
    add_action('admin_init', 'register_who_we_are_settings');
  }

?>
