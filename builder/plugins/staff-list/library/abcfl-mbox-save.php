<?php
/**
 * Save metabox data.
 *
 * Version 109
 *
 * 108 abcfl_mbsave_save_chekbox $newValue = '';
 * 109 abcfl_mbsave_save_txt_value
*/

// HTML Allow to save some of HTML tags b,br,em,i,strong
if ( !function_exists( 'abcfl_mbsave_save_txt_html' ) ){
function abcfl_mbsave_save_txt_html( $postID, $field_id, $metaKey ) {

    $allowedTags = array(
        'p' => array(),
        'b' => array(),
        'br' => array(),
        'em' => array (),
        'i' => array (),
        'strong' => array()
    );

    $newValue = ( isset( $_POST[$field_id] ) ? wp_kses( $_POST[$field_id], $allowedTags )  : '' );
    abcfl_mbsave_save_field( $postID, $metaKey, $newValue);
}
}

// HTML Allow to save HTML tags
if ( !function_exists( 'abcfl_mbsave_save_txt_post_html' ) ){
function abcfl_mbsave_save_txt_post_html( $postID, $field_id, $metaKey) {
    $newValue = ( isset( $_POST[$field_id] ) ? wp_kses_post( $_POST[$field_id] )  : '' );
    abcfl_mbsave_save_field( $postID, $metaKey, $newValue);
}
}
if ( !function_exists( 'abcfl_mbsave_save_chekbox' ) ){
    function abcfl_mbsave_save_chekbox( $postID, $field_id, $metaKey) {
        $newValue = '';
        if (isset( $_POST[$field_id])) { $newValue = '1'; }
        abcfl_mbsave_save_field( $postID, $metaKey, $newValue);
    }
}

if ( !function_exists( 'abcfl_mbsave_save_txt_editor' ) ){
function abcfl_mbsave_save_txt_editor( $postID, $field_id, $metaKey) {
        $newValue = ( isset( $_POST[$field_id] ) ? esc_attr( $_POST[$field_id] ) : '' );
        abcfl_mbsave_save_field( $postID, $metaKey, $newValue);
}}

if ( !function_exists( 'abcfl_mbsave_save_txt' ) ){
    //Save text field
    function abcfl_mbsave_save_txt( $postID, $field_id, $metaKey) {

        $newValue = ( isset( $_POST[$field_id] ) ? esc_attr( $_POST[$field_id] ) : '' );
        abcfl_mbsave_save_field( $postID, $metaKey, $newValue);
}}

if ( !function_exists( 'abcfl_mbsave_save_txt_sanitize_title' ) ){
    //Save text field
    function abcfl_mbsave_save_txt_sanitize_title( $postID, $field_id, $metaKey) {
        $newValue = ( isset( $_POST[$field_id] ) ? esc_attr( $_POST[$field_id] ) : '' );
        abcfl_mbsave_save_field( $postID, $metaKey, sanitize_title($newValue));
}}

if ( !function_exists( 'abcfl_mbsave_save_urlraw' ) ){
    function abcfl_mbsave_save_urlraw( $postID, $field_id, $metaKey) {

        $newValue = ( isset( $_POST[$field_id] ) ? esc_url_raw( $_POST[$field_id] ) : '' );
        abcfl_mbsave_save_field( $postID, $metaKey, $newValue);
    }
}
if ( !function_exists( 'abcfl_mbsave_save_css_size' ) ){
    //Save CSS size. Remove px since it is an default unit.
    function abcfl_mbsave_save_css_size( $postID, $field_id, $metaKey) {

        $newValue = ( isset( $_POST[$field_id] ) ? esc_attr( $_POST[$field_id] ) : '' );
        $newValueFixed = str_replace(array(' ', ';', 'px'), '', $newValue);
        abcfl_mbsave_save_field( $postID, $metaKey, $newValueFixed);
    }
}
if ( !function_exists( 'abcfl_mbsave_save_int' ) ){
    function abcfl_mbsave_save_int( $postID, $field_id, $metaKey) {

        $newValue = ( isset( $_POST[$field_id] ) ? $_POST[$field_id] : '' );
        $newValueInt = abcfl_mbsave_int_or_empty($newValue);
        abcfl_mbsave_save_field( $postID, $metaKey, $newValueInt);
    }
}
if ( !function_exists( 'abcfl_mbsave_save_decimal' ) ){
    function abcfl_mbsave_save_decimal( $postID, $field_id, $metaKey) {

        $newValue = ( isset( $_POST[$field_id] ) ? $_POST[$field_id] : '' );
        $newValueInt = abcfl_mbsave_fix_decimal($newValue);
        abcfl_mbsave_save_field( $postID, $metaKey, $newValueInt);
    }
}
if ( !function_exists( 'abcfl_mbsave_save_cbo' ) ){
    //Save drop-down selection
    function abcfl_mbsave_save_cbo( $postID,  $field_id, $metaKey, $default, $saveDefault = false) {
        $newValue = ( isset( $_POST[$field_id] ) ? $_POST[$field_id] : $default );
        if($newValue == $default && !$saveDefault) { $newValue = ''; }
        abcfl_mbsave_save_field( $postID, $metaKey, $newValue);
    }
}
//-------------------------------------------------------------
if ( !function_exists( 'abcfl_mbsave_save_txt_value' ) ){
    function abcfl_mbsave_save_txt_value( $postID, $metaKey, $newValue,  $default) {
        if( $newValue == $default ) { $newValue = ''; }
        abcfl_mbsave_save_field( $postID, $metaKey, $newValue);
}}
//============================================================================================
if ( !function_exists( 'abcfl_mbsave_save_field' ) ){
    //Save form field
    function abcfl_mbsave_save_field( $postID, $metaKey, $newValue){
        $newValue = trim($newValue);
        $oldValue = get_post_meta( $postID, $metaKey, true );
        if ( $newValue && '' == $oldValue ) { add_post_meta( $postID, $metaKey, $newValue, true ); }
        elseif ( $newValue != '' && $newValue != $oldValue ) { update_post_meta( $postID, $metaKey, $newValue ); }
        elseif ( '' == $newValue && isset($oldValue) ) { delete_post_meta( $postID, $metaKey, $oldValue );}
    }
}

if ( !function_exists( 'abcfl_mbsave_int_or_empty' ) ){
    //Get integer or empty string
    function abcfl_mbsave_int_or_empty( $in, $default='') {
        if(abcfl_html_isblank($in)){ return $default; }
        if($in == '0'){return $in;}
        $int = intval($in);
        if($int == 0){return $default;}
        return $int;
    }
}

if ( !function_exists( 'abcfl_mbsave_int_or_zero' ) ){
    function abcfl_mbsave_int_or_zero( $in, $default=0) {
        if(abcfl_html_isblank($in)){ return $default; }
        if($in == 0){return $in;}
        $int = intval($in);
        if($int == 0){return $default;}
        return $int;
    }
}
if ( !function_exists( 'abcfl_mbsave_fix_decimal' ) ){
    function abcfl_mbsave_fix_decimal( $in ) {
        $out = str_replace(' ', '', $in);
        $out = str_replace('%', '', $out);
        return str_replace(',', '.', $out);
    }
}