<?php
//array('left_content'=>$left_content,'right_content'=>$right_content)
function createHalfHalfComponent($args){
    //setup
    $m = new Mustache_Engine(array(
        'loader' => new Mustache_Loader_FilesystemLoader(get_template_directory().'/assets/templates')
    ));

    $tpl = $m->loadTemplate('half-half');
    return $tpl->render($args);
}

?>
