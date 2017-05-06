<?php /* Template Name: about-template */

  get_header();
  $category = 'about';
  echo createFullWidthImageComponentForCategoryAndTags(array('category'=>$category, 'tags'=>array('full-width-image', 'header')));

  $components = createTextComponentsForCategoryAndTags(array('category'=>$category, 'tags'=>array('text-component')));

  foreach ($components as $component) { echo $component; }



  get_template_part('assets/partials/who-we-are');
  get_template_part('assets/partials/timeline');
  get_footer();
?>
