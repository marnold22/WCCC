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

    function createFullWidthImageComponentForCategoryAndTag($args){
        $posts = get_posts_for_category_and_tags($args['category'], $args['tags']);
        $image_ref = '';
        if(count($posts) > 0){
            $gallery = get_post_gallery_images( $post[0]->ID );
            if($gallery){
                $image_ref = $gallery[0];
            }
        }
        return createFullWidthImageComponent(array('image_ref'=>$image_ref));
    }
?>
