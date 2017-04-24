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

    //array('category'=>$category, 'tag'=>$tag, 'number_desired'=>$number_desired, 'image_on_left'=>$left)
    function createTextImageComponentsForCategoryAndTag($args){
        $components = array();
        //get the posts for the category and tag
        $posts = get_posts_for_category_and_tag($args['category'], $args['tag']);
        //set the max amount of posts to display
        $numPostsToDisplay = ($args['number_desired'] ? $args['number_desired'] : sizeof($posts));
        $counter = 0;
        foreach ($posts as $post) {
            if($counter < $numPostsToDisplay){
                //the link to the image
                $image_ref = '';
                //get images from the gallery associated with the post
                $gallery = get_post_gallery_images( $post->ID );
                if(sizeof($gallery) > 0){
                    $image_ref = $gallery[0];
                }

                //we get the first image if there is one in the post
                $post_title = $post->post_title;
                $post_content = wp_filter_nohtml_kses($post->post_content);
                $post_content = strip_shortcodes($post_content);
                $params = array('title'=>$post_title, 'image_ref'=>$image_ref, 'content'=>$post_content, 'image_on_left'=>true);
                $component = createTextImageComponent($params);
                array_push($components, $component);
            }else{
                //if we've reached the max amount of posts, stop the loop
                break;
            }
            $counter++;

            echo "<br>";
        }
        return $components;
    }
?>
