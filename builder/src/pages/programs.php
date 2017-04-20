<?php /* Template Name: programs-template */
  get_header();

  // $args = array('category_name' => 'programs');
  // $posts_array = get_posts( $args );
  // foreach ($posts_array as $post) {
  //     echo $post->post_content;
  // }
    get_posts_for_category('programs');

  get_footer();
?>
