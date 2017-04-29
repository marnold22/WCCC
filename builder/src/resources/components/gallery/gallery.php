<?php

//array('title', 'image_refs')
function createGalleryComponent($args){
    //setup
    $m = new Mustache_Engine(array(
        'loader' => new Mustache_Loader_FilesystemLoader(get_template_directory().'/assets/templates')
    ));

    if(count($args['image_refs'] > 0)){
        //set the initial background image to the first image ref
        $args['image_ref'] = $args['image_refs'][0];
    }

    //make the image_ref divs
    $images = '';
    foreach ($args['image_refs'] as $image_ref) {
        $images .= '<div class="gallery-image" image-ref="'.$image_ref.'"></div>';
    }
    $args['images'] = $images;

    $tpl = $m->loadTemplate('gallery');
    return $tpl->render($args);
}

function createGalleryComponentsForCategoryAndTags($args){
    //get the posts for the category and tag
    $posts = get_posts_for_category_and_tags($args['category'], $args['tags']);
    $components = array();
    foreach ($posts as $post) {
        $image_refs = get_gallery_images_for_post(array('post_id'=>$post->ID));
        $gallery = createGalleryComponent(array('title'=>$post->post_title, 'image_refs'=>$image_refs));
        array_push($components, $gallery);
    }
    return $components;
}

?>
