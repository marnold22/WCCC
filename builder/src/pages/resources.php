<?php /* Template Name: resources-template */
  get_header();
$category = 'resources';


  $left_content = createFillImageComponentForCategoryAndTags(array('category'=>$category, 'tags'=>array('full-width-image', 'header')));
  $right_content = createTextComponentsForCategoryAndTags(array('category'=>$category, 'tags'=>array('text-component')));

  $components = createHalfHalfComponent(array('left_content'=>$left_content,'right_content'=>$right_content));
  echo $components;

  get_footer();
?>
