<?php

//array('image_ref'=>$image_ref)
function createFillImageComponent($args){
    //setup
    $m = new Mustache_Engine(array(
        'loader' => new Mustache_Loader_FilesystemLoader(get_template_directory().'/assets/templates')
    ));

    $tpl = $m->loadTemplate('fill-image');
    return $tpl->render($args);
}

function createFillImageComponentForCategoryAndTags($args){
    $posts = get_posts_for_category_and_tags($args['category'], $args['tags']);
    $image_refs = get_gallery_images_for_post(array('post_id'=>$posts[0]->ID));
    $image_ref = '';

    if(count($image_refs) > 0){
        $image_ref = $image_refs[0];
    }

    return createFillImageComponent(array('image_ref'=>$image_ref));
}

?>
