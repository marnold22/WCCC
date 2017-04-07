  <script type="text/javascript" src=<?php echo get_template_directory_uri().'/assets/js/image-slider.js';?>></script>
  <div class="image-slider parallax-container">
    <div class="image-slider-slogan">

                <canvas id="mainCanvas" width="175" height="125"></canvas>

      <div class="logo-container" style="background-image: url(<?php echo get_option('logo_selection'); ?>)"></div>
      <h1 class="image-slider-title">West Central Community Center</h1>
      <h6 class="image-slider-tag"><?php echo get_option('slogan_selection'); ?></h6>
    </div>
    <div class="image-slider-content parallax-element">
      <div class="image-slider-images">
        <?php
          $photos = get_option('image_selection');
          $photos = explode(' , ', $photos);
          foreach ($photos as $photo) {
              echo '<a class="image-slider-image vignette" style="background-image: url('.$photo.')"></a>';
          }
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
