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
      echo createLinkButtonComponent(array('button_link'=>'https://www.google.com/maps/d/viewer?ll=47.668801453639716%2C-117.44118700000001&spn=0.037974%2C0.084114&msa=0&mid=1w-4n0L2LEpOrDl7SAvI2HDv6g_4&z=14', 'button_title'=>'Churches'));
      echo createLinkButtonComponent(array('button_link'=>'https://www.google.com/maps/d/viewer?ll=47.6672378634536%2C-117.44049999999999&spn=0.018988%2C0.042057&msa=0&mid=1RXQZDgI0LRGwJOlLFV0mn3sKfVo&z=15', 'button_title'=>'Communities'));
      echo createLinkButtonComponent(array('button_link'=>'https://www.google.com/maps/d/viewer?ll=47.6674688634606%2C-117.43492099999997&spn=0.018988%2C0.042057&msa=0&mid=1UiUK2n4apm0tv6wp8h3enc6ulAA&z=15', 'button_title'=>'Safety'));
      echo createLinkButtonComponent(array('button_link'=>'https://www.google.com/maps/d/viewer?ll=47.66772886346845%2C-117.44311799999997&spn=0.018988%2C0.041971&msa=0&mid=1nEco2Mqgh4-cbiZxyCfGw9NR9to&z=15', 'button_title'=>'Healthcare'));
      echo createLinkButtonComponent(array('button_link'=>'https://www.google.com/maps/d/viewer?ll=47.667587453674614%2C-117.43741&spn=0.037975%2C0.084114&msa=0&mid=1FsVMYikB1hGzluZVELbp10Ddn8Y&z=14', 'button_title'=>'Child & Youth'));
    ?>
  </div>
  <?php
    // $worship = createGoogleMapQueryComponent(array('shortcode'=>'[wpgmza id="1"]'));
    // // $safety = createGoogleMapQueryComponent(array('shortcode'=>'[wpgmza id="1"]'));
    // // $wic = createGoogleMapQueryComponent(array('shortcode'=>'[wpgmza id="1"]'));
    // // $healthcare = createGoogleMapQueryComponent(array('shortcode'=>'[wpgmza id="1"]'));
    // // $community = createGoogleMapQueryComponent(array('shortcode'=>'[wpgmza id="1"]'));
    // $mapArray = array($worship);//array($worship, $safety, $wic, $healthcare, $community);
    // print_component_array($mapArray);
  ?>
</div>
