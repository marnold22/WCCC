<?php /* Template Name: about-template */

  get_header();
  $category = 'about';
  echo createFullWidthImageComponentForCategoryAndTags(array('category'=>$category, 'tags'=>array('full-width-image')));

  $components = createTextComponentsForCategoryAndTags(array('category'=>$category, 'tags'=>array('text-component')));
  print_component_array($components);

  get_template_part('assets/partials/who-we-are');
  echo createHeadingComponent(array('title'=> 'History'));
  get_template_part('assets/partials/timeline');
  get_footer();
?>
