<?php

function createGivingPayPalComponent(){
    $button = createLinkButtonComponent(array('button_title'=>'Donate', 'button_type'=>'submit'));
    $paypal = do_shortcode('[paypal-donation]');
    $re = '/<input type="image".*name="submit".*>/';
    $paypal = preg_replace($re, $button, $paypal);
    return $paypal;
}

?>
