<?php /* Template Name: about-template */

  get_header();

  $components = createTextImageComponentsForCategoryAndTags(array('category'=>'About', 'tags'=>array('awesome', 'something'), 'number_desired'=>null, 'image_on_left'=>true));

  foreach ($components as $component) { echo $component; }

  

  get_template_part('assets/partials/who-we-are');
  get_template_part('assets/partials/timeline');
  get_footer();
?>
