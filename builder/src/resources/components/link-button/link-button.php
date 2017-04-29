<?php

//array('button_link', 'button_title', 'button_type')
function createLinkButtonComponent($args){
    //setup
    $m = new Mustache_Engine(array(
        'loader' => new Mustache_Loader_FilesystemLoader(get_template_directory().'/assets/templates')
    ));

    $isSubmitButton = ($args['button_type'] == 'submit');
    $template = ($isSubmitButton ? 'link-button-submit' : 'link-button');
    $tpl = $m->loadTemplate($template);
    return $tpl->render($args);
}

?>
