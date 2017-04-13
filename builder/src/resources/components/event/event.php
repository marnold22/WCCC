<?php
    require_once(get_template_directory().'/assets/util/Mustache/Autoloader.php');
    Mustache_Autoloader::register();

    //array('title'=>$title, 'image_ref'=>$image_ref, 'content'=>$content, 'class'=>$sideClass)
    function createEventComponent($args){
        //setup
        $m = new Mustache_Engine(array(
            'loader' => new Mustache_Loader_FilesystemLoader(get_template_directory().'/assets/templates')
        ));

        $sideClass = ($args['image_on_left'] ? 'left' : 'right');
        $args['class'] = $sideClass;

        $tpl = $m->loadTemplate('event-template');
        return $tpl->render($args);
    }

?>
