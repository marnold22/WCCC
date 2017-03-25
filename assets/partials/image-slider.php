<!-- <script type="text/javascript">requirejs([<?php //echo get_template_directory_uri().'/assets/js/image-slider.js';?>], function(){ })</script> -->
  <script type="text/javascript" src=<?php echo get_template_directory_uri().'/assets/js/image-slider.js';?>></script>
  <div class="image-slider parallax-container">

    <div class="image-slider-content parallax-element">
      <div class="image-slider-images">

        <?php

          //we just need to save all of the image IDs from the database somehow
          //  and then populate the slider using the wp_get_attachment_image_src function
          // $photos = array(wp_get_attachment_image_src(20, 'original')[0], wp_get_attachment_image_src(21, 'original')[0], wp_get_attachment_image_src(22, 'original')[0], wp_get_attachment_image_src(23, 'original')[0]);

          $photos = get_option('image_selection');
          $photos = explode(' , ', $photos);

          foreach ($photos as $photo) {
              echo '<a class="image-slider-image vignette" style="background-image: url('.$photo.')"></a>';
          }

          // // Get all the images in the images directory folder
          // $path = getcwd().'/wp-content/themes/WCCC/assets/images/image-slider/';
          // $photos = scandir($path);
          // foreach ($photos as $photo) {
          //   if(strlen($photo) > 2){
          //     echo '<a class="image-slider-image vignette" style="background-image: url('.get_template_directory_uri().'/assets/images/image-slider/'.$photo.')"></a>';
          //   }
          // }
        ?>
      </div> <!-- end image slider images -->
      <div class="image-slider-buttons">
        <a class="image-slider-button image-slider-button-left" href="#" style="background-image: url(' <?php echo get_template_directory_uri().'/assets/images/left-arrow.png' ?>');"></a>
        <a class="image-slider-button image-slider-button-right" href="#" style="background-image: url('<?php echo get_template_directory_uri().'/assets/images/right-arrow.png' ?>');"></a>
      </div>
      <div class="image-slider-indexes">
        <?php
          $index = 0;

          foreach ($photos as $photo) {
            if(strlen($photo) > 2){
              echo '<a class="image-slider-index" href="#" image-index="'.$index.'"></a>';
              $index += 1;
            }
          }
        ?>

      </div>
  </div>
</div>
