<?php
/**
 * Add scripts, styles and icons
*/
if ( ! defined( 'ABSPATH' ) ) { exit; }

//==ADMIN========================================================================================
//Admin CSS
function abcfsl_enq_admin_css() {

    global $typenow;
    $obj = ABCFSL_Main();
    $ver = $obj->pluginVersion;

    if( $typenow == 'cpt_staff_lst' || $typenow == 'cpt_staff_lst_item' ) {
        wp_register_style('abcfsl-admin-l', ABCFSL_PLUGIN_URL . 'library/abcfl-admin.css', $ver, 'all');
        wp_register_style('abcfsl-admin', ABCFSL_PLUGIN_URL . 'css/admin.css', $ver, 'all');
        wp_enqueue_style('abcfsl-admin-l');
        wp_enqueue_style('abcfsl-admin');
    }
}
add_action( 'admin_enqueue_scripts', 'abcfsl_enq_admin_css', 10 );

//Admin JS
function abcfsl_enq_admin_js() {

    global $typenow;
    $obj = ABCFSL_Main();
    $ver = $obj->pluginVersion;
    $slug = $obj->pluginSlug;

    wp_register_script( 'abcfsl_vtabs', ABCFSL_PLUGIN_URL . 'js/vtabs.js', array( 'jquery' ), $ver, true );
    wp_localize_script('abcfsl_vtabs', 'abcfsl_VTabs', array(
                        'mgr_1' => '#abcfsl_VTabsMgr_1',
                        'mgr_2' => '#abcfsl_VTabsMgr_2',
                        'cntCntr_1' => '#abcfsl_VTabsCntCntr_1',
                        'cntCntr_2' => '#abcfsl_VTabsCntCntr_2'
        ));

    wp_enqueue_script('abcfsl_vtabs');


    wp_register_script( 'abcfsl_tabs', ABCFSL_PLUGIN_URL . 'js/tabs.js', array( 'jquery' ), $ver, true );
    wp_localize_script('abcfsl_tabs', 'abcfsl_tabs', array(
                            'cntrID1' => '#abcfsl-tabs1',
                            'cntrID2' => '#abcfsl-tabs2'
                    ));
    wp_enqueue_script('abcfsl_tabs');

    if( $typenow == 'cpt_staff_lst' ) {
        wp_register_script( 'abcfsl_sort_fields', ABCFSL_PLUGIN_URL .'js/sort-fields.js', array('jquery', 'common', 'jquery-ui-core', 'jquery-ui-draggable', 'jquery-ui-droppable', 'jquery-ui-sortable', 'jquery-ui-mouse'), $ver, true );
        wp_register_script( 'abcfsl_sort_items', ABCFSL_PLUGIN_URL . 'js/sort-items.js', array( 'jquery', 'jquery-ui-sortable' ), $ver, true );

        wp_localize_script( 'abcfsl_sort_fields', 'abcfslVars', array('ajaxNonce' => wp_create_nonce($slug)));
        wp_localize_script( 'abcfsl_sort_items', 'abcfslVars', array('ajaxNonce' => wp_create_nonce($slug)));

        wp_enqueue_script( 'abcfsl_sort_fields' );
        wp_enqueue_script( 'abcfsl_sort_items' );
    }

    if( $typenow == 'cpt_staff_lst_item' ) {
        wp_enqueue_media();
        wp_register_script( 'abcfsl_select_img', ABCFSL_PLUGIN_URL . 'js/select-image.js', array( 'jquery' ) );
        wp_localize_script( 'abcfsl_select_img', 'abcfsl_si', array(
                'title' => __( 'Staff Image', 'abcfgtm_td' ),
                'button' => __( 'Choose Image', 'abcfgtm_td' ),
                'btnImgL' => '#btnImgL',
                'imgUrlL' => '#imgUrlL',
                'imgIDL' => '#imgIDL',
                'btnImgS' => '#btnImgS',
                'imgUrlS' => '#imgUrlS',
                'imgIDS' => '#imgIDS',
            )
        );
        wp_enqueue_script('abcfsl_select_img');
    }

}
add_action( 'admin_enqueue_scripts', 'abcfsl_enq_admin_js' );

