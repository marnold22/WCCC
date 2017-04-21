<?php

function abcfsl_aurl( $id ) {

    //$txt = abcfsl_txta($txtID, $suffix=''); //field-style-single-page

    switch ($id){
        case 0:
            $out = '';
            break;
        case 1: //147
            $out = 'http://abcfolio.com/staff-list-staff-template-field-name-multipart/';
            break;
        case 2: //141
            $out = 'http://abcfolio.com/wordpress-plugin-staff-list-custom-styles-option/';
            break;
        case 3: //142
            $out = 'http://abcfolio.com/wordpress-plugin-staff-list-documentation-filters-and-menus/';
            break;
        case 4: //147 ?????????
            $out = 'http://abcfolio.com/staff-list-single-page-template-options/';
            break;
        case 5: //149
            $out = 'http://abcfolio.com/staff-list-field-display-options/';
            break;
        case 6: //130
            $out = 'http://abcfolio.com/staff-list-staff-template-field-single-line-text/';
            break;
        case 7:
            $out = 'http://abcfolio.com/wordpress-plugin-staff-list-documentation-social-media-icons/';
            break;
        case 8:
            $out = 'http://abcfolio.com/wordpress-plugin-staff-list-documentation-social-media-icons/#custom-links';
            break;
        case 9:
            $out = 'http://abcfolio.com/staff-list-single-page-layouts/';
            break;
        case 10:
            $out = 'http://abcfolio.com/wordpress-plugin-staff-list-documentation-quick-start/';
            break;
        case 11:
            $out = 'http://abcfolio.com/wordpress-plugin-staff-list/';
            break;
        case 12:
            $out = 'http://abcfolio.com/wordpress-plugin-staff-list-create-single-page/';
            break;
        case 13:
            $out = 'http://abcfolio.com/wordpress-plugin-staff-list-staff-template-fields/';
            break;
        case 14:
            $out = 'http://abcfolio.com/staff-list-field-style/';
            break;
        case 15:
            $out = 'http://abcfolio.com/staff-list-staff-template-field-paragraph-text/';
            break;
        case 16:
            $out = 'http://abcfolio.com/staff-list-staff-template-field-static-label-and-text/';
            break;
        case 17:
            $out = 'http://abcfolio.com/staff-list-staff-template-field-hyperlink/';
            break;
        case 18:
            $out = 'http://abcfolio.com/staff-list-staff-template-field-hyperlink-with-static-text/';
            break;
        case 19:
            $out = 'http://abcfolio.com/staff-list-staff-template-field-email/';
            break;
        case 20:
            $out = 'http://abcfolio.com/staff-list-staff-template-field-text-editor/';
            break;
        case 21:
            $out = 'http://abcfolio.com/staff-list-staff-template-field-shortcode/';
            break;
        case 22:
            $out = 'http://abcfolio.com/wordpress-plugin-staff-list-documentation-social-media-icons/';
            break;
        case 23:
            $out = 'http://abcfolio.com/staff-list-staff-template-field-single-page-text-link/';
            break;
        case 24:
            $out = 'http://abcfolio.com/staff-list-staff-template-field-horizontal-line/';
            break;
        case 25:
            $out = 'http://abcfolio.com/staff-list-layouts/';
            break;
        case 26:
            $out = 'http://abcfolio.com/staff-list-layout-list/';
            break;
        case 27:
            $out = 'http://abcfolio.com/staff-list-layout-grid-a/';
            break;
        case 28:
            $out = 'http://abcfolio.com/staff-list-layout-grid-b/';
            break;
        case 29:
            $out = 'http://abcfolio.com/wordpress-plugin-staff-list-single-page/';
            break;
        case 30:
            $out = 'http://abcfolio.com/staff-list-layout-grid-b/#grid-b-item-container';
            break;
        case 31:
            $out = 'http://abcfolio.com/wordpress-plugin-staff-list-documentation-staff-template-options-staff-order/';
            break;
        case 33:
            $out = 'http://abcfolio.com/wordpress-plugin-staff-list-field-labels/';
            break;
        case 34:
            $out = 'http://abcfolio.com/wordpress-plugin-staff-list-single-page-hyperlinks/#sp-links';
            break;
        case 199:
            $out = '';
            break;
        default:
            $out = '';
            break;
    }
    return $out;
}

//function abcfsl_aurl_tab_help( ) {
//
//    $getParams = abcfsl_admin_tabs_defaults( '' );
//    $basePg = 'admin.php?page=' . $getParams['page'];
//    $hrefHelp =  $basePg . '&amp;tab=' . 'tabHelp';
//    return $hrefHelp;
//}

