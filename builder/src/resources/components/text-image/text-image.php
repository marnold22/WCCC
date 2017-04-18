<?php
    require_once(get_template_directory().'/assets/util/Mustache/Autoloader.php');
    Mustache_Autoloader::register();

    //array('title'=>$title, 'image_ref'=>$image_ref, 'content'=>$content, 'image_on_left'=>$left)
    function createTextImageComponent($args){
        //setup
        $m = new Mustache_Engine(array(
            'loader' => new Mustache_Loader_FilesystemLoader(get_template_directory().'/assets/templates')
        ));

        $sideClass = ($args['image_on_left'] ? 'left' : 'right');
        $args['class'] = $sideClass;

        $name = "";
        if($args['title']){
            $name = strtolower($args['title']);
            $name = str_replace(" ", "_", $name);
        }
        $args["name"] = $name;

        $tpl = $m->loadTemplate('text-image-template');
        return $tpl->render($args);
    }

?>
