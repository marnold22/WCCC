<?php
    require_once(get_template_directory().'/assets/util/Mustache/Autoloader.php');
    Mustache_Autoloader::register();


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




<div class="who-we-are">
  <h1 class="title-heading">Who We Are</h1>
  <div class="who-we-are-content">
      <?php

      for($i = 0; $i < 20; $i++){
          $args = array('image_ref'=>get_template_directory_uri().'/assets/images/grey_logo.png', 'name'=>'Martha Stuart', 'position'=>'Author', 'phone'=>'(123) 456-7890', 'email'=>'martha@stuart.com');
          echo createWhoWeArePersonComponent($args);
      }

      ?>
  </div>
</div>
