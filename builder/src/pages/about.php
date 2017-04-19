<?php /* Template Name: about-template */

  get_header();
  get_template_part('assets/partials/who-we-are');
  get_template_part('assets/partials/timeline');


  // $args = array('category_name' => 'about');
  // $posts_array = get_posts( $args );
  // foreach ($posts_array as $post) {
  //     echo $post->post_content;
  // }


  get_footer();

?>
