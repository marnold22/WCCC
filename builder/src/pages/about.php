<?php /* Template Name: about-template */
  get_header();
  $header_section = get_posts_for_category_and_tag('about', 'header-section');

  foreach ($header_section as $section) {
      echo $section->post_title;
      echo $section->post_content;
      var_dump($header_section);
  }

  get_template_part('assets/partials/who-we-are');
  get_template_part('assets/partials/timeline');
  get_footer();
?>
