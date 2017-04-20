<?php /* Template Name: events-template */
  get_header();

  // $args = array('category_name' => 'events');
  // $posts_array = get_posts( $args );
  // foreach ($posts_array as $post) {
  //     echo $post->post_content;
  // }
    get_posts_for_category('events');

    echo do_shortcode( '[staffer department="Computer Science"]' );

  get_footer();
?>
