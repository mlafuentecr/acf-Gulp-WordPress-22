<?php

// /*-----------------------------------------------------------------------------------*/
// /* FRONT-END ENQUEUE FUNCTIONS
// /*-----------------------------------------------------------------------------------*/

function enqueue_header()
{
  
 
  if ( is_front_page() ) {
    /******************* IF IS HOME PAGE  ********************/
     //css
     wp_enqueue_style('index',         $GLOBALS["THEME_MLM_PATH"]. '/'.$GLOBALS['THEME_MLM_ENV'].'/css/homepage.min.css?defer', array(), $GLOBALS['THEME_MLM_VER']);
    //  //js
     wp_enqueue_script('index',      $GLOBALS["THEME_MLM_PATH"] .  '/dist/js/bundle_home.js?defer', array(), $GLOBALS['THEME_MLM_VER']);
   
      //&& !is_post_type('services')
  }elseif(is_page( 'blog'  ) ||  is_single( ) && get_post_type() !== 'services' && get_post_type() !== 'case_study' || is_page('latest-post')  ){
    
    /******************* IF IS BLOG INDEX and not post services also if latespost  ********************/
    //css
    wp_enqueue_style('blog'.get_post_type().'',      $GLOBALS["THEME_MLM_PATH"]. '/'.$GLOBALS['THEME_MLM_ENV'].'/css/blog.css?defer', array(), $GLOBALS['THEME_MLM_VER']);
    //js
    wp_enqueue_script('blog',     $GLOBALS["THEME_MLM_PATH"] .  '/dist/js/blog.js?defer', array(), $GLOBALS['THEME_MLM_VER']);
    //AJAx Fetch for Load more
    wp_localize_script( 'ajax', 'myAjax', array( 'ajaxurl' => admin_url( 'admin-ajax.php' ) ) );

  }else {
  /******************* IF IS Regular PAGE  ********************/
    wp_enqueue_style('intern3',    $GLOBALS["THEME_MLM_PATH"]. '/dist/css/internal.css?defer', array(), $GLOBALS['THEME_MLM_VER']);
    wp_enqueue_script('intern3',   $GLOBALS["THEME_MLM_PATH"] .'/dist/js/bundle_intern.js?defer',  array(), $GLOBALS['THEME_MLM_VER']);
  
  }


 
  /*******************  bootstrap CSS  ********************/
  wp_enqueue_script('bootstrapjs', $GLOBALS["THEME_MLM_PATH"] .  '/dist/js/bootstrap.bundle.min.js?defer', array(), $GLOBALS['THEME_MLM_VER']);
  wp_enqueue_style('bootstrap',     $GLOBALS["THEME_MLM_PATH"]. '/'.$GLOBALS['THEME_MLM_ENV'].'/css/bootstrap.min.css?defer', array(), $GLOBALS['THEME_MLM_VER']);
  //'http://roostrapdev-new-vr1.local/wp-includes/css/dist/block-library/style.min.css?ver=5.9' type='text/css' media='all' /
}

add_action('wp_enqueue_scripts', 'enqueue_header');



 /*******************  Make defer  ********************/
 function defer_parsing_of_js( $url ) {
  if ( is_user_logged_in() ) return $url; //don't break WP Admin
  if ( FALSE === strpos( $url, '.js' ) ) return $url;
  if ( strpos( $url, 'jquery.js' ) ) return $url;
  return str_replace( ' src', ' defer src', $url );
}
//add_filter( 'script_loader_tag', 'defer_parsing_of_js', 10 );
