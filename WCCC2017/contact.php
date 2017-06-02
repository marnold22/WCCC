<?php /* Template Name: contact-template */
  get_header();

  //top image
  echo createFullWidthImageComponent(array('image_ref'=>'http://westcentralcc.org/wp-content/uploads/2013/10/gym-72391-e1381356627607.jpg'));
  echo createHeadingComponent(array('title'=>'Newsletter Sign-up'));
  echo createContactForm7(array('shortcode'=>'[contact-form-7 id="35" title="Newsletter Contact"]'));
  echo createHeadingComponent(array('title'=>'Contact Us'));
  echo createContactForm7(array('shortcode'=>'[contact-form-7 id="34" title="Contact form 1"]'));

  // get_posts_for_category('contact');


  get_footer();
?>
