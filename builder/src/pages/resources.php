<?php /* Template Name: resources-template */
  get_header();

  // $args = array('category_name' => 'resources');
  // $posts_array = get_posts( $args );
  // foreach ($posts_array as $post) {
  //     echo $post->post_content;
  // }
    get_posts_for_category('resources');
  get_footer();
?>
