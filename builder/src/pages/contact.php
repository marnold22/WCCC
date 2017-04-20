<?php /* Template Name: contact-template */
  get_header();

  require_once(get_template_directory().'/assets/partials/full-width-image.php');
  echo createFullWidthImageComponent(array('image_ref'=>'http://westcentralcc.org/wp-content/uploads/2013/10/gym-72391-e1381356627607.jpg'));

  echo do_shortcode( '[contact-form-7 id="42" title="Contact form 1"]' );


  get_posts_for_category('contact');


  get_footer();
?>
