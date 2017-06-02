<?php /* Template Name: generic-template */

  get_header();
  $category = 'generic';
  

  if ( have_posts() ) : while ( have_posts() ) : the_post();
  echo the_content();
  endwhile;
  else:
  echo '<p>Sorry, no posts matched your criteria.</p>';
  endif;


  get_footer();
?>
