<?php /* Template Name: about-template */

  get_header();

  $components = createTextImageComponentsForCategoryAndTag(array('category'=>'About', 'tag'=>'awesome', 'number_desired'=>2, 'image_on_left'=>true));

  foreach ($components as $component) { echo $component; }

  get_template_part('assets/partials/who-we-are');
  get_template_part('assets/partials/timeline');
  get_footer();
?>
