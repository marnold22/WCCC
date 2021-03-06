<?php /* Template Name: events-template */
  get_header();
  $category = 'events';
  echo createFullWidthImageComponentForCategoryAndTags(array('category'=>$category, 'tags'=>array('full-width-image')));


  $image = createFillImageComponentForCategoryAndTags(array('category'=>$category, 'tags'=>array('fill-image')));
  $calendar = createCalendarComponent(array('shortcode'=>'[calendar id="37"]'));
  echo createHalfHalfComponent(array('left_content'=>$image, 'right_content'=>$calendar));


  $events = createTextImageContentSection(array('category'=>$category, 'image_on_left'=>true));
  print_component_array($events);

  get_footer();
?>
