<?php
    require_once(get_template_directory().'/assets/util/Mustache/Autoloader.php');
    Mustache_Autoloader::register();

    //array('title'=>$title, 'content'=>$content, 'button_link'=>$button_link, 'button_title'=>$button_title)
    function createCallToActionComponent($args){
        //setup
        $m = new Mustache_Engine(array(
            'loader' => new Mustache_Loader_FilesystemLoader(get_template_directory().'/assets/templates')
        ));

        $tpl = $m->loadTemplate('call-to-action');
        return $tpl->render($args);
    }

    function createCallToActionComponentForCategoryAndTag($args){
        //get the posts for the category and tag
        $posts = get_posts_for_category_and_tags($args['category'], $args['tags']);
        $params = array();
        $components = array();
        foreach ($posts as $post) {
            $post_title = $post->post_title;
            $post_content = $post->post_content;
            //pattern for urls
            $re = '/<a href="(.*)">(.*)<\/a>/';
            //get the link from the post
            $success = preg_match_all($re, $post_content, $matches, PREG_SET_ORDER, 0);
            //if we successfully found a link
            if ($success) {
                $params['button_link'] = $matches[0][1];
                $params['button_title'] = $matches[0][2];
            }
            //remove all the links from the post
            $post_content = preg_replace($re, "", $post_content);
            //strip the html and shortcodes
            $post_content = wp_filter_nohtml_kses($post_content);
            $post_content = strip_shortcodes($post_content);
            $params['content'] = $post_content;
            $params['title'] = $post_title;
            $component = createCallToActionComponent($params);
            array_push($components, $component);
        }
        return $components;
    }
?>
