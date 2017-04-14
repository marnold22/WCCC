  </div> <!-- closing the content container -->
  <footer>
	<div id="contentox>
	<?php
	  //Footer widget start
		if( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Footer')): ?>
	<?php
		endif;
		//Footer Page End
	?>
	

  </footer>
  	<?php wp_footer(); ?>
  </body>
</html>
