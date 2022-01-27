<?php
/*
* Creating a function to create our CPT
*/
 
function custom_post_type() {
/*---------------------------------------------------------*/
/*  CASE STUDY REGISTER
/*---------------------------------------------------------*/

    $labels = array(
        'name'                => _x( 'Case study', 'Post Type General Name', 'RS' ),
        'singular_name'       => _x( 'Case study', 'Post Type Singular Name', 'RS' ),
        'menu_name'           => __( 'Case study', 'RS' ),
        'parent_item_colon'   => __( 'Parent Case study', 'RS' ),
        'all_items'           => __( 'All Case studies', 'RS' ),
        'view_item'           => __( 'View Case studies', 'RS' ),
        'add_new_item'        => __( 'Add Case study', 'RS' ),
        'add_new'             => __( 'Add Case study', 'RS' ),
        'edit_item'           => __( 'Edit Case study', 'RS' ),
        'update_item'         => __( 'Update Case study', 'RS' ),
        'search_items'        => __( 'Search Case study', 'RS' ),
        'not_found'           => __( 'Not Found', 'RS' ),
        'not_found_in_trash'  => __( 'Not found in Trash', 'RS' ),
    );

    $case_study_args = array(
      'labels' => $labels,
      'public' => true,
      'has_archive' => true,
      'menu_icon' => 'dashicons-admin-users',
      'rewrite' => array('slug' => 'case_study'),
      'query_var' => true,
      'menu_position' => 5,
      'supports'            => array( 'title', 'editor',  'author',  'revisions', 'custom-fields', ),
        'hierarchical'        => false,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        'menu_position'       => 5,
        'can_export'          => true,
        'has_archive'         => true,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'capability_type'     => 'page',
        'show_in_rest' => true,
 
    );
//'excerpt', 'comments', 'thumbnail', 

    register_post_type( 'case_study', $case_study_args );
/*---------------------------------------------------------*/
/*   CASE STUDY REGISTER ENDS
/*---------------------------------------------------------*/


}

add_action( 'init', 'custom_post_type', 0 );
