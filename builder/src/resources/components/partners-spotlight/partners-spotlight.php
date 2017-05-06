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
