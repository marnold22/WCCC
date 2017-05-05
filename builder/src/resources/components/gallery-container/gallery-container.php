<?php

//array('contents')
function createGalleryContainerComponent($args){
    //setup
    $m = new Mustache_Engine(array(
        'loader' => new Mustache_Loader_FilesystemLoader(get_template_directory().'/assets/templates')
    ));

    $tpl = $m->loadTemplate('gallery-container');
    return $tpl->render($args);
}

function createGalleryContainerComponentForCategoryAndTags($args){
    //get the galleries for the category and tag
    $galleries = createGalleryComponentsForCategoryAndTags($args);
    //concatenate all of them together
    $contents = '';
    foreach ($galleries as $gallery) {
        $contents .= $gallery;
    }
    //return a gallery container full of galleries
    return createGalleryContainerComponent(array('contents'=>$contents, 'title'=>$args['title']));
}

?>
