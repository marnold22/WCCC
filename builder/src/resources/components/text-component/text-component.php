<?php

//array('title', 'content')
function createTextComponent($args){
    //setup
    $m = new Mustache_Engine(array(
        'loader' => new Mustache_Loader_FilesystemLoader(get_template_directory().'/assets/templates')
    ));

    $tpl = $m->loadTemplate('text-component');
    return $tpl->render($args);
}

function createTextComponentsForCategoryAndTags($args){
    $posts = get_posts_for_category_and_tags($args['category'], $args['tags']);
    $components = array();
    foreach ($posts as $post) {
        $content = $post->post_content;
        $content = strip_shortcodes($content);
        $textComponent = createTextComponent(array('title'=>$post->post_title, 'content'=>$content));
        array_push($components, $textComponent);
    }
    return $components;
}

?>
