<?php /* Template Name: contact-template */
  get_header();

  echo do_shortcode( '[contact-form-7 id="42" title="Contact form 1"]' );


  get_posts_for_category('contact');


  get_footer();
?>
