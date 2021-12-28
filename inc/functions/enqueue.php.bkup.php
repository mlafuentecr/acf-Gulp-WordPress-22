<?php

// /*-----------------------------------------------------------------------------------*/
// /* FRONT-END ENQUEUE FUNCTIONS
// /*-----------------------------------------------------------------------------------*/

function enqueue_header()
{
 
  /******************* LOAD CSS homepage.min.css********************/
  if ( is_front_page() ) {
    wp_enqueue_style('index',      $GLOBALS["THEME_MLM_PATH"]. '/'.$GLOBALS['THEME_MLM_ENV'].'/css/homepage.min.css', array(), $GLOBALS['THEME_MLM_VER'], true );

  } else{
    wp_enqueue_style('internal',   $GLOBALS["THEME_MLM_PATH"]. '/'.$GLOBALS['THEME_MLM_ENV'].'/css/internal.css', array(), $GLOBALS['THEME_MLM_VER'], true );
  }


}

add_action('wp_enqueue_scripts', 'enqueue_header');




function enqueue_footer() {

   /******************* Bootstrap  ********************/
   wp_enqueue_script( 'bootstrap-js',   $GLOBALS["THEME_MLM_PATH"]. '/'.$GLOBALS['THEME_MLM_ENV'].'/js/bootstrap.bundle.min.js?defer', array(), $GLOBALS['THEME_MLM_VER'],  true);

   /******************* LOAD JS ?defer  ********************/

 if ( is_front_page() ) {
   wp_enqueue_script('main',      $GLOBALS["THEME_MLM_PATH"]. '/dist/js/bundle_home.js?defer', array(), $GLOBALS['THEME_MLM_VER'], true );
 }else {
   wp_enqueue_script('intern',    $GLOBALS["THEME_MLM_PATH"]. '/dist/js/bundle_intern.js?defer', array(), $GLOBALS['THEME_MLM_VER'], true );
 }


    }
add_action( 'wp_enqueue_scripts', 'enqueue_footer' );
