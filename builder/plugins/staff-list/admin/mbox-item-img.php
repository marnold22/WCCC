<?php

function abcfsl_mbox_item_img( $imgUrlL, $imgLnkL, $imgUrlS, $imgIDL, $imgIDS ){

    $imgUrlSTag = $imgUrlS;
    if( $imgUrlS == 'SP' ) {
        $imgUrlSTag = $imgUrlL;
        $imgIDS = 0;
    }
    else{
        if( empty($imgUrlL) ){
            $imgIDL = 0;
        }
        else {
             $imgIDS = abcfsl_mbox_item_img_img_by_url( $imgUrlS );
        }
    }

    if( empty($imgUrlL) ){
        $imgIDL = 0;
    }
    else {
        $imgIDL = abcfsl_mbox_item_img_img_by_url( $imgUrlL );
    }

    echo  abcfl_html_tag('div','','inside hidden');

        //-- Image: Staff Page ------------------------------------------------
        echo abcfl_input_sec_title_hlp( ABCFSL_ICONS_URL, abcfsl_txta(310), abcfsl_aurl(0) );
        echo abcfl_html_img_tag('', $imgUrlL, '', '', 200, '', 'abcflMTop15');

        //-- imgUrlL itemImgUrl -----------------------------------------------
        echo abcfl_html_tag_cls('div', 'abcflFloatsCntr');
        echo abcfl_input_txt('imgUrlL', '', $imgUrlL, abcfsl_txta(312), '', '100%', '', '', 'abcflFloatL abcflWidth89Pc', 'abcflFldLbl');
        echo abcfl_input_txt_dr('readonly', true, 'imgIDL', '', $imgIDL, abcfsl_txta(35), '', '100%', '', '', 'abcflFloatL abcflWidth10Pc', 'abcflFldLbl');
        echo abcfl_html_tag_cls('div', 'abcflClr', true);
        echo abcfl_html_tag_end('div');

        echo  abcfl_html_tag('div','','abcflPTop10');
            echo abcfl_input_btn('btnImgL', 'btnImgL', 'button',  abcfsl_txta(263), 'button' );
        echo abcfl_html_tag_end('div');
        //-------------------------------------------------------------
        echo abcfl_input_txt('imgLnkL', '', $imgLnkL, abcfsl_txta(261), '', '100%', '', '', 'abcflFldCntr', 'abcflFldLbl');
        echo abcfl_input_sec_title_hlp( ABCFSL_ICONS_URL, abcfsl_txta(262), abcfsl_aurl(34), 'abcflFontWPHdr abcflFontS12 abcflFontW400' );

        //-- Image: Single Page ------------------------------------------------
        echo abcfl_input_hline('2');
        echo abcfl_input_sec_title_hlp( ABCFSL_ICONS_URL, abcfsl_txta(311), abcfsl_aurl(0) );
        echo abcfl_html_img_tag('', $imgUrlSTag, '', '', 200, '', 'abcflMTop15');

        echo abcfl_html_tag_cls('div', 'abcflFloatsCntr');
        echo abcfl_input_txt('imgUrlS', '', $imgUrlS, abcfsl_txta(312), abcfsl_txta(284), '100%', '', '', 'abcflFloatL abcflWidth90Pc', 'abcflFldLbl');
        echo abcfl_input_txt_dr('readonly', true, 'imgIDS', '', $imgIDS, abcfsl_txta(35), '', '100%', '', '', 'abcflFloatL abcflWidth10Pc', 'abcflFldLbl');
        echo abcfl_html_tag_cls('div', 'abcflClr', true);
        echo abcfl_html_tag_end('div');

        echo  abcfl_html_tag('div','','abcflPTop10');
            echo abcfl_input_btn('btnImgS', 'btnImgS', 'button',  abcfsl_txta(263), 'button' );
        echo abcfl_html_tag_end('div');

    echo abcfl_html_tag_end('div');
}

function abcfsl_mbox_item_img_img_by_url( $url ){

    global $wpdb;
    $imageID = $wpdb->get_var($wpdb->prepare("SELECT ID FROM $wpdb->posts WHERE guid='%s';", $url ));
    if( !empty( $imageID ) ) { return $imageID; }

    // If the URL is auto-generated thumbnail, remove the sizes and get the URL of the original image
    $url = preg_replace( '/-\d+x\d+(?=\.(jpg|jpeg|png|gif)$)/i', '', $url );
    $imageID = $wpdb->get_var($wpdb->prepare("SELECT ID FROM $wpdb->posts WHERE guid='%s';", $url ));
    if( !empty( $imageID ) ) { return $imageID; }

    return 0;
}

