<?php /* Template Name: giving-template */
  get_header();
  $category = 'giving';

  //header section
  echo createFullWidthImageComponentForCategoryAndTags(array('category'=>$category, 'tags'=>array('full-width-image', 'header')));

  //text image section
  $components = createTextImageComponentsForCategoryAndTags(array('category'=>$category, 'tags'=>array('awesome', 'something'), 'number_desired'=>null, 'image_on_left'=>false));
  print_component_array($components);

  //call to action components
  $components = createCallToActionComponentForCategoryAndTags(array('category'=>$category, 'tags'=>array('awesome', 'something')));
  print_component_array($components);

  get_template_part('assets/partials/image-viewer');
  $components = createGalleryContainerComponentForCategoryAndTags(array('category'=>$category, 'tags'=>array('awesome', 'something')));
  echo $components;

  $components = createTextComponentsForCategoryAndTags(array('category'=>$category, 'tags'=>array('awesome', 'something')));
  print_component_array($components);

  get_footer();
?>
