<?php
/*
* Creating a function to create our CPT
*/
 

function custom_post_type() {

/*---------------------------------------------------------*/
/*  CASE STUDY REGISTER
/*---------------------------------------------------------*/

    $labels = array(
        'name'                => _x( 'Casestudy', 'Post Type General Name', 'RS' ),
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


    $supports = array(
        'title', // post title
        'editor', // post content
        'author', // post author
        'thumbnail', // featured images
        'excerpt', // post excerpt
        'custom-fields', // custom fields
        'comments', // post comments
        'revisions', // post revisions
        'post-formats', // post formats
        );



    $case_study_args = array(
      'labels'                => $labels,
      'public'                => true,
      'has_archive'           => true,
      'menu_icon'             => 'dashicons-media-spreadsheet',
        'rewrite'              => array('slug' => 'case_study','with_front' => false),
       //'rewrite'               => array( 'slug' => '/', 'with_front' => false ),
       //'rewrite' => false,
      'query_var'             => true,
      'menu_position'         => 5,
      'supports'              =>  $supports,
        'hierarchical'        => false,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        'can_export'          => true,
        'has_archive'         => true,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'capability_type'     => 'page',
        'show_in_rest' => true,
 
    );


register_post_type( 'case_study', $case_study_args );


/*---------------------------------------------------------*/
/*  Landing Page 
/*---------------------------------------------------------*/

$labelsLanding = array(
    'name'                => _x( 'Landing_page', 'Landing Type General Name', 'RS' ),
    'singular_name'       => _x( 'Landing page', 'Landing Type Singular Name', 'RS' ),
    'menu_name'           => __( 'Landing page', 'RS' ),
    'parent_item_colon'   => __( 'Parent Landing_page', 'RS' ),
    'all_items'           => __( 'All  Landing page', 'RS' ),
    'view_item'           => __( 'View  Landing page', 'RS' ),
    'add_new_item'        => __( 'Add Landing page', 'RS' ),
    'add_new'             => __( 'Add  Landing page', 'RS' ),
    'edit_item'           => __( 'Edit  Landing page', 'RS' ),
    'update_item'         => __( 'Update  Landing page', 'RS' ),
    'search_items'        => __( 'Search  Landing page', 'RS' ),
    'not_found'           => __( 'Not Found', 'RS' ),
    'not_found_in_trash'  => __( 'Not found in Trash', 'RS' ),
);
$supports2 = array(
    'title', // post title
    'editor', // post content
    'author', // post author
    'thumbnail', // featured images
    'excerpt', // post excerpt
    'custom-fields', // custom fields
    'comments', // post comments
    'revisions', // post revisions
    'post-formats', // post formats
    );



$landing_args = array(
  'labels'                => $labelsLanding,
  'public'                => true,
  'has_archive'           => true,
  'menu_icon'             => 'dashicons-media-spreadsheet',
   'rewrite'              => array('slug' => 'landing_pages','with_front' => false),
   //'rewrite'               => array( 'slug' => '/', 'with_front' => false ),
   //'rewrite' => false,
    'query_var'             => true,
    'menu_position'         => 5,
    'supports'              =>  $supports2,
    'hierarchical'        => false,
    'public'              => true,
    'show_ui'             => true,
    'show_in_menu'        => true,
    'show_in_nav_menus'   => true,
    'show_in_admin_bar'   => true,
    'can_export'          => true,
    'has_archive'         => true,
    'exclude_from_search' => false,
    'publicly_queryable'  => true,
    'capability_type'     => 'post',
    'show_in_rest' => true,

);
register_post_type( 'landing_pages', $landing_args );





/*---------------------------------------------------------*/
/*  Landing Page REGISTER
/*---------------------------------------------------------*/

$labelsLandingServices = array(
    'name'                => _x( 'Landing Services', 'Landing Type General Name', 'RS' ),
    'singular_name'       => _x( 'Landing Services', 'Landing Type Singular Name', 'RS' ),
    'menu_name'           => __( 'Landing Services', 'RS' ),
    'parent_item_colon'   => __( 'Parent Landing_Services', 'RS' ),
    'all_items'           => __( 'All  Landing Services', 'RS' ),
    'view_item'           => __( 'View  Landing Services', 'RS' ),
    'add_new_item'        => __( 'Add Landing Services', 'RS' ),
    'add_new'             => __( 'Add  Landing Services', 'RS' ),
    'edit_item'           => __( 'Edit  Landing Services', 'RS' ),
    'update_item'         => __( 'Update  Landing Services', 'RS' ),
    'search_items'        => __( 'Search  Landing Services', 'RS' ),
    'not_found'           => __( 'Not Found', 'RS' ),
    'not_found_in_trash'  => __( 'Not found in Trash', 'RS' ),
);
$supports3 = array(
    'title', // post title
    'editor', // post content
    'author', // post author
    'thumbnail', // featured images
    'excerpt', // post excerpt
    'custom-fields', // custom fields
    'comments', // post comments
    'revisions', // post revisions
    'post-formats', // post formats
    );



$landing_services = array(
  'labels'                => $labelsLandingServices,
  'public'                => true,
  'has_archive'           => true,
  'menu_icon'             => 'dashicons-media-spreadsheet',
  'rewrite'               => array('slug' => 'landing_services','with_front' => false),
   //'rewrite'               => array( 'slug' => '/', 'with_front' => false ),
   //'rewrite' => false,
    'query_var'             => true,
    'menu_position'         => 5,
    'supports'              =>  $supports3,
    'hierarchical'        => false,
    'public'              => true,
    'show_ui'             => true,
    'show_in_menu'        => true,
    'show_in_nav_menus'   => true,
    'show_in_admin_bar'   => true,
    'can_export'          => true,
    'has_archive'         => true,
    'exclude_from_search' => false,
    'publicly_queryable'  => true,
    'capability_type'     => 'post',
    'show_in_rest'        => true,

);
register_post_type( 'landing_services', $landing_services );








}

add_action( 'init', 'custom_post_type', 0 );
