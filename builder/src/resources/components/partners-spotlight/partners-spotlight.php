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
        echo createHeadingComponent(array('title'=>'Donor Spotlight'));

        $path = get_template_directory().'/assets/images/partner_logos';
        $files = scandir($path);

        foreach ($files as $file) {
            if(!($file == '.' || $file == '..')){
                $image_ref = get_template_directory_uri().'/assets/images/partner_logos/'.$file;
                echo createPartnerComponent(array( 'image_ref'=>$image_ref));
            }
        }
    ?>
</div>
