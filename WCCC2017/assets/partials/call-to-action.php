<?php
    //array('title', 'content', 'button', 'button_type', 'button_link', 'button_title')
    function createCallToActionComponent($args){
        //setup
        $m = new Mustache_Engine(array(
            'loader' => new Mustache_Loader_FilesystemLoader(get_template_directory().'/assets/templates')
        ));

        //if we don't have a button
        if(!$args['button']){
            //create button component based on parameters
            $isSubmitButton = ($args['button_type'] === 'submit');
            $buttonParams = array('button_link'=>$args['button_link'], 'button_title'=>$args['button_title'], 'button_type'=>$args['button_type']);
            $button = createLinkButtonComponent($buttonParams);
            //add the button to this function's arguments
            $args['button'] = $button;
        }

        $tpl = $m->loadTemplate('call-to-action');
        return $tpl->render($args);
    }

    //array('category', 'tag', 'button_type', 'button')
    function createCallToActionComponentForCategoryAndTags($args){
        //get the posts for the category and tag
        $posts = get_posts_for_category_and_tags($args['category'], $args['tags']);
        $components = array();
        foreach ($posts as $post) {
            $params = array();
            $post_title = $post->post_title;
            $post_content = $post->post_content;

            $post_tags = get_tags_for_post($post->ID);
            //if the post isn't meant to be a paypal donation
            if(!in_array('paypal', $post_tags)){
                //pattern for urls
                $re = '/<a href="(.*)">(.*)<\/a>/';
                //get the link from the post
                $success = preg_match_all($re, $post_content, $matches, PREG_SET_ORDER, 0);
                //if we successfully found a link
                if ($success) {
                    $params['button_link'] = $matches[0][1];
                    $params['button_title'] = $matches[0][2];
                }
            }else{
                //we want a paypal button
                $params['button'] = createGivingPayPalComponent();
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
