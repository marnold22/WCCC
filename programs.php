<?php /* Template Name: programs-template */
  get_header();
  $category = 'programs';
  // echo createHeadingComponent(array('title'));
  echo createFullWidthImageComponentForCategoryAndTags(array('category'=>$category, 'tags'=>array('full-width-image')));

  $components = createCallToActionComponentForCategoryAndTags(array('category'=>$category, 'tags' => array('call-to-action')));
  print_component_array($components);

  echo createHeadingComponent(array('title'=>'Programs'));
  $components = createTextImageContentSection(array('category'=>$category, 'number_desired'=>6, 'image_on_left'=>true));
  print_component_array($components);

  echo createHeadingComponent(array('title'=>'Room Rentals'));
  get_template_part('assets/partials/image-viewer');
  $components = createGalleryContainerComponentForCategoryAndTags(array('category'=>$category, 'tags'=>array('gallery')));
  echo $components;

  get_footer();
?>
