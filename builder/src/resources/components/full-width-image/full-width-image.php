<?php
    require_once(get_template_directory().'/assets/util/Mustache/Autoloader.php');
    Mustache_Autoloader::register();

    //array('image_ref'=>$image_ref)
    function createFullWidthImageComponent($args){
        //setup
        $m = new Mustache_Engine(array(
            'loader' => new Mustache_Loader_FilesystemLoader(get_template_directory().'/assets/templates')
        ));

        $tpl = $m->loadTemplate('full-width-image');
        return $tpl->render($args);
    }

    function createFullWidthImageComponentForCategoryAndTags($args){
        $posts = get_posts_for_category_and_tags($args['category'], $args['tags']);
        $image_refs = get_gallery_images_for_post(array('post_id'=>$posts[0]->ID));
        $image_ref = '';
        if(count($image_refs) > 0){
            $image_ref = $image_refs[0];
        }
        return createFullWidthImageComponent(array('image_ref'=>$image_ref));
    }
?>
