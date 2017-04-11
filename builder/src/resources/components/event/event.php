<?php
    require_once(get_template_directory().'/assets/util/Mustache/Autoloader.php');
    Mustache_Autoloader::register();

    function createEventComponent($title, $imageRef, $content, $imageOnLeft){
        //setup
        $m = new Mustache_Engine(array(
            'loader' => new Mustache_Loader_FilesystemLoader(get_template_directory().'/assets/templates')
        ));
        $args = array('title'=>$title, 'imageRef'=>$imageRef, 'content'=>$content);

        $tpl = $m->loadTemplate('event-template');
        return $tpl->render($args);
    }

?>
