<?php

    //array('name'=>$name, 'image_ref'=>$image_ref)
    function createPartnerComponent($args){
        //setup
        $m = new Mustache_Engine(array(
            'loader' => new Mustache_Loader_FilesystemLoader(get_template_directory().'/assets/templates')
        ));

        $tpl = $m->loadTemplate('partner');
        return $tpl->render($args);
    }
?>

<div class="partners-spotlight">
    <?php
        echo createHeadingComponent(array('title'=>'Our Partners'));

        for($i = 0; $i < 15; $i++){
            echo createPartnerComponent(array('name'=>'West Central Community Center', 'image_ref'=>'http://wallpapercave.com/wp/Rw91f3y.jpg'));
        }

    ?>
</div>
