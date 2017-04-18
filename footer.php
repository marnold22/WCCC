  </div> <!-- closing the content container -->
  <footer>
    <div id="contentbox">
    	<?php
    	  //Footer widget start
    		if( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Footer')): ?>
    	<?php
    		endif;
    		//Footer Page End
    	?>
    </div>
  </footer>
  	<?php wp_footer(); ?>
  </body>
</html>
