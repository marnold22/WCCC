<?php /* Template Name: resources-template */
  get_header();

  $components = createTextImageContentSection(array('category'=>'Resources', 'image_on_left'=>false));
  foreach ($components as $component) { echo $component; }

  get_footer();
?>
