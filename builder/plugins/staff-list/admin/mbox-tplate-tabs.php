<?php
function abcfsl_mbox_tplate_tabs(){

    $obj = ABCFSL_Main();
    $slug = $obj->pluginSlug;
    $clsPfix = $obj->prefix;

    abcfsl_v_tabs_manager_div_s( '1' ); //---Manager START
        abcfsl_mbox_tplate_tabs_render_nav_tabs();
        abcfsl_mbox_tplate_tabs_render_cnt( $clsPfix );
    echo abcfl_html_tag_end( 'div' ); //---Manager END

    wp_nonce_field( $slug, $slug . '_nonce' );
}

function abcfsl_mbox_tplate_tabs_render_nav_tabs( ){

    echo abcfl_html_tag( 'ul', '', 'abcflVTabsNavCntr' );
        echo abcfsl_v_tabs_render_nav_tab( 'abcflVTabsTabActive', abcfsl_txta(66) );
        echo abcfsl_v_tabs_render_nav_tab( '', abcfsl_txta(67) );
        echo abcfsl_v_tabs_render_nav_tab( '', abcfsl_txta(202) );

        echo abcfsl_v_tabs_render_nav_tab( '', abcfsl_txta(69) );
        echo abcfsl_v_tabs_render_nav_tab( '', abcfsl_txta(64) );
        echo abcfsl_v_tabs_render_nav_tab( '', abcfsl_txta(65) );
        echo abcfsl_v_tabs_render_nav_tab( '', abcfsl_txta(280) );

        echo abcfsl_v_tabs_render_nav_tab( '', abcfsl_txta(3) );
    echo abcfl_html_tag_end( 'ul' );

}

function abcfsl_mbox_tplate_tabs_render_cnt( $clsPfix ){

    global $post;
    $tplateID = $post->ID;
    $tplateOptns = get_post_custom( $tplateID );

    echo abcfl_html_tag( 'div', 'abcfsl_VTabsCntCntr_1', 'abcflVTabsCntCntr' ); //---Content START

//    abcfsl_mbox_tplate_staff( $tplateOptns );
//    abcfsl_mbox_tplate_spg_layout( $tplateOptns );
//    abcfsl_mbox_tplate_css( $tplateOptns, $clsPfix );
//
//    mbox_tplate_field_order( $tplateID, $tplateOptns, false );
//    mbox_tplate_field_order( $tplateID, $tplateOptns, true );
//
//    //abcfsl_mbox_tplate_sort( $tplateID, $tplateOptns );
//    abcfsl_mbox_list_order( $tplateID, $tplateOptns );
//    abcfsl_mbox_tplate_shortcode( $tplateOptns );


    abcfsl_mbox_tplate_staff( $tplateOptns );
    abcfsl_mbox_tplate_spg_layout( $tplateOptns );
    abcfsl_mbox_tplate_css( $tplateOptns, $clsPfix );
    abcfsl_mbox_tplate_spg( $tplateOptns );
    mbox_tplate_field_order( $tplateID, $tplateOptns, false );
    mbox_tplate_field_order( $tplateID, $tplateOptns, true );
    abcfsl_mbox_list_order($tplateID, $tplateOptns);
    abcfsl_mbox_tplate_shortcode( $tplateOptns );


    echo abcfl_html_tag_end( 'div' ); //---Content END


}

//## NEW ########################################################
function abcfsl_mbox_tplate_tabs_NEW(){

    include_once( 'v-tabs.php' );
    include_once( 'mbox-tplate-staff.php' );
    include_once( 'mbox-tplate-single.php' );
    include_once( 'mbox-tplate-css.php' );
    include_once( 'mbox-tplate-field-order.php' );
    include_once( 'mbox-tplate-staff-order.php' );
    include_once( 'mbox-tplate-social.php' );
    include_once( 'mbox-tplate-menu.php' );
    include_once( 'mbox-tplate-shortcode.php' );
    include_once( 'mbox-tplate-fields.php' );
    include_once( 'mbox-tplate-field.php' );

    $obj = ABCFSL_Main();
    $slug = $obj->pluginSlug;
    $clsPfix = $obj->prefix;

    abcfsl_v_tabs_manager_div_s( '1' ); //---Manager START
        abcfsl_mbox_tplate_tabs_render_nav_tabs();
        abcfsl_mbox_tplate_tabs_render_cnt( $clsPfix );
    echo abcfl_html_tag_end( 'div' ); //---Manager END

    wp_nonce_field( $slug, $slug . '_nonce' );
}

function abcfsl_mbox_tplate_tabs_render_nav_tabs_NEW( ){

    echo abcfl_html_tag( 'ul', '', 'abcflVTabsNavCntr' );
        echo abcfsl_v_tabs_render_nav_tab( 'abcflVTabsTabActive', abcfsl_txta(66) );
        echo abcfsl_v_tabs_render_nav_tab( '', abcfsl_txta(67) );
        echo abcfsl_v_tabs_render_nav_tab( '', abcfsl_txta(202) );
        echo abcfsl_v_tabs_render_nav_tab( '', abcfsl_txta(64) );
        echo abcfsl_v_tabs_render_nav_tab( '', abcfsl_txta(65) );
        echo abcfsl_v_tabs_render_nav_tab( '', abcfsl_txta(280) );
        echo abcfsl_v_tabs_render_nav_tab( '', abcfsl_txta(52) );
        echo abcfsl_v_tabs_render_nav_tab( '', abcfsl_txta(100) );
        echo abcfsl_v_tabs_render_nav_tab( '', abcfsl_txta(3) );
    echo abcfl_html_tag_end( 'ul' );

}

function abcfsl_mbox_tplate_tabs_render_cnt_NEW( $clsPfix ){

    global $post;
    $tplateID = $post->ID;
    $tplateOptns = get_post_custom( $tplateID );

    echo abcfl_html_tag( 'div', 'abcfsl_VTabsCntCntr_1', 'abcflVTabsCntCntr' ); //---Content START

    abcfsl_mbox_tplate_staff( $tplateOptns );
    abcfsl_mbox_tplate_spg_layout( $tplateOptns );
    abcfsl_mbox_tplate_css( $tplateOptns, $clsPfix );

    mbox_tplate_field_order( $tplateID, $tplateOptns, false );
    mbox_tplate_field_order( $tplateID, $tplateOptns, true );

    abcfsl_mbox_list_order($tplateID, $tplateOptns);
    abcfsl_mbox_tplate_social( $tplateOptns );
    abcfsl_mbox_tplate_menu( $tplateOptns );
    abcfsl_mbox_list_shortcode($tplateOptns);

    echo abcfl_html_tag_end( 'div' ); //---Content END

}

//###########################################################################


