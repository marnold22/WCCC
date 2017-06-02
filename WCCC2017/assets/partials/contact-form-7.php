<?php
    //array('shortcode'=>$shortcode)
    function createContactForm7($args){
        $form = do_shortcode( $args['shortcode'] );
        return '<div class="contact-form-7-container">'.$form.'</div>';
    }
?>
