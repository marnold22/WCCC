
<?php /* Template Name: index-template */
    get_header();
    get_template_part('assets/partials/image-slider');
    get_template_part('assets/partials/where-we-are');

    require_once(get_template_directory().'/assets/partials/text-image.php');
    require_once(get_template_directory().'/assets/partials/full-width-image.php');
    require_once(get_template_directory().'/assets/partials/call-to-action.php');

    echo createCallToActionComponent(array('title'=>'Donate', 'content'=>'Austin butcher tofu, thundercats green juice taxidermy cornhole four loko. Waistcoat butcher pinterest, try-hard four loko fashion axe disrupt fingerstache. Wolf sriracha direct trade leggings art party, godard disrupt gastropub. Health goth kinfolk williamsburg, pok pok crucifix photo booth wayfarers. Leggings iceland meggings 8-bit, cray sriracha forage shoreditch YOLO chicharrones raclette single-origin coffee. Cronut microdosing sartorial bushwick, stumptown quinoa brunch direct trade typewriter. Bicycle rights +1 flannel biodiesel leggings tumeric, chicharrones celiac asymmetrical.', 'button_link'=>'#this_is_the_link', 'button_title'=> 'Donate'));


    echo createFullWidthImageComponent(array('image_ref'=>'http://westcentralcc.org/wp-content/uploads/2013/10/gym-72391-e1381356627607.jpg'));

    $left = true;
    for ($i=1; $i <= 10; $i++) {
        echo createTextImageComponent(array('title'=>'Title is here'.$i, 'image_ref'=>'http://westcentralcc.org/wp-content/uploads/2013/10/gym-72391-e1381356627607.jpg', 'content'=>'this is the contentlkjl;faksjdf;lkasjd;flk jasd;lf kjas;l dkjf ; lak', 'image_on_left'=>$left));
        // $left = !($left);
    }


  // get_template_part('assets/partials/where-we-are');

    get_posts_for_category_and_tag('index', 'youth-program');

    get_footer();
?>
