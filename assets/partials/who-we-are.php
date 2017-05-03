<?php
    //array('image_ref'=>$image_ref, 'name'=>$name, 'position'=>$position, 'phone'=>$phone, 'email'=>$email)
    function createWhoWeArePersonComponent($args){
        //setup
        $m = new Mustache_Engine(array(
            'loader' => new Mustache_Loader_FilesystemLoader(get_template_directory().'/assets/templates')
        ));
        $tpl = $m->loadTemplate('who-we-are-person-template');
        return $tpl->render($args);
    }
?>




<div class="who-we-are anchor" id="who-we-are" name="who-we-are" title="Who We Are">
  <h1 class="title-heading">Who We Are</h1>
  <div class="who-we-are-content">
      <?php

        echo do_shortcode( '[abcf-staff-list id="69"]' );

      ?>
  </div>
</div>
