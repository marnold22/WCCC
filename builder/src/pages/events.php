<?php /* Template Name: events-template */
  get_header();
  $category = 'Events';
  $components = createTextImageContentSection(array('category'=>$category, 'image_on_left'=>true));
  foreach ($components as $component) { echo $component; }

  // get_template_part('assets/partials/calendar');
  $image = createFillImageComponentForCategoryAndTags(array('category'=>$category, 'tags'=>array('full-width-image', 'header')));
  $calendar = createCalendarComponent(array('shortcode'=>'[calendar id="108"]'));
  echo createHalfHalfComponent(array('left_content'=>$image, 'right_content'=>$calendar));

  get_footer();
?>
