<?php /* Template Name: giving-template */
  get_header();
  $category = 'Giving';
  echo createFullWidthImageComponentForCategoryAndTag(array('category'=>$category, 'tags'=>array('full-width-image', 'header')));
  $components = createTextImageContentSection(array('category'=>$category, 'image_on_left'=>true));
  foreach ($components as $component) { echo $component; }

  get_footer();
?>
