<?php /* Template Name: contact-template */
  get_header();

  echo do_shortcode( '[contact-form-7 id="42" title="Contact form 1"]' );

// $args = array('category_name' => 'contact');
// $posts_array = get_posts( $args );
// foreach ($posts_array as $post) {
//     echo $post->post_content;
// }


  get_footer();
?>
