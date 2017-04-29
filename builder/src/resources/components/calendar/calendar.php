<?php

require_once(get_template_directory().'/assets/util/Mustache/Autoloader.php');
Mustache_Autoloader::register();

//array('shortcode'=>$shortcode)
function createCalendarComponent($args){
    //setup
    $m = new Mustache_Engine(array(
        'loader' => new Mustache_Loader_FilesystemLoader(get_template_directory().'/assets/templates')
    ));

    if($args['shortcode']){
        $args['shortcode'] = do_shortcode($args['shortcode']);
    }

    $tpl = $m->loadTemplate('calendar');
    return $tpl->render($args);
}
?>
