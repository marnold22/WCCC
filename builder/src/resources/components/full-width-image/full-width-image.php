<?php
    require_once(get_template_directory().'/assets/util/Mustache/Autoloader.php');
    Mustache_Autoloader::register();

    //array('image_ref'=>$image_ref)
    function createFullWidthImageComponent($args){
        //setup
        $m = new Mustache_Engine(array(
            'loader' => new Mustache_Loader_FilesystemLoader(get_template_directory().'/assets/templates')
        ));

        $tpl = $m->loadTemplate('full-width-image');
        return $tpl->render($args);
    }
?>
