<?php /* Template Name: resources-template */
  get_header();
$category = 'resources';

  echo createFullWidthImageComponentForCategoryAndTags(array('category'=>$category, 'tags'=>array('full-width-image')));

  $components = createTextComponentsForCategoryAndTags(array('category'=>$category, 'tags'=>array('text-component')));
  $components = (count($components) > 0 ? $components[0] : "");

  echo $components;

  get_footer();
?>
