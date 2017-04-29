<?php /* Template Name: giving-template */
  get_header();
  $category = 'Giving';

  //header section
  echo createFullWidthImageComponentForCategoryAndTags(array('category'=>$category, 'tags'=>array('full-width-image', 'header')));

  //text image section
  $components = createTextImageComponentsForCategoryAndTag(array('category'=>$category, 'tags'=>array('awesome', 'something'), 'number_desired'=>null, 'image_on_left'=>false));
  print_component_array($components);

  //call to action components
  $components = createCallToActionComponentForCategoryAndTag(array('category'=>$category, 'tags'=>array('awesome', 'something')));
  print_component_array($components);


  echo createGivingPayPalComponent();



  get_footer();
?>
