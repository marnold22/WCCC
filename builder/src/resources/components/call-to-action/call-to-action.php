<?php
    require_once(get_template_directory().'/assets/util/Mustache/Autoloader.php');
    Mustache_Autoloader::register();

    //array('title'=>$title, 'content'=>$content, 'button_link'=>$button_link, 'button_title'=>$button_title)
    function createCallToActionComponent($args){
        //setup
        $m = new Mustache_Engine(array(
            'loader' => new Mustache_Loader_FilesystemLoader(get_template_directory().'/assets/templates')
        ));

        $tpl = $m->loadTemplate('call-to-action');
        return $tpl->render($args);
    }
?>
