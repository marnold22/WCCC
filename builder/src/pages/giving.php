<?php /* Template Name: giving-template */
  get_header();
  $category = 'giving';

  //header section
  echo createFullWidthImageComponentForCategoryAndTags(array('category'=>$category, 'tags'=>array('full-width-image', 'header')));

  //call to action components
  $components = createCallToActionComponentForCategoryAndTags(array('category'=>$category, 'tags'=>array('awesome', 'something')));
  $left_content = (count($components) > 0 ? $components[0] : '');
  $right_content = (count($components) > 1 ? $components[1] : '');
  echo createHalfHalfComponent(array('left_content'=>$left_content,'right_content'=>$right_content));

  //text image section
  $components = createTextImageComponentsForCategoryAndTags(array('category'=>$category, 'tags'=>array('awesome', 'something'), 'number_desired'=>null, 'image_on_left'=>false));
  print_component_array($components);


  get_template_part('assets/partials/partners-spotlight');


  get_footer();
?>
