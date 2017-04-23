<?php /* Template Name: about-template */

  get_header();
  $header_section = get_posts_for_category_and_tag('about', 'header-section');

  foreach ($header_section as $section) {
      $images = get_attached_media( 'image', $section->ID );
      $image_ref = '';
      foreach ($images as $key => $image) {
          $image_ref = $http.$image->guid;
      }

    //we get the first image if there is one in the post
      $post_title = $section->post_title;
      $post_content = wp_filter_nohtml_kses($section->post_content);
      $params = array('title'=>$post_title, 'image_ref'=>$image_ref, 'content'=>$post_content, 'image_on_left'=>true);
      echo createTextImageComponent($params);
  }

  get_template_part('assets/partials/who-we-are');
  get_template_part('assets/partials/timeline');
  get_footer();
?>
