<?php /* Template Name: events-template */
  get_header();

  $components = createTextImageContentSection(array('category'=>'Events', 'image_on_left'=>true));
  foreach ($components as $component) { echo $component; }

  get_footer();
?>
