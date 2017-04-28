<?php /* Template Name: giving-template */
  get_header();
  $category = 'Giving';
  echo createFullWidthImageComponentForCategoryAndTags(array('category'=>$category, 'tags'=>array('full-width-image', 'header')));
  $components = createTextImageContentSection(array('category'=>$category, 'image_on_left'=>true));
  foreach ($components as $component) { echo $component; }

  $components = createTextImageComponentsForCategoryAndTag(array('category'=>$category, 'tags'=>array('awesome', 'something'), 'number_desired'=>null, 'image_on_left'=>true));

  foreach ($components as $component) { echo $component; }

  get_template_part('assets/partials/giving-paypal');


  get_footer();
?>
