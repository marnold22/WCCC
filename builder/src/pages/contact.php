<?php /* Template Name: contact-template */
  get_header();

  $category = 'contact';

  //top image
  echo createFullWidthImageComponentForCategoryAndTags(array('category'=>$category, 'tags'=>array('full-width-image')));
  echo createHeadingComponent(array('title'=>'Newsletter Sign-up'));
  echo createContactForm7(array('shortcode'=>'[contact-form-7 id="35" title="Newsletter Contact"]'));
  echo createHeadingComponent(array('title'=>'Contact Us'));
  echo createContactForm7(array('shortcode'=>'[contact-form-7 id="34" title="Contact form 1"]'));

  // get_posts_for_category('contact');


  get_footer();
?>
