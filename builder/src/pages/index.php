
<?php
    get_header();
    get_template_part('assets/partials/image-slider');

    require_once(get_template_directory().'/assets/partials/event.php');

    $left = true;
    for ($i=1; $i <= 10; $i++) {
        echo createEventComponent(array('title'=>'title', 'image_ref'=>'http://westcentralcc.org/wp-content/uploads/2013/10/gym-72391-e1381356627607.jpg', 'content'=>'this is the contentlkjl;faksjdf;lkasjd;flk jasd;lf kjas;l dkjf ; lak', 'image_on_left'=>$left));
        // $left = !($left);
    }



  // get_template_part('assets/partials/where-we-are');

// $args = array('category_name' => 'About');
// $posts_array = get_posts( $args );
// foreach ($posts_array as $post) {
//     echo $post->post_content;
// }

    get_footer();
?>
