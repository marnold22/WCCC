<?php /* Template Name: programs-template */
  get_header();
  $category = 'programs';

  echo createFullWidthImageComponentForCategoryAndTags(array('category'=>$category, 'tags'=>array('full-width-image')));

  $components = createCallToActionComponentForCategoryAndTags(array('category'=>$category, 'tags' => array('call-to-action')));
  print_component_array($components);

  get_template_part('assets/partials/image-viewer');
  $components = createGalleryContainerComponentForCategoryAndTags(array('category'=>$category, 'tags'=>array('gallery')));
  echo $components;


  $components = createTextImageContentSection(array('category'=>$category, 'image_on_left'=>true));
  print_component_array($components);


  get_footer();
?>
