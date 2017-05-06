<?php

  //array('shortcode')
  function createGoogleMapQueryComponent($args){
      //setup
      $m = new Mustache_Engine(array(
          'loader' => new Mustache_Loader_FilesystemLoader(get_template_directory().'/assets/templates')
      ));

      $args['map'] = do_shortcode($args['shortcode']);
      $tpl = $m->loadTemplate('google-maps-query');
      return $tpl->render($args);
  }
?>



<script defer type="text/javascript" src=<?php echo get_template_directory_uri().'/assets/js/google-maps-query.js';?>></script>
<div class="google-maps-query">
  <div class="google-map-query-selector">
    <?php
      echo createLinkButtonComponent(array('button_link'=>'0', 'button_title'=>'Churches'));
      echo createLinkButtonComponent(array('button_link'=>'1', 'button_title'=>'Communities'));
      echo createLinkButtonComponent(array('button_link'=>'2', 'button_title'=>'Safety'));
      echo createLinkButtonComponent(array('button_link'=>'3', 'button_title'=>'Healthcare'));
      echo createLinkButtonComponent(array('button_link'=>'4', 'button_title'=>'WIC'));
    ?>
  </div>
  <?php
    $worship = createGoogleMapQueryComponent(array('shortcode'=>'[wpgmza id="1"]'));
    // $safety = createGoogleMapQueryComponent(array('shortcode'=>'[wpgmza id="1"]'));
    // $wic = createGoogleMapQueryComponent(array('shortcode'=>'[wpgmza id="1"]'));
    // $healthcare = createGoogleMapQueryComponent(array('shortcode'=>'[wpgmza id="1"]'));
    // $community = createGoogleMapQueryComponent(array('shortcode'=>'[wpgmza id="1"]'));
    $mapArray = array($worship);//array($worship, $safety, $wic, $healthcare, $community);
    print_component_array($mapArray);
  ?>
</div>
