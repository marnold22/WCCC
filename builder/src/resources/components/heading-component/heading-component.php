<?php
    //array('title')
    function createHeadingComponent($args){
        //setup
        $m = new Mustache_Engine(array(
            'loader' => new Mustache_Loader_FilesystemLoader(get_template_directory().'/assets/templates')
        ));

        $tpl = $m->loadTemplate('heading-component');
        return $tpl->render($args);
    }
?>
